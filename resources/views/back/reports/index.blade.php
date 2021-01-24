<?php
$title = '投稿一覧';
?>
@extends('back.layouts.base')


@section('content')

    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">件名</th>
        <th scope="col">時間</th>
        <th scope="col">詳細</th>
        <th scope="col">編集</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ $report->hour }}時間{{ $report->hour }}分</td>
                <td>
                {{ link_to_route('back.reports.show', '詳細', $report, [
                            'class' => 'btn btn-info',
                            'target' => '_new']) }}
                </td>
                <td>
                {{ link_to_route('back.reports.edit', '編集', $report, [
                            'class' => 'btn btn-info',
                            'target' => '_new']) }}
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    
@endsection