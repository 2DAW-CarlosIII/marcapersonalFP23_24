import { useState, useContext } from 'react';
import ListaFamiliaProfesionales from '../../componentes/ListaFamiliaProfesionales/ListaFamiliaProfesionales'
import MenuEmpresa from '../../componentes/MenuEmpresa/MenuEmpresa';
import ResultadosBusquedaProyectos from '../../componentes/ResultadosBusquedaProyectos/ResultadosBusquedaProyectos';

import './BusquedaProyectos.css';

import idiomas from "../../mocks/mock-idiomas";
// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";
import useDropUpDown from '../../hooks/useDropUpDown';


const BusquedaProyectos = () => {

    const idioma = useContext(IdiomaContext);

    const dropFamilia = useDropUpDown();

    const [familiasSeleccionadas, setFamiliasSeleccionadas] = useState([]);

    function dameFamiliasSeleccionadas(familias) {

        setFamiliasSeleccionadas([...familias]);

    }

    return (
        <>
            <div className="row">
                <div className="col-md-12"><MenuEmpresa></MenuEmpresa></div>
            </div>

            <div className="row">
                <div className="col-md-12">
                    <div className="card ">
                        <h5 className="card-header h5 colorTexto1">{idiomas[idioma].filtros.op5}</h5>
                            <div className="card-body">
                                <p className="card-title">{idiomas[idioma].filtros.op3}<img onClick={dropFamilia.desplegarLista}  id="dropdown" src={dropFamilia.dropImgSrc} width="30" alt=""></img></p>
                                <p className="card-text">{dropFamilia.dropImg ? <ListaFamiliaProfesionales dameFamiliasSeleccionadas = {dameFamiliasSeleccionadas} visible="listaVisible"></ListaFamiliaProfesionales>
                                                                  : <ListaFamiliaProfesionales dameFamiliasSeleccionadas = {dameFamiliasSeleccionadas} visible="listaOculta"></ListaFamiliaProfesionales>}
                                </p>
                            </div>
                    </div>
                </div>
            </div>
            <ResultadosBusquedaProyectos familiasSeleccionadas = {familiasSeleccionadas}></ResultadosBusquedaProyectos>


        </>
    )
}

export default BusquedaProyectos;
