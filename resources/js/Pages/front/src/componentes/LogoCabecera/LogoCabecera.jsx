import { Link } from "react-router-dom";
import './LogoCabecera.css'
import Logo from '../../assets/img/mp-logoRoja.png';
import { appUrl } from "../../settings";

const LogoCabecera = () => {

    return(
      <ul className="nav navbar-nav">
            <li><a href={ appUrl + "/" }><img src={Logo} width="90" height="60" alt="Logo Marca Personal"></img><span className="sr-only">(current)</span></a></li>
     </ul>
      
    )
    
    }
    export default LogoCabecera;