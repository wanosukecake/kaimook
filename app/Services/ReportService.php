<?php
namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Report\ReportRepositoryInterface;
use Auth;
use Carbon\CarbonImmutable as Carbon; 

class ReportService extends BaseService
{
    protected $report;

    public function __construct(ReportRepositoryInterface $reportRepositoryInterface)
    {
        $this->report = $reportRepositoryInterface;
    }

    /**
     * ユーザーに紐づくレポートの一覧を返却
     * @return array $report
     */
    public function getReportsList()
    {
        // 一覧表示用
        $reports = $this->report->getReportsList(Auth::id());

        $today = Carbon::today();
        // 日次勉強時間の集計
        $daily_total = $this->calculateTotalTime($reports, $today, $today->endOfDay());
        // 週次勉強時間の集計
        $weekly_total = $this->calculateTotalTime($reports, $today->startOfWeek()->subDay(1), $today->endOfWeek()->subDay(1));
        // 月次勉強時間の集計
        $monthly_total = $this->calculateTotalTime($reports, $today->startOfMonth(), $today->endOfMonth());

        $result = [
            'list' => $reports,
            'dailyTotal' => $daily_total,
            'weeklyTotal' => $weekly_total,
            'monthlyTotal' => $monthly_total
        ];

        return $result;
    }

    /**
     * レポートIDに紐づくレポートを返却
     * @param  int  $id
     * @return array $report
     */
    public function getReportById(int $id)
    {
        $report = $this->report->getReportById($id, Auth::id());
        return $report;
    }

    /**
     * レポートを登録
     * @param  object  $request
     * @return 
     */
    public function save($request)
    {
        $report = $this->report->save($request->all());
        return $report;
    }

    /**
     * レポートの更新
     * @param  object  $request
     * @return 
     */
    public function update($request)
    {
        $report = $this->report->update($request->all());
        return $report;
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
        $result = $total_hour + floor($total_minute / 60);

        return $result;
    }

}