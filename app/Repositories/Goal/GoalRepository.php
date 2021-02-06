<?php

namespace App\Repositories\Goal;

use App\Models\Goal;
use Carbon\CarbonImmutable as Carbon;

class GoalRepository implements GoalRepositoryInterface
{
    public function getGoalData($user_id) {
        // $result = Goal::with('user')->PublicList($user_id);
        // return $result;
        dd($user_id);
    }
}