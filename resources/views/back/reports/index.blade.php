<?php
$title = '投稿一覧';
?>
@extends('back.layouts.base')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<canvas id="myChart"></canvas>

<script src="{{ asset('../../js/report.js') }}"></script>
<script>

// var ctx = document.getElementById('myChart').getContext('2d');
// var chart = new Chart(ctx, {
//     // The type of chart we want to create
//     type: 'line',

//     // The data for our dataset
//     data: {
//         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//         datasets: [{
//             label: 'My First dataset',
//             backgroundColor: 'rgb(255, 99, 132)',
//             borderColor: 'rgb(255, 99, 132)',
//             data: [0, 10, 5, 2, 20, 30, 45]
//         }]
//     },

//     // Configuration options go here
//     options: {}
// });

</script>
@section('content')
    <div>
        <p class="total">
            今日の勉強時間は <br>
            <span class="total_number">{{ $reports['dailyTotal'] }}</span>時間です。
        </p>

        <p class="total">
            今週の勉強時間は <br>
            <span class="total_number">{{ $reports['weeklyTotal'] }}</span>時間です。
        </p>

        <p class="total">
            今月の勉強時間は <br>
            <span class="total_number">{{ $reports['monthlyTotal'] }}</span>時間です。
        </p>
    </div>
    <div class="clear_fix"></div>

    <div class="card">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col" class="content_th">内容</th>
            <th scope="col">時間</th>
            <th scope="col">詳細</th>
            <th scope="col">編集</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports['list'] as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->body }}</td>
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
    </div> 
    
    
<style>
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
</style>

@endsection