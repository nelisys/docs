# tinymce-react

## Installation

```
npm install --save @tinymce/tinymce-react
```

## App.js

```javascript
import React, { useRef } from 'react';
import { Editor } from '@tinymce/tinymce-react';

export default function App() {
    const editorRef = useRef(null);

    const log = () => {
        if (editorRef.current) {
            console.log(editorRef.current.getContent());
        }
    };

    return (
        <>
            <Editor
                apiKey="h7b7..."
                onInit={(evt, editor) => editorRef.current = editor}
                initialValue="<p>This is the initial content of the editor.</p>"
                init={{
                    menubar: false,
                    plugins: [
                        'lists', 'image', 'link', 'media', 'table', 'preview', 'help',
                    ],
                    toolbar: 'formatselect | bold italic forecolor backcolor ' +
                        'bullist numlist image link media table | outdent indent ' +
                        'alignleft aligncenter alignright | ' +
                        'preview undo redo | help',
                    image_title: true,
                    automatic_uploads: true,
                    file_picker_types: 'image',
                    file_picker_callback: function (cb, value, meta) {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');
                        input.onchange = function () {
                            var file = this.files[0];

                            var reader = new FileReader();
                            reader.onload = function () {
                                //
                            };
                            reader.readAsDataURL(file);
                        };

                        input.click();
                    },
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                }}
            />
            <button onClick={log}>Log editor content</button>
        </>
    );
}
```
