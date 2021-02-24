<?php

namespace App\Repositories\Report;

interface ReportRepositoryInterface
{
    public function getReportsList($user_id);

    public function getReportById($id, $user_id);

    public function save($request);

    public function update($report, $user_id);

    public function delete($report, $user_id);

    public function getReportsByFromTo($user_id, $where, $from, $to, $format);

}