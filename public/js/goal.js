$(function(){

    if (document.getElementById('goalChart')) {
        let goalGraphData = JSON.parse($("#goal_graph_data").val());
        let goalOptions = {
            title: {
                display: true,
                text: '週間目標達成率'
            }
        };    
        $(this).describeGraph('goalChart', '', 'doughnut', ['rgb(255, 160, 122)','rgb(112, 128, 144)'], goalOptions, goalGraphData);
    }

    // 内容の単位変更
    $('[name=type]').change(function() {
        let typeVal = $(this).val();
        if (typeVal == 1) {
            // 時間の時
            $(".unit").text('時間まで')
        } else if (typeVal == 2) {
            // ページの時
            $(".unit").text('ページまで')
        } else if (typeVal == 3) {
            // 章の時
            $(".unit").text('章まで')
        } else if (typeVal == 4) {
            // レッスンの時
            $(".unit").text('レッスンまで')
        }
    });
});
