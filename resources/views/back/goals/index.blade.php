<?php
    $title = '目標';
?>
@extends('back.layouts.base')
@section('content')
    @if (!$is_goal_exist)
        <h2 class="section-title">目標の登録</h2>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'back.goals.store']) }}
                    @include('back.goals._form')
                {{ Form::close() }}
            </div>
        </div>
    @else
        <h2 class="section-title">目標の確認</h2>
        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="graph">
                    <canvas id="goalChart"></canvas>
                </div>
            </div>
            <div class="card col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card-header">
                    <h4>週間目標</h4>
                </div>
                <div class="card-body">
                    <p>あなたの目標は1週間で<span class="now_progress">{{ $goal['goal'] . config("const.Goal.". $goal['type']) }}</span>です。</p>
                    <p>目標週間は {{ $goal['from'] }} ~ {{ $goal['to'] }} です。</p>
                    <p>今週の達成率は<span class="now_progress">{{ $goal['progress'] }}</span>%です</p>
                    <p>※作成した目標は、目標期間終了翌日の0時にリセットされます。</p>
                </div>
            </div>
        </div>
    @endif
    <script src="{{ asset('/js/goal.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection