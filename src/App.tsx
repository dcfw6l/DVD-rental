import React from 'react';
import './App.css';
import { Header } from './components/header/header';
import { Home } from './components/home/home';
import { BrowserRouter as Router, Link, Route } from 'react-router-dom';


function App() {
  return (
    <div>
      <Header></Header>
    <div className = "menuContainer">
      <Router>
      <Link className="menuItems" to="/"> Főoldal</Link>
      <Link className="menuItems" to="/Products"> Termékek</Link>
      <Link className="menuItems" to="/Order"> Rendelés</Link>
      <Link className="menuItems" to="/Contact"> Kapcsolat</Link>
      
      <Route exact path="/" component={() => <Home />} />
        
      </Router>
    </div></div>
  );
}

export default App;
