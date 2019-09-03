# Basic

```html
<div style="width: 100%;">
    <canvas id="chart"></canvas>
</div>

<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script>
const chart = new Chart(document.getElementById('chart').getContext('2d'), {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],

        datasets: [
            {
                label: 'Sales',
                backgroundColor: 'yellow',
                borderColor: 'red',
                fill: false,
                data: [
                    50, 30, 15, 70, 30, 80,
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
                    display: true,
                    scaleLabel: {
                        display: true,
                       labelString: 'Month',
                    }
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

