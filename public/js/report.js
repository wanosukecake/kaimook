$(function(){

  let url = '/admin/get-index-graph-data';
  let data = "";
  let doneFunc = function (response) {
console.log(response)
    let ctx = document.getElementById('myChart').getContext('2d');
    let chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: response.label,
            // labels: ['1/24', '1/25', '1/26', '1/27', '1/28', '1/29', '1/30'],
            datasets: [{
                label: '今週の勉強時間',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: response.data
            }]
        },

        // Configuration options go here
        options: {
          scales: {
            // xAxes: [{
            //     scaleLabel: {
            //         display: true,
            //         labelString: '月'
            //     }
            // }],
            yAxes: [{
                ticks: {
                    // min: 300,
                    userCallback: function(tick) {
                        return tick.toString() + '時間';
                    }
                },
                // scaleLabel: {
                //     display: true,
                //     labelString: '台数'
                // }
            }]
        },



        }
    });
  };

  $(this).ajaxRequest(doneFunc, data, url, 'get')

});