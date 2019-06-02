Highcharts.chart('chartcontainer', {

    title: {
        text: 'نمودار میزان پیشرفت شرکت '
    },

    yAxis: {
        title: {
            text: 'امتیاز'
        }
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1390
        }
    },
    height:'60%',
    series: [{
        name: ' میزان تولید ',
        data: [20, 40, 30, 80, 70, 60,90,70],
        backgoundColor:'rgba(0,0,0,0.2)'
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500,

            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});