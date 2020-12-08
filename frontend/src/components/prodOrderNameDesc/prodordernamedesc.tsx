import React from "react";
import "./prodordernamedesc.css"
import { Link } from "react-router-dom";

export class ProductsOrderNameDesc extends React.Component<{},{}> {

render(){
    return <div className="homeContainer">

        <div><Link className="ProductCardLink" to={`/Products`}>Név szerint növekvő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByNameDesc`}>Név szerint csökkenő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByCatAsc`}>Kategória szerint növekvő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByCatDesc`}>Kategória szerint csökkenő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByTimeAsc`}>Időtartam szerint növekvő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByTimeDesc`}>Időtartam szerint csökkenő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByReleaseAsc`}>Megjelenés éve szerint növekvő</Link></div>
        <div><Link className="ProductCardLink" to={`/ProductsOrderByReleaseDesc`}>Megjelenés éve szerint csökkenő</Link></div>

        <div className="ProductCard">
            <div>Cím: <span className="bold">Venom</span></div>
            <div>Kategória: <span className="bold">Fantasy</span></div>
            <div>Időtartam: <span className="bold">180 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2018</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Venom 2018-as amerikai szuperhős film, melyet Ruben Fleischer 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Sebek</span></div>
            <div>Kategória: <span className="bold">Horror</span></div>
            <div>Időtartam: <span className="bold">96 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2019</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Sebek 2019-ben bemutatott pszicho-horror, melyet Babak Anvari írt és 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Kurszk</span></div>
            <div>Kategória: <span className="bold">Történelmi</span></div>
            <div>Időtartam: <span className="bold">118 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2018</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A film a Kurszk nevű atommeghajtású tengeralattjáró igaz történetén 
            alapul.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Hóember</span></div>
            <div>Kategória: <span className="bold">Krimi</span></div>
            <div>Időtartam: <span className="bold">119 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2017</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Hóember 2017-ben bemutatott brit film, amelyet Tomas Alfredson Waugh 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Gemini Man</span></div>
            <div>Kategória: <span className="bold">Akciófilm</span></div>
            <div>Időtartam: <span className="bold">117 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2019</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Gemini Man 2019-ben bemutatott sci-fi-akciófilm, melyet Ang Lee 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Forrest Gump</span></div>
            <div>Kategória: <span className="bold">Romantikus</span></div>
            <div>Időtartam: <span className="bold">142 perc</span></div>
            <div>Megjelenés éve: <span className="bold">1994</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Forrest Gump, Robert Zemeckis által rendezett 1994-es amerikai 
            film.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Eredet</span></div>
            <div>Kategória: <span className="bold">Sci-fi</span></div>
            <div>Időtartam: <span className="bold">162 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2010</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Egy sci-fi–akciófilm, melynek írója, rendezője és 
            producere Christopher Nolan.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Ember a magasban</span></div>
            <div>Kategória: <span className="bold">Dokumentumfilm</span></div>
            <div>Időtartam: <span className="bold">94 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2008</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Egy 2008-ban bemutatott dokumentumfilm, melyet James Marsh 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Dolittle</span></div>
            <div>Kategória: <span className="bold">Vígjáték</span></div>
            <div>Időtartam: <span className="bold">101 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2020</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Egy 2020-ban bemutatott amerikai vígjáték, amelyet Stephen Gaghan 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Creed: Apollo fia</span></div>
            <div>Kategória: <span className="bold">Sport</span></div>
            <div>Időtartam: <span className="bold">173 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2015</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Creed: Apollo fia 2015-ös amerikai sport-dráma, melyet Ryan Coogler 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Casablanca</span></div>
            <div>Kategória: <span className="bold">Romantikus</span></div>
            <div>Időtartam: <span className="bold">102 perc</span></div>
            <div>Megjelenés éve: <span className="bold">1942</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Casablanca egy 1942-ben bemutatott fekete-fehér, romantikus 
            filmdráma.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Bright</span></div>
            <div>Kategória: <span className="bold">Fantasy</span></div>
            <div>Időtartam: <span className="bold">118 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2017</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A Bright egy 2017-ben bemutatott fantasy 
            film.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Bloodshot</span></div>
            <div>Kategória: <span className="bold">Akciófilm</span></div>
            <div>Időtartam: <span className="bold">109 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2020</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Egy 2020-as szuperhősfilm, amely az azonos nevű Valiant Comics karakterén 
            alapul.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Árok</span></div>
            <div>Kategória: <span className="bold">Horror</span></div>
            <div>Időtartam: <span className="bold">95 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2020</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Egy 2020-ban bemutatott akció-horrorfilm, melyet William Eubank 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Apróláb</span></div>
            <div>Kategória: <span className="bold">Animáció</span></div>
            <div>Időtartam: <span className="bold">109 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2018</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Az Apróláb 2018-ban bemutatott amerikai 3D-s számítógépes animációs 
            film.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">Amerika Kapitány</span></div>
            <div>Kategória: <span className="bold">Akciófilm</span></div>
            <div>Időtartam: <span className="bold">124 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2011</span></div>
            <div>Leírás:</div>
            <div><span className="bold">Egy nagyon izgalmas akciófilm, mely középpontjában a világ
            megmentése áll.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">21 híd</span></div>
            <div>Kategória: <span className="bold">Thriller</span></div>
            <div>Időtartam: <span className="bold">99 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2019</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A 21 híd 2019-ben bemutatott bűnügyi filmdráma, melyet Brian Kirk 
            rendezett.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>
        <div className="ProductCard">
            <div>Cím: <span className="bold">12 év rabszolgaság</span></div>
            <div>Kategória: <span className="bold">Klasszikus</span></div>
            <div>Időtartam: <span className="bold">134 perc</span></div>
            <div>Megjelenés éve: <span className="bold">2013</span></div>
            <div>Leírás:</div>
            <div><span className="bold">A 12 év rabszolgaság 2013-ban bemutatott amerikai-brit 
            film.</span></div>
            <Link className="ProductCardLink" to={`/Contact`}>Részletes leírás</Link>
        </div>  
    </div>
        
    }

}