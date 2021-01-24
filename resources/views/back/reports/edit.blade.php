<?php
$title = '投稿編集';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">投稿編集</div>
<div class="card-body">
    {!! Form::model($report, [
        'route' => ['back.reports.update', $report],
        'method' => 'put'
    ]) !!}
    @include('back.reports._form')
    {!! Form::close() !!}
</div>
<table class="table">
    <tr>
        <th>編集者</th>
        <td>{{ $report->user->name }}</td>
    </tr>
    <tr>
        <th>登録日時</th>
        <td>{{ $report->created_at }}</td>
    </tr>
    <tr>
        <th>編集日時</th>
        <td>{{ $report->updated_at }}</td>
    </tr>
</table>
@endsection

