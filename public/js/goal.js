$(function(){

    let options ={
        title: {
            display: true,
            text: '週間目標達成率'
        }
    };
    let response ="";
    $(this).describeGraph('goalChart', 'doughnut', ['達成率','未達率'], ['rgb(255, 160, 122)','rgb(112, 128, 144)'], options, response);
//         let ctx = document.getElementById('goalChart').getContext('2d');
//         let chart = new Chart(ctx, {
//             // The type of chart we want to create
//             type: 'doughnut',
//             // The data for our dataset
//             data: {
//                 labels: ['達成率','未達率'],
//                 datasets: [{
//                     backgroundColor: 'rgb(255, 99, 132)',
//                     // borderColor: 'rgb(255, 99, 132)',
//                     data: [10,90],
//                     backgroundColor: [
// 						'rgb(255, 160, 122)',
// 						'rgb(112, 128, 144)',
// 					],
//                 }]
//             },
    
//             // Configuration options go here
//             options: {
//                 title: {
//                   display: true,
//                   //グラフタイトル
//                   text: '週間目標達成率'
//                 }
//             }
//         });

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
