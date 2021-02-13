<?php

namespace App\Repositories\Goal;

use App\Models\Goal;
use Carbon\CarbonImmutable as Carbon;

class GoalRepository implements GoalRepositoryInterface
{
    public function getGoalData($user_id) 
    {
        $result = Goal::with('user')->NotExpired()->get();
        return $result;
    }

    public function save($user_id, $request) 
    {
        $result = Goal::updateOrCreate(['user_id' => $user_id], $request);
        return $result;
    }

    public function updateById($id, $data) 
    {
        $result = Goal::where('id', $id)->update($data);
        return $result;
    }

    public function getExpiredGoals() 
    {
        $result = Goal::NotExpired()->get();
        return $result;
    }
}