<?php

namespace App\Repositories\Goal;

interface GoalRepositoryInterface
{
    public function getGoalData($user_id);

    public function save($user_id, $request);

    public function updateById($id, $data);

    public function getExpiredGoals();
}