# Next.js with FontAwesome

## Installation

```
$ npm install --save @fortawesome/fontawesome-svg-core \
    @fortawesome/free-solid-svg-icons \
    @fortawesome/free-brands-svg-icons \
    @fortawesome/react-fontawesome
```

## Usage

```javascript
// _app.js
import { config } from '@fortawesome/fontawesome-svg-core'
import '@fortawesome/fontawesome-svg-core/styles.css'
config.autoAddCss = false

function MyApp({ Component, pageProps }) {
  return <Component {...pageProps} />
}

export default MyApp
```

```javascript
// pages/index.js
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faUser } from '@fortawesome/free-regular-svg-icons'

export default function Home() {
    return (
        <div>
            <FontAwesomeIcon icon={faUser} />
        </div>
    )
}
```

