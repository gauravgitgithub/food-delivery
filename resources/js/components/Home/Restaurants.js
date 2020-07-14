import React, {Component} from 'react'
import ReactDOM from 'react-dom';
import {BrowserRouter, Link, Route, Switch} from 'react-router-dom';
import './style/home.css';
class Restaurants extends Component {
  constructor(props) {
    super(props);
    this.state = {
      isLoggedIn: false,
      user: {},
      isCoordinates : false,
      lat: null,
      lng: null,
      loading : false,
      hasError : false,
      error : {},
    }
  }
  // check if user is authenticated and storing authentication data as states if true
  componentWillMount() {
    let state = localStorage["appState"];
    if (state) {
      let AppState = JSON.parse(state);
      this.setState({ isLoggedIn: AppState.isLoggedIn, user: AppState.user });
    }
    if (this.props.match.params) {
        try {
          const latitude = this.props.match.params.lat;
          const longitude = this.props.match.params.lng;
          this.setState({ isCoordinates : true ,lat: latitude, lng: longitude });
        } catch (err) {
            this.setState({ hasError: true, error: err });
          }
    }
  }

render() {
    return (
      <div>
           latitude : {this.state.lat}
           longitude : {this.state.lng}
      </div>
      )
    }
  }
export default Restaurants;
