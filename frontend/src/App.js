import React from 'react';
import './App.css';
import { Header } from './components/header/header';
import { Home } from './components/home/home';
import { BrowserRouter as Router, Link, Route } from 'react-router-dom';
import { Products } from './components/products/products';
import { Contact } from './components/contact/contact';



function App() {
  return (
    <div>
      <Header></Header>
    <div className = "menuContainer">
      <Router>
      <Link className="menuItems" to="/"> Főoldal</Link>
      <Link className="menuItems" to="/Products"> Termékek</Link>
      <Link className="menuItems" to="/Search"> Keresés</Link>
      <Link className="menuItems" to="/Rental"> Kölcsönzés</Link>
      <Link className="menuItems" to="/Contact"> Kapcsolat</Link>
      
      <Route exact path="/" component={() => <Home />} />
      {/* <Route exact path="/Products" component={() => <Products />} /> */}
      <Route exact path="/Contact" component={() => <Contact />} />
        
      </Router>
    </div></div>
  );
}

export default App;
