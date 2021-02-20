<?php
    $title = '目標';
?>
@extends('back.layouts.base')
@section('content')
    @if (!$is_goal_exist) 
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'back.goals.store']) }}
                    @include('back.goals._form')
                {{ Form::close() }}
            </div>
        </div>
    @else
        <div class="graph" style="width:600px;">
            <canvas id="goalChart"></canvas>
        </div>
        <script src="{{ asset('/js/goal.js') }}"></script>
    @endif
@endsection