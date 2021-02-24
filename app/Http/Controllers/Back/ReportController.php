<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportService;

    protected $user_id;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = $this->reportService->getReportsList();
        return response(view('back.reports.index', compact('reports')));
        
    }

    /**
     * return graph data.
     * @return json \Illuminate\Http\Response
     */
    public function getIndexGraphData() 
    {
        $data = $this->reportService->getIndexGraphData();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $report = $this->reportService->getReportById($id);
        if (!$report) {
            throw new \Exception();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $result = $this->reportService->save($request);
        if ($result) {
            $flash = ['success' => 'レポートを作成しました。'];
            return redirect()
            ->route('back.reports.index')
            ->with($flash);
        } else {
            $flash = ['error' => 'レポート更新に失敗しました。'];
            return redirect()
            ->route('back.reports.index')
            ->with($flash);
        }
    }

    /**
     * edit the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('back.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ReportRequest $request)
    {
        $report = $this->reportService->update($request);
        if ($report) {
            $flash = ['success' => 'レポートを更新しました。'];
        } else {
            $flash = ['error' => 'レポート更新に失敗しました。'];
        }

        return redirect()
            ->route('back.reports.index')
            ->with($flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $result = $this->reportService->delete($report);
        if ($result) {
            $flash = ['success' => 'レポートを削除しました。'];
        } else {
            $flash = ['error' => 'レポート削除に失敗しました。'];
        }
        return redirect()
            ->route('back.reports.index')
            ->with($flash);
    }
}
