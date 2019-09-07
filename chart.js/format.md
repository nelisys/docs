# format

format ticks

```javascript
            yAxes: [
                {
                    ticks: {
                        min: 0,
                        max: 100,
                        callback: function(value, index, values) {
                            return '$' + value;
                        },
                    }
                }
            ]
```
