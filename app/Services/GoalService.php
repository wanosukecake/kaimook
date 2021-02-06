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
        $reports = $this->goal->getGoalData(Auth::id());

    }
    
}