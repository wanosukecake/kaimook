<?php

namespace App\Repositories\Report;

interface ReportRepositoryInterface
{
    public function getReportsList($user_id);

    public function getReportById($id, $user_id);

    public function save($request);
}