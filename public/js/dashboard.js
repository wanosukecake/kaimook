$(function () {

    let timeGraphVal = $("#time_graph").val();
    if (timeGraphVal) {
        let timeGraphData = JSON.parse(timeGraphVal);
        let options = {
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        userCallback: function(tick) {
                            return tick.toString() + '時間';
                        }
                    },
                }],
            }
        }
        $(this).describeGraph('dashborad-time-chart', '勉強時間', 'bar', 'rgb(255, 99, 132)', options, timeGraphData);
    }

    let goalGraphData = JSON.parse($("#goal_graph").val());
    let goalOptions = {
        title: {
            display: true,
            text: '週間目標達成率'
        }
    };
    $(this).describeGraph('dashborad-goal-chart', '', 'doughnut', ['rgb(255, 160, 122)','rgb(112, 128, 144)'], goalOptions, goalGraphData);
});