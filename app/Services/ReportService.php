<?php
namespace App\Services;

use Auth;
use App\Services\BaseService;
use App\Repositories\Report\ReportRepositoryInterface;
use App\Repositories\Goal\GoalRepositoryInterface;
use Carbon\CarbonImmutable as Carbon;
use Illuminate\Support\Facades\DB;

class ReportService extends BaseService
{
    protected $report;

    protected $goal;

    public function __construct(ReportRepositoryInterface $reportRepositoryInterface, GoalRepositoryInterface $goalRepositoryInterface)
    {
        $this->report = $reportRepositoryInterface;
        $this->goal = $goalRepositoryInterface;
    }

    /**
     * ユーザーに紐づくレポートの一覧を返却
     * @return array $report
     */
    public function getReportsList()
    {
        $reports = $this->report->getReportsList(Auth::id());
        foreach ($reports as $key => $row) {
            if (mb_strlen($row['body']) > 40) {
                $reports[$key]['body'] = mb_substr($row['body'], 0, 40). "...";
            }
        }
        $calculate_time = $this->getMothlyReportsTime($reports);
        $result = [
            'list' => $reports,
            'dailyTotal' =>  $calculate_time['dailyTotal'],
            'weeklyTotal' =>  $calculate_time['weeklyTotal'],
            'monthlyTotal' =>  $calculate_time['monthlyTotal']
        ];

        return $result;
    }

    /**
     * レポートIDに紐づくレポートを返却
     * @param  int  $id
     * @return array $report
     */
    public function getReportById(int $id)
    {
        $report = $this->report->getReportById($id, Auth::id());
        return $report;
    }

    /**
     * レポートと目標達成率を更新する。
     * @param  object  $request
     * @return 
     */
    public function save($request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->all();
            // 作業時間の整形
            list($postData['hour'], $postData['minutes']) = explode(":", $postData['time']);
            unset($postData['time']);
            $goal = $this->goal->getGoalData(Auth::id());            
            // 登録したレポートのtypeが有効な目標と同一であれば進捗率を計算
            if (isset($goal) && $goal['type'] == $postData['type']) {
                $calc_progress = $this->calcProgress($goal, $postData);
                $data = ['progress' => $calc_progress['progress']];
                $postData['added_progress'] = $calc_progress['added_progress'];
                // 目標に対する進捗率を更新
                $this->goal->updateById($goal['id'], $data) == 1 ?: logger()->error("update Error goal_id is ". $goal['id']);
            }
            // レポートを更新
            $this->report->save($postData);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error Message is "'. $e->getMessage(). '" '. 'user_id is '. Auth::id());
            return false;
        }

        return true;
    }

    /**
     * レポートの更新
     * @param  object  $report
     * @return 
     */
    public function update($report)
    {
        DB::beginTransaction();
        $postData = $report->except(['_token', '_method']);
        try {
            $goal = $this->goal->getGoalData(Auth::id());
            $report = $this->getReportById($postData['id']);
            // 作業時間の整形
            list($postData['hour'], $postData['minutes']) = explode(":", $postData['time']);
            unset($postData['time']);
            if (isset($goal) && $goal['type'] == $report['type']) {
                // 変更したレポートが目標の有効期限内かチェック
                if ($this->isBetweenGoal($goal, $report)) {
                    // 変更予定のレポートが過去に目標に加算した進捗を一旦削除
                    $progress = $goal['progress'] - $report['added_progress'];
                    // 変更したレポートの進捗率を新たに計算
                    $calc_progress = $this->calcProgress($goal, $postData, true, $progress);
                    $data = ['progress' => $calc_progress['progress']];
                    // 目標の更新
                    $this->goal->updateById($goal['id'], $data);
                    // 変更後の進捗率に差し替え
                    $postData['added_progress'] = $calc_progress['added_progress'];
                }
            }
            $this->report->update($postData, Auth::id());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error Message is "'. $e->getMessage(). '" '. 'user_id is '. Auth::id());
            return false;
        }
        return true;
    }

    /**
     * レポートの削除
     * @param  object  $report
     * @return 
     */
    public function delete($report)
    {
        DB::beginTransaction();
        try {
            $goal = $this->goal->getGoalData(Auth::id());
            if (isset($goal) && $goal['type'] == $report->type) {
                $created = Carbon::parse($report['created_at']);
                $goal_from = new Carbon($goal['from']);
                $goal_to = new Carbon($goal['to']);
                // 有効な目標から削除するレポートの進捗を引くか判定
                if($created->between($goal_from, $goal_to)) {
                    $progress = $goal['progress'] - $report['added_progress'];
                    $data = ['progress' => $progress];
                    // 削除したレポート分の進捗を引いて更新
                    $this->goal->updateById($goal['id'], $data);
                }
            }
            $this->report->delete($report, Auth::id());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error Message is "'. $e->getMessage(). '" '. 'user_id is '. Auth::id());
            return false;
        }
        return true;
    }

    /**
     * 目標達成率を計算する
     * @param  Object  $goal
     * @param  Object  $postData
     * @return Array $data 
     */
    private function calcProgress($goal, $postData, $is_update = false, $progress = null) 
    {
        if (!$is_update) {
            $progress = $goal['progress'];
        }

        switch ($goal['type']) {
            case config('const.GoalType.TIME'):
                $total = $postData['hour'] + intval($postData['minutes'] / 60);
                $added_progress = intval(($total / $goal['goal']) * 100);
                break;

            case config('const.GoalType.PAGE'):
            case config('const.GoalType.CHAPTER'):
            case config('const.GoalType.LESSON'):
                $added_progress = intval(($postData['number'] / $goal['goal']) * 100);
                break;

            default:
                $calculate_progress = 0;
                $added_progress = 0;
                break;
        }

        $calculate_progress = $progress + $added_progress;
        return [
            'progress' => $calculate_progress,
            'added_progress' => $added_progress
        ];
    }

    /**
     * レポートが有効な目標期限内にあるかチェックする
     * @param  object  $goal
     * @param  object  $report
     * @return 
     */
    private function isBetweenGoal($goal, $report) 
    {
        $created = Carbon::parse($report['created_at']);
        $goal_from = new Carbon($goal['from']);
        $goal_to = new Carbon($goal['to']);

        return $created->between($goal_from, $goal_to)? true : false;
    }
}