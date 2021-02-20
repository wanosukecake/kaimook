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
        // TODO:ここ多分バグ、ない時の判定がうまくいってない
        if (!$goal) {
            $is_goal_exist = false; 
        }

        // TODO:存在チェックをし、存在していたら削除ボタンを出す判定処理を追加
        return view('back.goals.index', compact('is_goal_exist'));
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
                ->route('back.goals.index', $goal)
                ->withSuccess('データを登録しました。');
        } else {
            return redirect()
                ->route('back.goals.index')
                ->withError('データの登録に失敗しました。');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        //
    }

    /**
     * return graph data.
     * @return json \Illuminate\Http\Response
     */
    public function getIndexGraphData() 
    {
        $data = $this->goalService->getIndexGraphData();

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        //
    }
}
