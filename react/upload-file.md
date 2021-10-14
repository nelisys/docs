# React : Upload file

```javascript
import React from 'react';

function MyInputFile() {
    const [file, setFile] = useState({
        file: null,
        name: null,
    });

    function onChangeHandler(event) {
        if (! event.target.files.length) {
             return;
        }

        const uploadFile = e.target.files[0];

        setFile({
            file: uploadFile,
            name: uploadFile.name,
        });

        // to display content of the uploaded file
        let reader = new FileReader();
        reader.readAsDataURL(uploadFile);
        reader.onload = r => {
            console.log(r.target.result);
        }
    }

    function onSubmitHanlder() {
        let formData = new FormData();
        formData.append('file', file.file);

        axios.post(props.url, formData)
            .then(response => {
                //
            })
            .catch(error => {
                //
            });
    }

    return (
        <>
            <div className="custom-file">
                <input
                    type="file"
                    className="custom-file-input"
                    id="custom-file"
                    onChange={event => onChangeHandler(event)}
                />
                <label
                    className="custom-file-label"
                    htmlFor="custom-file"
                >
                    { file.name || 'Choose file' }
                </label>
            </div>

            <button
                type="button"
                onClick="onSubmitHandler"
            >
                submit
            </button>
        </>
    );
}

export default MyInputFile;
```
