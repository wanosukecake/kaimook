<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoalRequest;
use App\Models\Goal;
use App\Services\GoalService;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_goal_exist = true;
        $goal = $this->goalService->getGoalData();
        if (!$goal) {
            $is_goal_exist = false; 
        }
        return view('back.goals.index', compact('goal', 'is_goal_exist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {
        $goal = $this->goalService->save($request);
        if ($goal) {
            return redirect()
                ->route('back.goals.index');
        } else {
            return redirect()
                ->route('back.goals.index')
                ->withError('目標の登録に失敗しました。');
        }
    }

    /**
     * return graph data.
     * @return json \Illuminate\Http\Response
     */
    public function getGoalGraphData(Request $request) 
    {
        if (!$request->ajax()) {
            abort(400);
        }
        $data = $this->goalService->getIndexGraphData();

        return response()->json($data);
    }
}
