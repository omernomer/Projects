import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
const marked = require("marked");
const txt =`- **Preview:**  A live display of the generated HTML as it would render in a browser.
- **HTML Source:**  The generated HTML before your browser makes it pretty.
- **Lexer Data:**  What [marked] uses internally, in case you like gory stuff like this.
- **Quick Reference:**  A brief run-down of how to format things using markdown.`;

class Mark extends React.Component {
    
  constructor(props) {
    super(props)
    this.state = { 
      text:txt
    }
    this.handleChange = this.handleChange.bind(this);
  }
  handleChange(e) {
    this.setState({
      text:e.target.value
    })
  }
  
  render() {
    return <div className="row">
      <div className="col-6 code">
        <span><b>Code</b>:</span>
        <textarea id="editor" onChange={(e)=>this.handleChange(e)}>{this.state.text}</textarea>
      </div>
      <div className="col-6 preview">
        <span><b>Preview</b>:</span>
        <div id="preview" dangerouslySetInnerHTML={{__html: marked(this.state.text)}}/>
      </div>
    </div>;
  }
  
}

const el = document.querySelector("#here");
ReactDOM.render(<Mark/>, el);
