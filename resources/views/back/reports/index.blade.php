<?php
$title = '投稿一覧';
?>
@extends('back.layouts.base')
@section('content')
    <h2 class="section-title">レポート一覧</h2>
    <div class="row">
        <div class="time-pannel col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>今日の<br>勉強時間</h4>
                    </div>
                    <div class="card-body">
                        {{ $reports['dailyTotal'] }} 時間
                    </div>
                </div>
            </div>
        </div>
        <div class="time-pannel col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>今週の<br>勉強時間</h4>
                    </div>
                    <div class="card-body">
                        {{ $reports['weeklyTotal'] }} 時間
                    </div>
                </div>
            </div>
        </div>
        <div class="time-pannel col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fa fa-paint-brush"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>今月の<br>勉強時間</h4>
                    </div>
                    <div class="card-body">
                        {{ $reports['monthlyTotal'] }} 時間
                    </div>
                </div>
            </div>
        </div>
    </div>

    @forelse($reports['list'] as $report)
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $report['title']}}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        <li class="media">
                        @if ( $report['type'] == config('const.GoalType.TIME'))
                            <div class="media-pic bg-info">
                                <i class="fa fa-book"></i>
                            </div>
                        @elseif ($report['type'] == config("const.GoalType.PAGE"))
                            <div class="media-pic bg-info">
                                <i class="fa fa-book"></i>
                            </div>
                        @elseif ($report['type'] == config("const.GoalType.CHAPTER"))
                            <div class="media-pic bg-info">
                                <i class="fa fa-book"></i>
                            </div>
                        @elseif ($report['type'] == config("const.GoalType.LESSON"))
                            <div class="media-pic bg-info">
                                <i class="fa fa-book"></i>
                            </div>
                        @endif                            
                        <div class="media-body">
                            <div class="media-title mb-1">{{ config("const.Goal.".$report['type']) }}</div>
                            <div class="text-time">{{ $report['created_at']?? "-" }}</div>
                            <div class="media-description text-muted">
                                {{ $report['body']?? "-" }}
                            </div>
                            <div class="media-links">
                                <a href="#">詳細</a>
                            <div class="bullet"></div>
                                <a href="#">編集</a>
                            <div class="bullet"></div>
                                <a href="#" class="text-danger">削除</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @empty
        <p>数字なし</p>
    @endforelse
    <div class="pager">
        {{ $reports['list']->links() }}
    </div>
    

<style>
        .media-pic {
            width: 80px;
            height: 110px;
            margin-right: 15px;
            border-radius: 3px;
            line-height: 110px;
            font-style: normal;
            text-align: center;
        }
        .fa-newspaper {
            font-size: 22px;
            color: #fff;
        }
        .fa-pencil-square {
            font-size: 22px;
            color: #fff;    
        }
        /* 教材 */
        .fa-edit {
            font-size: 22px;
            color: #fff;
        }
        .clear_fix {
            clear:both;
        }
        .total {
            float:left;
            border: 1px solid;
            margin-left: 180px;
        }
        .total_number {
            font-size: 25px;
            color:red;
        }
        .content_th {
            width: 750px;
        }
        .fa-book {
            font-size: 22px;
            color: #fff;
        }
        .fa-paint-brush {
            font-size: 22px;
            color: #fff;
        }
        .pager {
            margin-left: 200px;
        }
</style>

<script src="{{ asset('/js/report.js') }}"></script>
@endsection