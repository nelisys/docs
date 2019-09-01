# Date Range

```javascript
// today
moment()

// yesterday
moment().subtract(1, 'days')

// this week
date_from = moment().startOf('week')
date_to = moment().endOf('week')

// last week
date_from = moment().startOf('week').subtract(7, 'days')
date_to = moment().endOf('week').subtract(7, 'days')

// this month
moment().startOf('month')
moment().endOf('month')
```
