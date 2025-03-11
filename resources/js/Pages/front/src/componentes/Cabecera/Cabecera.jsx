import './Cabecera.css'

import Idioma from "../../componentes/Idioma/Idioma";
import LogoCabecera from "../../componentes/LogoCabecera/LogoCabecera";


const Cabecera = (props) => {


    function seleccionarIdioma(idioma) {

        props.seleccionarIdioma(idioma);

    }

    return(

        <nav className="navbar navbar-expand-md navbar-light bg-light">
        <LogoCabecera></LogoCabecera>
        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span className="navbar-toggler-icon"></span>
        </button>
        <div className="navbar-collapse" id="navbarNav">
            <ul className="navbar-nav mr-auto">
            </ul>
            <ul className="navbar-nav mr-auto">
            <li className="fuenteRara extraLargo">
                    <h1 className="colorTexto">Marca Personal FP</h1>
            </li>
            </ul>
            <ul className="navbar-nav">
              <Idioma seleccionarIdioma = {seleccionarIdioma}></Idioma>
              <a href="/taskmanager">TM</a>
            </ul>
        </div>
    </nav>

    )

    }
    export default Cabecera;
