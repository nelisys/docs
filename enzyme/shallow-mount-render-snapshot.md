# Shallow, Mount, Render

## Component files

```javascript
// src/ProductList.js
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

```javascript
// src/ProductItem.js
function ProductItem(props) {
    return <li>{props.name}</li>;
}

export default ProductItem;
```

## Test file

### Setup Enzyme

```javascript
// src/Product.test.js
import Enzyme, { shallow, render, mount } from 'enzyme';
import toJson from 'enzyme-to-json';
//import Adapter from 'enzyme-adapter-react-16';
import Adapter from '@wojtekmaj/enzyme-adapter-react-17';

Enzyme.configure({ adapter: new Adapter() });

import ProductList from './ProductList';
```

Run test

```
$ npm test src/Product.test.js
```

### Shallow Rendering

```javascript
it('test shallow of ProductList', () => {
    const wrapper = shallow(<ProductList />);
    expect(toJson(wrapper)).toMatchSnapshot();

    // more
    expect(wrapper.find(ProductItem).length).toBe(3);
});
```

Snapshot file

```javascript
// src/__snapshots__/Product.test.js.snap

exports[`test shallow of ProductList 1`] = `
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

### Full DOM Rendering (mount)

```javascript
it('test mount of ProductList', () => {
    const wrapper = mount(<ProductList />);
    expect(toJson(wrapper)).toMatchSnapshot();
});
```

Snapshot file

```javascript
exports[`test mount of ProductList 1`] = `
<ProductList>
  <ul>
    <ProductItem
      name="alice"
    >
      <li>
        alice
      </li>
    </ProductItem>
    <ProductItem
      name="bob"
    >
      <li>
        bob
      </li>
    </ProductItem>
    <ProductItem
      name="chris"
    >
      <li>
        chris
      </li>
    </ProductItem>
  </ul>
</ProductList>
`;
```

### Static Rendering (render)

```javascript
it('test render of ProductList', () => {
    const wrapper = render(<ProductList />);
    expect(toJson(wrapper)).toMatchSnapshot();
});
```

Snapshot file

```javascript
exports[`test render of ProductList 1`] = `
<ul>
  <li>
    alice
  </li>
  <li>
    bob
  </li>
  <li>
    chris
  </li>
</ul>
```
