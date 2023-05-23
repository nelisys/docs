# Overlay

```jsx
<OverlayTrigger
    placement="bottom"
    overlay={(
        <Popover
            id={`popover-${task.id}`}
            style={{
                maxWidth: '400px',
                whiteSpace: 'pre-wrap',
            }}
        >
            <Popover.Content>
                more text
            </Popover.Content>
        </Popover>
    )}
>
    <div>
        text
    </div>
</OverlayTrigger>
```
