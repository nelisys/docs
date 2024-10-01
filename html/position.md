# CSS Position

`position: static`
- default
- no effect by `top`, `right`, `bottom`, `left`

`position: relative;`
- relative to the parent element
- specify position by `top`, `left`

`position: absolute`
- absolute position to the whole page at first
- but if user scroll the page the postion will be moved
- specify position by `top`, `right`, `bottom`, `left`

`position: fixed`
- similar to `absolute`, fixed position to the whole page
- but no position changed when scrolling
- specify position by `top`, `right`, `bottom`, `left`

`position: sticky`
- hybrid between `relative` and `fixed`
- in normal flow, behaves as `relative`—scrolling
- once reaches a scroll threshold, it **sticks** like `fixed` positioning

## example

```
<div>
    01<br />02<br />03<br />04<br />05<br />
    <div style={{ border: '1px solid steelblue',
            position: 'relative', top: '30px', left: '30px',
        }}
    >
        relative, top: 30px, left: 30px,
    </div>
    06<br />07<br />08<br />09<br />
</div>
<div>
    11<br />12<br />13<br />14<br />15<br />
    <div style={{ border: '1px solid steelblue',
            position: 'sticky',
            top: '10px',
        }}
    >
        sticky, top: 10px,
    </div>
    16<br />17<br />18<br />19<br />
    22<br />22<br />23<br />24<br />25<br />26<br />27<br />28<br />29<br />
    33<br />33<br />33<br />34<br />35<br />36<br />37<br />38<br />39<br />
    44<br />44<br />44<br />44<br />45<br />46<br />47<br />48<br />49<br />
    55<br />55<br />55<br />55<br />55<br />56<br />57<br />58<br />59<br />
</div>

<div style={{ border: '1px solid red', position: 'absolute', top: '10px', right: '10px' }}>
    absolute, top: 10px, right: 10px,
</div>
<div style={{ border: '1px solid red', position: 'absolute', bottom: '10px', right: '10px' }}>
    absolute, bottom: 10px, right: 10px,
</div>

<div style={{ border: '1px solid darkblue', position: 'fixed', top: '40px', right: '10px' }}>
    fixed, top: 40px, right: 10px,
</div>
<div style={{ border: '1px solid darkblue', position: 'fixed', bottom: '40px', right: '10px' }}>
    fixed, bottom: 40px, right: 10px,
</div>
```
