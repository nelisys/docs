# React DatePicker

## Range

Requires `react-datepicker@4`

```javascript
const [dateStart, setDateStart] = useState();
const [dateEnd, setDateEnd] = useState();

function onChangeHandler(value) {
    setDateStart(value[0]);
    setDateEnd(value[1]);
}

<DatePicker
    id="dateStartEnd"
    selectsRange={true}
    startDate={dateStart}
    endDate={dateEnd}
    onChange={onChangeHandler}
    dateFormat="dd MMM yyyy"
    className={'form-control form-control-sm'}
    showDisabledMonthNavigation
/>
```
