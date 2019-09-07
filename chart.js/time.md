# Time

```html
<div style="width: 100%;">
    <canvas id="chart"></canvas>
</div>

<script src="node_modules/chart.js/dist/Chart.bundle.min.js"></script>
<script>
const chart = new Chart(document.getElementById('chart').getContext('2d'), {
    type: 'bar',
    data: {
        datasets: [
            {
                label: 'Sales',
                backgroundColor: 'blue',
                fill: false,
                data: [
                    {
                        x: new Date('2019-09-07 06:00'),
                        y: 20,
                    },
                    {
                        x: new Date('2019-09-07 06:05'),
                        y: 30,
                    },
                    {
                        x: new Date('2019-09-07 06:10'),
                        y: 50,
                    },
                ],
            }
        ],
    },
    options: {
        responsive: true,
        legend: {
            display: true,
            position: 'top',
        },
        title: {
            display: true,
            text: 'Line Chart Title',
        },
        scales: {
            xAxes: [
                {
                    type: 'time',
                    time: {
                        unit: 'hour',
                        stepSize: 1,
                        min: new Date('2019-09-07 00:00'),
                        max: new Date('2019-09-07 24:00'),
                        displayFormats: {
                            hour: 'HH:00'
                        },
                        tooltipFormat: 'D MMM YYYY HH:mm',
                    },
                }
            ],
            yAxes: [
            {
                   display: true,
                   scaleLabel: {
                       display: true,
                       labelString: 'MB',
                   },
                   ticks: {
                       min: 0,
                       max: 100,
                   }
               }
           ]
        }
    },            
});
</script>
```
