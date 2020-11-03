# Component

## Class Component

```javascript
class ClassComponent extends React.Component {
  render() {
    return (
      <h1>
        Class Hello, {this.props.name}
      </h1>
    );
  }
}
```

## Function Component

```javascript
function FunctionComponent(props) {
  return (
    <h1>
      Function Hello, {props.name}
    </h1>
  );
}
```

## Usage

```javascript
import React from 'react';
import ReactDOM from 'react-dom';

// Class Component
// ...

// Function Component
// ...

ReactDOM.render(
  <div>
    <ClassComponent name={name} />
    <FunctionComponent name={name} />
  </div>,
  document.getElementById('root')
);
```
