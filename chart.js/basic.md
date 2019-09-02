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
        labels: ['January', 'February', 'March'],

        datasets: [
            {
                label: 'Sales',
                backgroundColor: 'yellow',
                borderColor: 'red',
                fill: false,
                data: [
                    12, 20, 15,
                ],
            }
        ],
    },
    options: {
        responsive: true,
        legend: {
            display: true,
        },
    },            
});
</script>
```

