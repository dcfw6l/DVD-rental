import React from "react";
import "./contact.css"

export class Contact extends React.Component<{}, {}> {

render(){
    return <div className="contactContainer" style={{fontSize: '28px'}}>
        
        <div className="contactTitle">Elérhetőség:</div> 
        <div className="contactContainerForTable">
        <table style={{width: '80%'}}>        
            <thead>
                <tr>
                    <th>Telefonszám:</th>
                    <th>E-mail:</th>
                    <th>Helyszín:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>06-20-1234567</td>
                    <td>dvd@rental.com</td>
                    <td>1117 Budapest, Magyar Tudósok Körútja 2.</td>
                </tr>
            </tbody>
        </table>   
        <br/>
        <br/>
        <div className="contactHeaderContainer">
        </div>     
        </div>
        </div>
        
        
}

}