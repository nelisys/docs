# Carousel

```jsx
import Carousel from 'react-bootstrap/Carousel';

export default function MyCarousel() {
    return (
        <Carousel>
            <Carousel.Item>
                <img
                    className="d-block w-100"
                    src="..."
                    alt="First slide"
                />
                <Carousel.Caption>
                    <h3>
                        First label
                    </h3>
                    <p>
                        ...
                    </p>
                </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item>
                <img
                    className="d-block w-100"
                    src="..."
                    alt="Second slide"
                />
                <Carousel.Caption>
                    <h3>
                        Second label
                    </h3>
                    <p>
                        ...
                    </p>
                </Carousel.Caption>
            </Carousel.Item>
        </Carousel>
    );
}
```
