import React, {Component} from 'react'
import Header from '../Header/Header';
import Footer from '../Footer/Footer';
import './style/home.css';
class Home extends Component {
  constructor() {
    super();
    this.state = {
      isLoggedIn: false,
      user: {}
    }
  }
  // check if user is authenticated and storing authentication data as states if true
  componentWillMount() {
    let state = localStorage["appState"];
    if (state) {
      let AppState = JSON.parse(state);
      this.setState({ isLoggedIn: AppState.isLoggedIn, user: AppState.user });
    }
  }

  handleLocationChange(e){
    console.log('called');
  }
render() {
    return (
      <div>
        <Header userData={this.state.user} userIsLoggedIn={this.state.isLoggedIn}/>
        <Footer/>
      </div>
      )
    }
  }
export default Home
