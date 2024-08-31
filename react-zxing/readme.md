# zxing

```
npm install -D @zxing/library react-webcam
```

```jsx
// ZxingPage.jsx
import { useState } from 'react';
import ZxingScanner from './ZxingScanner';

export default function ZxingPage() {
    const [result, setResult] = useState('');
    const [errors, setErrors] = useState('');

    return (
        <div className="row">
            <div className="col-6 border border-dark">
                <Scanner
                    onUpdate={(errors, result) => {
                        if (result) {
                            setResult(result);
                        }

                        if (errors) {
                            setErrors(errors);
                        }
                    }}
                />
            </div>
            <div className="col-6 border border-dark">
                {result?.text}
            </div>
        </div>
    );
}
```

```jsx
// ZxingScanner.jsx
import { useCallback, useEffect, useRef } from 'react';
import { BrowserMultiFormatReader, Result } from '@zxing/library';
import Webcam from 'react-webcam';

export default function ZxingScanner({
    onUpdate,
    onError,
    width = '100%',
    height = '100%',
    facingMode = 'environment',
    torch,
    delay = 100,
    videoConstraints,
    stopStream,
}) {
    const webcamRef = useRef(null);

    const capture = useCallback(() => {
        const codeReader = new BrowserMultiFormatReader();
        const imageSrc = webcamRef?.current?.getScreenshot();

        if (imageSrc) {
            codeReader.decodeFromImage(undefined, imageSrc)
                .then((result) => {
                    onUpdate(null, result);
                })
                .catch((err) => {
                    onUpdate(err);
                });
        }
    }, [onUpdate]);

    useEffect(() => {
        // Turn on the flashlight if prop is defined and device has the capability
        if (typeof torch === "boolean" && navigator?.mediaDevices?.getSupportedConstraints().torch) {
            const stream = webcamRef?.current?.video.srcObject;
            const track = stream?.getVideoTracks()[0]; // get the active track of the stream

            if (track && track.getCapabilities().torch && !track.getConstraints().torch) {
                track.applyConstraints({
                    advanced: [{ torch }],
                })
                .catch((err) => onUpdate(err));
            }
        }
    }, [torch, onUpdate]);

    useEffect(() => {
        if (stopStream) {
            let stream = webcamRef?.current?.video.srcObject;

            if (stream) {
                stream.getTracks().forEach((track) => {
                    stream.removeTrack(track);
                    track.stop();
                });

                stream = null;
            }
        }
    }, [stopStream]);

    useEffect(() => {
        const interval = setInterval(capture, delay);

        return () => {
            clearInterval(interval);
        };
    }, []);

    return (
        <Webcam
            width={width}
            height={height}
            ref={webcamRef}
            screenshotFormat="image/jpeg"
            videoConstraints={
                videoConstraints || { facingMode, }
            }
            audio={false}
            onUserMediaError={onError}
        />
    );
}
```
