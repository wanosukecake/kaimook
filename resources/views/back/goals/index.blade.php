<?php
$title = '目標';
?>
@extends('back.layouts.base')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="graph" style="width:600px;">
    <canvas id="myChart"></canvas>
</div>

@section('content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'back.goals.store']) }}
                @include('back.goals._form')
            {{ Form::close() }}
        </div>
    </div>
    <script src="{{ asset('/js/goal.js') }}"></script>
@endsection


