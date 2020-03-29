import React, { Component } from 'react';
import { Editor } from 'react-draft-wysiwyg';
import ReactDOM from 'react-dom';

export default <Editor
  toolbarOnFocus
  wrapperClassName="wrapper-class"
  editorClassName="editor-class"
  toolbarClassName="toolbar-class"
/>;

if (document.getElementById('editor')) {
    ReactDOM.render(<Editor/>, document.getElementById('editor'));
}
