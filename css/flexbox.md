# Flexbox

| css | Description | Values | 
| --- | ----------- | ------ |
| `display: flex` | set the flex container | |
| `flex-direction: row` | define the *Main Axis*, default to `row` | `row`, `column` |
| `justify-content: center` | align items on the *Main Axis* | `flex-start`, `flex-end` |
| `align-items: center` | align items on the *Cross Axis*  | `flex-start`, `flex-end` |

Example

```html
<div style="display: flex; justify-content: space-between">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</div>
```

## flex

```css
flex: '0 0 200px';
```

- `0` (flex-grow): The item will not grow relative to the other flex items in the container.
- `0` (flex-shrink): The item will not shrink relative to the other flex items in the container.
- `200px` (flex-basis): The initial size of the item before any growing or shrinking is applied.
