<?php

namespace App\Repositories\Report;

use App\Models\Report;
use Carbon\CarbonImmutable as Carbon;

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

    public function update($request) {
        $result = Report::create($request);
        return $result;
    }

    public function getReportsByFromTo($user_id, $where, $from, $to, $format) {
        $result = Report::with('user')
                    ->PublicList($user_id)
                    ->whereBetween('created_at', [$from, $to])
                    ->groupBy(function ($row) {
                        return Carbon::parse($row->created_at)->format('m/d');
                    })
                    ->map(function ($day) {
                        return $day->sum('hour');
                    });
        dd($result);
    }

}