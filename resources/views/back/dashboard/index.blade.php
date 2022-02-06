<?php
  $title = 'ダッシュボード';
?>
@extends('back.layouts.base')

@push('css')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('js')
  <script src="{{ asset('/js/dashboard.js') }}"></script>
@endpush

@section('content')
  <h2 class="section-title">ダッシュボード</h2>

  @component('components.back.time')
    @slot('reports', $data['calculate_time'])
  @endcomponent

  <div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>今週の勉強時間</h4>
        </div>
        <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
        @if ($data['time_graph'])
          <canvas id="dashborad-time-chart" height="666" width="1100" class="chartjs-render-monitor" style="display: block; height: 333px; width: 550px;"></canvas>
        @else
          <p>データはありません。</p>
        @endif
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>目標</h4>
        </div>
        <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <canvas id="dashborad-goal-chart" height="666" width="1100" class="chartjs-render-monitor" style="display: block; height: 333px; width: 550px;"></canvas>
        </div>
        <div class="statistic-details mt-sm-4">
          <div class="statistic-details-item">
            <span><span class="text-primary"></span>目標達成率</span>
            @if (isset($data['goal_data']))
              <div class="detail-value">{{ $data['goal_data']['progress'] }} %</div>
              <div class="detail-name">{{ $data['goal_data']['from'] }} ~ {{ $data['goal_data']['to'] }}</div>
            @else
              <div class="detail-value">目標が未設定です。</div>
              <div class="detail-name"><a href="{{ route('back.goals.index') }}">週間目標を設定する</a></div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header recent-list-head">
          <h4>今月のレポート</h4>
        </div>
        <div class="card-body recent-list">             
          <ul class="list-unstyled list-unstyled-border">
            @forelse($data['recent_list'] as $report)
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
                  <!-- <div class="float-right text-primary">Now</div> -->
                  <div class="media-title"><a href="{{ route('back.reports.edit', ['report' => $report['id']]) }}">{{ $report['title']}}</a></div>
                  <span class="text-small text-muted">{{ $report['hour']?? '0' }}時間 {{ $report['minutes']?? '0' }} 分</span><br>
                  <span class="text-small text-muted report-body">{{ $report['body'] }}</span>
                </div>
              </li>
            @empty
              <p>レポートはありません。</p>
            @endforelse
          </ul>
          <div class="text-center pt-1 pb-1">
            <a href="{{ route('back.reports.index') }}" class="btn btn-primary btn-lg btn-round">
              一覧を見る
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="time_graph" value="{{ $data['time_graph'] }}">
  <input type="hidden" id="goal_graph" value="{{ $data['goal_graph'] }}">
@endsection