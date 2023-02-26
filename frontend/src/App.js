import React from 'react';
import './App.css';
import { Header } from './components/header/header';
import { Home } from './components/home/home';
import { BrowserRouter as Router, Link, Route } from 'react-router-dom';
import { Products } from './components/products/products';
import { Contact } from './components/contact/contact';
import { Metin } from './components/metin/metin';



function App() {
  return (
    <div>
      <Header></Header>
    <div className = "menuContainer">
      <Router>
      <Link className="menuItems" to="/">Főoldal</Link>
      <Link className="menuItems" to="/Products">Termékek</Link>
      <Link className="menuItems" to="/Search">Keresés</Link>
      <Link className="menuItems" to="/Rental">Kölcsönzés</Link>
      <Link className="menuItems" to="/Contact">Kapcsolat</Link>
      <Link className="menuItems" to="/Metin">Metin</Link> 
      
      <Route exact path="/" component={() => <Home />} />
      <Route exact path="/Products" component={() => <Products />} />
      <Route exact path="/Contact" component={() => <Contact />} />
      <Route exact path="/Metin" component={() => <Metin />} />
        
      </Router>
    </div></div>
  );
}

export default App;
