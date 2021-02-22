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
        $calculate_time = $this->getMothlyReportsList();
        $result = [
            'list' => $reports,
            'dailyTotal' =>  $calculate_time['dailyTotal'],
            'weeklyTotal' =>  $calculate_time['weeklyTotal'],
            'monthlyTotal' =>  $calculate_time['monthlyTotal']
        ];

        return $result;
    }

    /**
     * レポート一覧画面のグラフ描画用にデータ取得
     * @return array $result
     */
    public function getIndexGraphData()
    {
        $reports = $this->report->getReportsList(Auth::id());
        $today = Carbon::today();
        $daily = $reports
                    ->whereBetween('created_at', [$today->startOfWeek()->subDay(1), $today->endOfWeek()->subDay(1)])
                    ->groupBy(function($date) {
                        // m/dでまとめて今週分を集計
                        return Carbon::parse($date->created_at)->format('m/d');
                    });
        // 週時間の集計
        $dailyHours = $daily
                        ->map(function ($day) {
                            return $day->sum('hour');
                        });
        // 週分の集計
        $dailyMinutes = $daily
                        ->map(function ($day) {
                            return $day->sum('minutes');
                        });

        $result = [];
        // 分を時間に換算し、resultを整形
        // TODO:intvalに変えて動作確認まだ
        foreach ($dailyMinutes as $key => $row) {
            $result['data'][] = $dailyHours[$key] + intval($row / 60);
            $result['label'][] = $key;
        }

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
            // TODO:削除対応のため、ここの保存は最後にやり、postDataとして使って目標保存後にレポートを
            // 登録するよう変更added_progess
            $report = $this->report->save($request->all());
            $goal = $this->goal->getGoalData(Auth::id());
            // 登録したレポートのtypeが有効な目標と同一であれば進捗率を計算
            // TODO:エラーハンドリング調査。goalがnullで来ることはあるか。
            if (isset($goal) && $goal['type'] == $report->type) {
                // 登録直前の進捗率を退避
                $progress = $goal['progress'];
                switch ($goal['type']){
                    case config('const.GoalType.TIME'):
                        $total = $report->hour + intval($report->minute / 60);
                        $calculate_progress = $progress + intval(($total / $goal['goal']) * 100);
                        $data = ['progress' => $calculate_progress]; 
                        break;

                    case config('const.GoalType.PAGE'):
                    case config('const.GoalType.CHAPTER'):
                    case config('const.GoalType.LESSON'):
                        $calculate_progress = $progress + intval(($report->number / $goal['goal']) * 100);
                        $data = ['progress' => $calculate_progress]; 
                        break;

                    default:
                        break;
                }
                // 目標に対する進捗率を更新
                $this->goal->updateById($goal['id'], $data);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }

        return true;
    }

    /**
     * レポートの更新
     * @param  object  $request
     * @return 
     */
    public function update($request)
    {
        $report = $this->report->update($request->all());
        return $report;
    }
}