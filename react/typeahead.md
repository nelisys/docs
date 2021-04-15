# react-bootstrap-typeahead

## Static Data

```javascript
const options = [
  { name: 'Alabama', population: 4780127, capital: 'Montgomery', region: 'South' },
  { name: 'Alaska', population: 710249, capital: 'Juneau', region: 'West' },
  { name: 'Arizona', population: 6392307, capital: 'Phoenix', region: 'West' },
  { name: 'Arkansas', population: 2915958, capital: 'Little Rock', region: 'South' },
  ...
  { name: 'Wyoming', population: 563767, capital: 'Cheyenne', region: 'West' },
];

export default options;
```

```javascript
import { useState } from 'react';
import { Typeahead } from 'react-bootstrap-typeahead';
import 'bootstrap/dist/css/bootstrap.css';

import options from './data';

function App() {
  const [singleSelections, setSingleSelections] = useState([]);

  return (
    <>
      <Typeahead
        id="basic-typeahead-single"
        labelKey="name"
        onChange={setSingleSelections}
        options={options}
        placeholder="Choose a state..."
        selected={singleSelections}
        minLength={0}
        paginate
        maxResults={10}
        onPaginate={(e) => console.log('Results paginated')}
        renderMenuItemChildren={(option) => (
          <div>
            {option.name}
            <div>
              <small>Capital: {option.capital}</small>
            </div>
          </div>
        )}
        filterBy={(option, props) => {
          return (
            option.capital.toLowerCase().indexOf(props.text.toLowerCase()) !== -1 ||
            option.name.toLowerCase().indexOf(props.text.toLowerCase()) !== -1
          )
        }}
        allowNew
        newSelectionPrefix="Add a new item: "
      />

      {JSON.stringify(singleSelections)}
    </>
  );
}

export default App;
```
