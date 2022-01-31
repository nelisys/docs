# React DatePicker

## Installation

```
$ npm install react-datepicker
```

## Basic

```javascript
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';

function App() {
    const [dateStart, setDateStart] = useState();

    function onChangeHandler(value) {
        setDateStart(value);
    }

    <DatePicker
        id="dateStartEnd"
        selected={dateStart}
        onChange={onChangeHandler}
        dateFormat="dd MMM yyyy"
        className={'form-control form-control-sm'}
        showDisabledMonthNavigation
    />
}
```

## Range

Requires `react-datepicker@4`

```javascript
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';

function App() {
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
}
```
