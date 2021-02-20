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
        <div class="graph" style="width:600px;">
            <canvas id="goalChart"></canvas>
        </div>
    @endif
    <script src="{{ asset('/js/goal.js') }}"></script>
@endsection