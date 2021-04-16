# Shallow Snapshot Testing

## Component files

```
// src/ProductList
import ProductItem from './ProductItem';

function ProductList() {
    return (
        <ul>
            <ProductItem name="alice" />
            <ProductItem name="bob" />
            <ProductItem name="chris" />
        </ul>
    );
}

export default ProductList;
```

```
// src/ProductItem.js
function ProductItem(props) {
    return <li>{props.name}</li>;
}

export default ProductItem;
```

## Test file

```
// src/Product.test.js
import React from 'react';
import ReactDOM from 'react-dom';

import Enzyme, { shallow, render, mount } from 'enzyme';
import toJson from 'enzyme-to-json';
import Adapter from 'enzyme-adapter-react-16';

Enzyme.configure({ adapter: new Adapter() });

import ProductList from './ProductList';

it('can render shallow of ProductList', () => {
    const wrapper = shallow(<ProductList />);

    expect(toJson(wrapper)).toMatchSnapshot();
});
```

## Run test

```
$ npm test src/Product.test.js
```

## Snapshot file
```
$ cat src/__snapshots__/Product.test.js.snap
// Jest Snapshot v1, https://goo.gl/fbAQLP

exports[`can render shallow of ProductList 1`] = `
<ul>
  <ProductItem
    name="alice"
  />
  <ProductItem
    name="bob"
  />
  <ProductItem
    name="chris"
  />
</ul>
`;
```
