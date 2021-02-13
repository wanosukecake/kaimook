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
        $result = $this->goal->save(Auth::id(), $request->all());
        return $result;
    }

    /**
     * 期限切れの目標に対し、期限切れフラグを設定する。
     * @return object
     */
    public function setGoalsExpired() 
    {
        // 期限切れでない目標を全取得
        $goals = $this->goal->getExpiredGoals();
        $today = Carbon::today();
        $isExpired = ['is_expired' => 1];
        foreach ($goals as $key => $row) {
            $created_at = Carbon::parse($row['created_at'])->addWeek();
            // 作成日から１週間以上経過した目標は期限切れに変更
            if(!$today->lt($created_at)) {
                $this->goal->updateById($row['id'], $isExpired);
            }
        }
        return true;
    }
}