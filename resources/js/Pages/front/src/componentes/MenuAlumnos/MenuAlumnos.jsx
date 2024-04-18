import { Link } from "react-router-dom";

import '../MenuEmpresa/MenuEmpresa';

import { useContext } from "react";

// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";

import idiomas from "../../mocks/mock-idiomas";

const MenuAlumnos = () => {

    const idioma = useContext(IdiomaContext);

return(

    <nav className="navbar navbar-expand-lg navbar-light bg-light justify-content-between sticky-top ">
        <span className="destacado mayuscula colorTexto largo">[ {idiomas[idioma].menuAlumnos.op1} ]</span>

        <button className="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
        </button>

        <div className="navbar-collapse " id="navbarSupportedContent">
            <ul className="navbar-nav mr-auto ">
                <li className="nav-item">
                <Link className="nav-link" to="/dashboard">{idiomas[idioma].menuAlumnos.op2}</Link>
                </li>
            </ul>
        </div>
    </nav>
)

}
export default MenuAlumnos;
