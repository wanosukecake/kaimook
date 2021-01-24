<?php

namespace App\Repositories\Report;

use App\Models\Report;
use Auth;

class ReportRepository implements ReportRepositoryInterface
{
    public function getReportsList($user_id) {
        $result = Report::with('user')->PublicList($user_id);
        return $result;
    }

    public function getReportById($id, $user_id) {
        $result = Report::with('user')->PublicFindByIdUserId($id, $user_id);
        return $result;
    }

    public function save($request) {
        $result = Report::create($request);
        return $result;
    }

}