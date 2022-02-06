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