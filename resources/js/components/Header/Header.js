import React, {Component} from 'react';
import {Link, withRouter} from 'react-router-dom';
import './style/header.css';
import PlacesAutocomplete from '../Common/Autocomplete';
class Header extends Component {
  constructor(props) {
    super(props);
      this.state = {
        user: props.userData,
        isLoggedIn: props.userIsLoggedIn
      };
      this.logOut = this.logOut.bind(this);
  }
  logOut() {
    let appState = {
      isLoggedIn: false,
      user: {}
    };
    localStorage["appState"] = JSON.stringify(appState);
    this.setState(appState);
    this.props.history.push('/login');
  }
  render() {
    const aStyle = {
      cursor: 'pointer'
    };
    
    return (
        <div>
          <nav class="navbar navbar-expand-lg navbar-light fixed-top  transparent navbar-inverse">
  <div class="container">
    <a class="navbar-brand" href="#"><img className="logo-img" src="assets/img/logo.png" alt="FoodDelivery"></img> FoodDelivery</a>
  </div>
</nav>

<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    
    <div class="carousel-inner" role="listbox">
      <div class="carousel-first carousel-item active">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Hungry ?</h2>
          <p class="lead">Order food from your nearby restaurants.</p>
        </div>
      </div>
      <div class="carousel-second carousel-item" >
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Unexpected Guests ?</h2>
          <p class="lead">Order food from your nearby restaurants.</p>
        </div>
      </div>
      <div class="carousel-third carousel-item" >
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Going for movie ?</h2>
          <p class="lead">Order food from your nearby restaurants.</p>
        </div>
      </div>
      <div class="carousel-fourth carousel-item" >
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Sweet after Dinner ?</h2>
          <p class="lead">Order food from your nearby restaurants.</p>
        </div>
      </div>
      <PlacesAutocomplete />
    </div>
  </div>
</header>
        </div>
    )
  }
}
export default withRouter(Header)