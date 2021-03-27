<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Goal\GoalRepositoryInterface;
use App\Repositories\Report\ReportRepositoryInterface;
use Auth;
use Carbon\CarbonImmutable as Carbon;

class DashboardService extends BaseService
{
    protected $report;

    protected $goal;

    public function __construct(ReportRepositoryInterface $reportRepositoryInterface, GoalRepositoryInterface $goalRepositoryInterface)
    {
        $this->report = $reportRepositoryInterface;
        $this->goal = $goalRepositoryInterface;
    }

    public function getData()
    {
        $result['time_graph'] = "";
        $today = Carbon::today();
        $from = $today->startOfMonth();
        $to = $today->endOfMonth();

        $reports = $this->report->getReportsByFromTo(Auth::id(), "", $from, $to, "");

        if ($reports->isEmpty()) {
            $result['data'] = 0;
            $result['label'][] = 0;
        } else {
            $daily = $reports
                        ->whereBetween('created_at', [$today->startOfWeek()->subDay(1), $today->endOfWeek()])
                        ->groupBy(function($date) {
                            // m/dでまとめて今週分を集計
                            return Carbon::parse($date->created_at)->format('m/d');
                        })
                        ->sortKeys();

            // 今週のhourの集計
            $dailyHours = $daily
                            ->map(function ($day) {
                                return $day->sum('hour');
                            });
            // 今週のmintutesの集計
            $dailyMinutes = $daily
                            ->map(function ($day) {
                                return $day->sum('minutes');
                            });

            // 分を時間に換算
            foreach ($dailyMinutes as $key => $row) {
                $data['data'][] = $dailyHours[$key] + intval($row / 60);
                $data['label'][] = $key;
            }
            $result['time_graph'] = json_encode($data);
        }
        $goal_data = $this->getGoalData();
        $result = array_merge($result, [
            'calculate_time' => $this->getMothlyReportsTime(),
            'recent_list' => $reports->take(5),
            'goal_data' => $goal_data,
            'goal_graph' => json_encode($this->getIndexGraphData($goal_data))
        ]);

        return $result;
    }
}