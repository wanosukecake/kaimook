$(function(){
    let url = '/admin/get-index-graph-data';
    let data = "";
    let doneFunc = function (response) {
        let options = {
                scales: {
                yAxes: [{
                    ticks: {
                        userCallback: function(tick) {
                            return tick.toString() + '時間';
                        }
                    },
                }]
            }
        }
        $(this).describeGraph('myChart', 'bar', '今週の勉強時間', 'rgb(255, 99, 132)', options, response);
  　};

    if (document.getElementById('myChart')) {
        $(this).ajaxRequest(doneFunc, data, url, 'get')
    }

    changeForm();
    // 作業量フォーム部分
    $('[name=type]').change(function() {
        changeForm();
    });
});

function changeForm () {
    let typeVal = $('[name=type]').val();
    if (typeVal != 1) {
        $(".time").addClass('none');
        $(".number").removeClass('none');
        $(".time select").prop('disabled', true);
        $(".number input").prop('disabled', false);
        if (typeVal == 2) {
            // ページの時
            $(".unit").text('ページまで')
        } else if (typeVal == 3) {
            // 章の時
            $(".unit").text('章まで')
        } else if (typeVal == 4) {
            // レッスンの時
            $(".unit").text('レッスンまで')
        }
    } else {
        $(".time select").prop('disabled', false);
        $(".number input").prop('disabled', true);
        $(".time").removeClass('none');
        $(".number").addClass('none');           
    }
}