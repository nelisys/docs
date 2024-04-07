# import

```jsx
import { useParams } from 'react-router-dom';

export default function MainComponent() {
    const [Component, setComponent] = useState();
    const { page } = useParams();

    useEffect(() => {
        const loadComponent = async () => {
            const module = await import(`./My${page}`);
            setComponent(module.default);
        };

        loadComponent();
    }, []);

    if (! Component) return null;

    return <>{Component}</>;
}
```
