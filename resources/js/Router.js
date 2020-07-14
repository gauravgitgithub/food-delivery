import React from 'react';
import {BrowserRouter, Link, Route, Switch} from 'react-router-dom';
import Home from './components/Home/Home';
import Restaurants from './components/Home/Restaurants';


const Main = props => (
<Switch>  
  <Route exact path='/' component={Home}/>
  <Route exact path='/restaurants/:lat/:lng' component={Restaurants}/>
</Switch>
);
export default Main;