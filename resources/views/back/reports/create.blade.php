<?php
$title = '投稿登録';
?>
@extends('back.layouts.base')
 
@section('content')
    <h2 class="section-title">新規レポートの作成</h2>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'back.reports.store']) }}
            @include('back.reports._form')
            {{ Form::close() }}
        </div>
    </div>
@endsection