import { useState, useContext } from 'react';
import ListaFamiliaProfesionales from '../../componentes/ListaFamiliaProfesionales/ListaFamiliaProfesionales'
import MenuEmpresa from '../../componentes/MenuEmpresa/MenuEmpresa';
import ResultadosBusquedaProyectos from '../../componentes/ResultadosBusquedaProyectos/ResultadosBusquedaProyectos';


import idiomas from "../../mocks/mock-idiomas";
// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";


const BusquedaProyectos = () => {

    const idioma = useContext(IdiomaContext);

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
                                <p className="card-title">{idiomas[idioma].filtros.op3}</p>
                                <p className="card-text"><ListaFamiliaProfesionales dameFamiliasSeleccionadas = {dameFamiliasSeleccionadas}></ListaFamiliaProfesionales></p>
                            </div>
                    </div>
                </div>
            </div>
            <ResultadosBusquedaProyectos familiasSeleccionadas = {familiasSeleccionadas}></ResultadosBusquedaProyectos>


        </>
    )
}

export default BusquedaProyectos;
