<?php
    $title = 'レポート一覧';
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
                    <i class="far fa-calendar-alt"></i>
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
                    <h4><a href="{{ route('back.reports.edit', ['report' => $report['id']]) }}">{{ $report['title']}}</a></h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        <li class="media">
                            <a href="{{ route('back.reports.edit', ['report' => $report['id']]) }}">
                                @if ( $report['type'] == config("const.GoalType.TIME"))
                                    <div class="media-pic report-time bg-info">
                                        <i class="far fa-clock"></i>
                                    </div>
                                @elseif ($report['type'] == config("const.GoalType.PAGE"))
                                    <div class="media-pic report-page">
                                        <i class="far fa-file-alt"></i>
                                    </div>
                                @elseif ($report['type'] == config("const.GoalType.CHAPTER"))
                                    <div class="media-pic report-chapter">
                                        <i class="fas fa-scroll"></i>
                                    </div>
                                @elseif ($report['type'] == config("const.GoalType.LESSON"))
                                    <div class="media-pic report-lesson">
                                        <i class="far fa-comments"></i>
                                    </div>
                                @endif
                            </a>
                            <div class="media-body">
                                <div class="media-title mb-1">{{ $report['hour']?? '0' }}時間 {{ $report['minutes']?? '0' }} 分</div>
                                @if ($report['type'] !== config("const.GoalType.TIME"))
                                    <div class="media-title mb-1">{{ $report['number'] . config("const.Goal.". $report['type']) }}</div>
                                @endif 
                                <div class="text-time">{{ $report['updated_at']?? "-" }}</div>
                                <div class="media-description text-muted">
                                    {{ $report['body']?? "-" }}
                                </div>
                                <div class="row media-links">
                                    <a href="{{ route('back.reports.edit', ['report' => $report['id']]) }}">編集</a>
                                <div class="bullet"></div>
                                {{ Form::model($report, [
                                    'route' => ['back.reports.destroy', $report],
                                    'method' => 'delete'
                                ]) }}
                                {{ Form::submit('削除', [
                                        'onclick' => "return confirm('本当に削除しますか?')",
                                        'class' => 'text-danger delete-report'
                                    ]) }}
                                {{ Form::close() }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @empty
        <p>レポートはありません。</p>
    @endforelse
    <div class="pager">
        {{ $reports['list']->links() }}
    </div>
    <script src="{{ asset('/js/report.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
@endsection