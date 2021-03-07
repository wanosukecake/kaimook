<?php

namespace App\Repositories\Report;

use App\Models\Report;

class ReportRepository implements ReportRepositoryInterface
{   
    public function getReportsList($user_id) {
        $result = Report::with('user')->LatestList($user_id)->paginate(10);
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

    public function update($report, $user_id) {
        $result = Report::where('id', $report['id'])
                        ->where('user_id', $user_id)
                        ->update($report);
        return $result;
    }

    // TODO:今月として取得し、サービス側で集計、がいいかもしれない。
    // それでいくならgetReportsByMonth
    public function getReportsByFromTo($user_id, $where, $from, $to, $format) {
        $result = Report::with('user')
                    ->LatestList($user_id)
                    ->whereBetween('created_at', [$from, $to])
                    ->get();

        return $result;
    }

    public function delete($report, $user_id) {
        $result = Report::where('id', $report['id'])
                        ->where('user_id',$user_id)
                        ->delete();
        return $result;
    }
}