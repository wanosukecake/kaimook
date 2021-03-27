<?php

namespace App\Services;

use Auth;
use App\Repositories\Report\ReportRepositoryInterface;
use Carbon\CarbonImmutable as Carbon;

class BaseService {

    protected $report;

    public function __construct(ReportRepositoryInterface $reportRepositoryInterface)
    {
        $this->report = $reportRepositoryInterface;
    }

    /**
     * 表示用に勉強時間を計算して返却
     * @return Array
     */
    protected function getMothlyReportsTime($reports = null) 
    {
        $today = Carbon::today();
        $from = $today->startOfMonth();
        $to = $today->endOfMonth();
        if (!$reports) {
            $reports = $this->report->getReportsByFromTo(Auth::id(), "", $from, $to, "");
        }
        // 日次勉強時間の集計
        $daily_total = $this->calculateTotalTime($reports, $today, $today->endOfDay());
        // 週次勉強時間の集計
        $weekly_total = $this->calculateTotalTime($reports, $today->startOfWeek()->subDay(1), $today->endOfWeek());
        // 月次勉強時間の集計
        $monthly_total = $this->calculateTotalTime($reports, $today->startOfMonth(), $today->endOfMonth());

        return [
            'dailyTotal' => $daily_total,
            'weeklyTotal' => $weekly_total,
            'monthlyTotal' => $monthly_total
        ];
    }

    /**
     * 合計勉強時間の計算
     * @param  collection  $reports
     * @param  int  $from
     * @param  int  $to
     * @return int $result
     */
    private function calculateTotalTime($reports, $from, $to) 
    {
        $total_hour = $reports->whereBetween('created_at', [$from, $to])->sum('hour');
        $total_minute = $reports->whereBetween('created_at', [$from, $to])->sum('minutes');
        $result = $total_hour + intval($total_minute / 60);

        return $result;
    }

    /**
     * 合計勉強時間の計算
     * @return array $goal
     */
    public function getGoalData() 
    {
        // 一覧表示用
        $goal = $this->goal->getGoalData(Auth::id());
        return $goal;
    }

    /**
     * 目標の画面グラフ描画用にデータ取得
     * @return array $result
     */
    public function getIndexGraphData($goal)
    { 
        $result = [
            'data' => [
                0, 
                100
            ],
            'label' => [
                '達成率',
                '未達率'
            ]            
        ];

        if (!$goal) {
            // データがない時は達成率0でグラフを描画する
            return $result;
        }

        $not_achieved = 100 - $goal['progress'];
        if ($not_achieved < 0) {
            $not_achieved = 0;
        }

        return array_merge($result, [
            'data' => [
                $goal['progress'], 
                $not_achieved
            ]
        ]);
    }

}