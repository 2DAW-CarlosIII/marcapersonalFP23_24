import { Link } from "react-router-dom";
import './LogoCabecera.css'
import Logo from '../../assets/img/mp-logoRoja.png';

const LogoCabecera = () => {

    return(
      <ul className="nav navbar-nav">
            <li><a><Link to="/"><img src={Logo} width="90" height="60" alt="Logo Marca Personal"></img></Link><span className="sr-only">(current)</span></a></li>
     </ul>
      
    )
    
    }
    export default LogoCabecera;