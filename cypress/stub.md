# stub

- replacement for an existing function / method
- used for evaluating & controlling function calls
- does replace the function

```js
beforeEach(() => {
    cy.visit('/').then((win) => {
        cy.stub(win.navigator.geolocation, 'getCurrentPosition')
            .as('getUserPosition')
            .callsFake((cb) => {
                setTimeout(() => {
                    cb({
                        coords: {
                            latitude: 37.5,
                            longitude: 48.01,
                        },
                    });
                }, 100);
            });

        cy.stub(win.navigator.clipboard, 'writeText')
            .as('saveToClipboard')
            .resolves();
    });
});

it('should ...', () => {
    cy.get('@getUserPosition')
        .should('have.been.called');

    cy.get('@saveToClipboard')
        .should('have.been.calledWithMatch', '...');
});
```
