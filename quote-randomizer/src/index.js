import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';

const quotes=[
  ["Stay Hungry. Stay Foolish.", "Steve Jobs"],
    ["Good Artists Copy, Great Artists Steal.", "Pablo Picasso"],
    ["Argue with idiots, and you become an idiot.", "Paul Graham"],
    ["Be yourself; everyone else is already taken.", "Oscar Wilde"],
    ["Simplicity is the ultimate sophistication.", "Leonardo Da Vinci"]
]

//let seed=Math.floor(Math.random() * quotes.length);
class Card extends React.Component {
  
  constructor(props) {
    super(props)
    this.state = {
      seed:Math.floor(Math.random() * quotes.length)
    }
    this.newQuote=this.newQuote.bind(this);
  }
  newQuote() {
    this.setState({
      seed:Math.floor(Math.random() * quotes.length)
    })
  }
  render() {
    return <div className="box">
        <div id="text">{quotes[this.state.seed][0]}</div>
        <div id="author"><i>{quotes[this.state.seed][1]}</i></div>
        <button onClick={this.newQuote} type="button" id="new-quote" className="btn btn-info">New</button>
      </div>
  }
  
}

const el = document.querySelector("#quote-box");
ReactDOM.render(<Card/>, el);
