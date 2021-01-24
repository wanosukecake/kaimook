<?php
namespace App\Services;

use App\Services\BaseService;
use App\Models\Report;
use App\Repositories\Report\ReportRepositoryInterface;
use Auth;

class ReportService extends BaseService
{
    // private $user_id;

    protected $report;

    public function __construct(ReportRepositoryInterface $ReportRepositoryInterface)
    {
        $this->report = $ReportRepositoryInterface;
    }

    /**
     * ユーザーに紐づくレポートの一覧を返却
     * @return array $report
     */
    public function getReportsList()
    {
        $report = $this->report->getReportsList(Auth::id());
        return $report;
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
}