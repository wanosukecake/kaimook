<?php

namespace App\Repositories\Goal;

use App\Models\Goal;

class GoalRepository implements GoalRepositoryInterface
{
    public function getGoalData($user_id) 
    {
        $result = Goal::where('user_id', $user_id)->NotExpired()->first();
        if ($result) {
            $result = $result->toArray();
        }
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