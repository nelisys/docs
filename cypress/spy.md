# spy

- a listener that's attached to a function / method
- used for evaluating asserting function calls
- does not change or replace the function

```js
beforeEach(() => {
    cy.visit('/').then((win) => {
        cy.spy(win.localStorage, 'setItem').as('storeLocation');
    });
});

it('should ...', () => {
    cy.get('@storeLocation')
        .should('have.been.called');
});
```
