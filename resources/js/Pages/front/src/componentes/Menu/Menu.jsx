import { Link } from "react-router-dom";

const Menu = () => {


return(

    
    <nav className="navbar navbar-expand-lg navbar-light bg-light justify-content-between sticky-top ">

        <a className="navbar-brand" ><Link to="/"><img src="../../src/assets/img/mp-logo.png" width="60" height="45" alt=""></img></Link><span className="sr-only">(current)</span></a>
        <button className="navbar-toggler" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse " id="navbarSupportedContent">
            <ul className="navbar-nav mr-auto ">                
                <li className="nav-item">
                <Link to="/proyectos"><a className="nav-link" >Proyectos</a></Link>
                </li>
                <li className="nav-item">
                <Link to="/perfilcompetencial"><a className="nav-link" >Perfil Competencial </a></Link>
                </li>
            </ul>
        </div>
    </nav>
  

)

}
export default Menu;