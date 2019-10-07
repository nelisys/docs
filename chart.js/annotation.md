# annotation

```html
<script src="node_modules/chart.js/dist/Chart.bundle.min.js"></script>
<script src="node_modules/chartjs-plugin-annotation/chartjs-plugin-annotation.min.js"></script>

<script>
const chart = new Chart(document.getElementById('chart').getContext('2d'), {
    ...
    options: {
        annotation: {
            annotations: [
                {
                    type: 'box',
                    xScaleID: 'x-axis-0',
                    yScaleID: 'y-axis-0',
                    xMin: new Date('2019-09-20 06:00'),
                    xMax: new Date('2019-09-20 10:00'),
                    yMin: -100,
                    yMax: 100,
                    backgroundColor: 'rgba(101, 33, 171, 0.5)',
                    borderColor: 'rgb(101, 33, 171)',
                    borderWidth: 1,
            }
        ]
    }
}
</script>
```
