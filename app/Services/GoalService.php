<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Goal\GoalRepositoryInterface;
use Auth;
use Carbon\CarbonImmutable as Carbon; 

class GoalService extends BaseService
{
    protected $goal;

    public function __construct(GoalRepositoryInterface $goalRepositoryInterface)
    {
        $this->goal = $goalRepositoryInterface;
    }

    public function getGoalData() 
    {
        // 一覧表示用
        $goal = $this->goal->getGoalData(Auth::id());
        return $goal;
    }

    /**
     * 目標を登録
     * @param  object  $request
     * @return 
     */
    public function save($request)
    {
        try{
            $postData = $request->all();
            $today = Carbon::today();
            $postData['from'] = $today->format('Y-m-d');
            $postData['to'] = $today->addWeek()->format('Y-m-d');

            $this->goal->save(Auth::id(), $postData);
        } catch (\Exception $e) {
            logger()->error('Error Message is "'. $e->getMessage(). '" '. 'user_id is '. Auth::id(). "postData= ". $postData);
            return false;
        }

        return true;
    }

    /**
     * 期限切れの目標に対し、期限切れフラグを設定する。
     * @return object
     */
    public function setGoalsExpired() 
    {
        try{
            // 期限切れでない目標を全取得
            $goals = $this->goal->getExpiredGoals();
            $today = Carbon::today();
            $isExpired = ['is_expired' => 1];
            foreach ($goals as $key => $row) {
                $created_at = Carbon::parse($row['created_at'])->addWeek();
                // 作成日から１週間以上経過した目標は期限切れに変更
                if(!$today->lt($created_at)) {
                    $this->goal->updateById($row['id'], $isExpired) == 1 ?: logger()->error("update Error goal_id is ". $row['id']);
                }
            }
        } catch (\Exception $e) {
            logger()->error('Error Message is "'. $e->getMessage(). '" '. 'user_id is '. Auth::id());
            return false;
        }

        return true;
    }

    /**
     * 目標の画面グラフ描画用にデータ取得
     * @return array $result
     */
    public function getIndexGraphData()
    {
        $goal = $this->getGoalData(Auth::id());
        $not_achieved = 100 - $goal['progress'];
        if ($not_achieved < 0) {
            $not_achieved = 0;
        }
        return [
            'data' => [
                $goal['progress'], 
                $not_achieved
            ],
            'label' => [
                '達成率',
                '未達率'
            ]
        ];
    }
}