import { useState, useContext } from 'react';

import ListaPerfilesCompetenciales from '../../componentes/ListaPerfilesCompetenciales/ListaPerfilesCompetenciales'
import ListaFamiliaProfesionales from '../../componentes/ListaFamiliaProfesionales/ListaFamiliaProfesionales'
import MenuEmpresa from '../../componentes/MenuEmpresa/MenuEmpresa';
import ResultadosBusquedaAlumnos from '../../componentes/ResultdosBusquedaAlumnos/ResultadosBusquedaAlumnos';

import useDropUpDown from '../../hooks/useDropUpDown';

import './BusquedaAlumnos.css';

import idiomas from "../../mocks/mock-idiomas";
// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";

const BusquedaAlumnos = () => {

    const idioma = useContext(IdiomaContext);

    const dropFamilia = useDropUpDown();
    const dropPerfilC = useDropUpDown();

    const [familiasSeleccionadas, setFamiliasSeleccionadas] = useState([]);
    const [perfilesSeleccionados, setPerfilesSeleccionados] = useState([]);


    function dameFamiliasSeleccionadas(familias) {

        setFamiliasSeleccionadas([...familias]);

    }

    function damePerfilesSeleccionados(perfiles) {

        setPerfilesSeleccionados([...perfiles]);

    }

    return (
            <>
                <div className="row">
                    <div className="col-md-12"><MenuEmpresa></MenuEmpresa></div>
                </div>
                <div className="row">
                <div className="col-md-12">
                    <div className="card ">
                            <h5 className="card-header h5 colorTexto1">{idiomas[idioma].filtros.op1}</h5>
                            <div className="card-body">
                                <p className="card-title">{idiomas[idioma].filtros.op2}<img onClick={dropPerfilC.desplegarLista}  id="dropdown" src={dropPerfilC.dropImgSrc} width="30" alt=""></img></p>
                                <p className="card-text">{dropPerfilC.dropImg ? <ListaPerfilesCompetenciales damePerfilesSeleccionados = {damePerfilesSeleccionados} visible="listaVisible"></ListaPerfilesCompetenciales>
                                                                              : <ListaPerfilesCompetenciales damePerfilesSeleccionados = {damePerfilesSeleccionados} visible="listaOculta"></ListaPerfilesCompetenciales>} </p>
                                <p className="card-title">{idiomas[idioma].filtros.op3}<img onClick={dropFamilia.desplegarLista}  id="dropdown" src={dropFamilia.dropImgSrc} width="30" alt=""></img></p>
                                <p className="card-text">{dropFamilia.dropImg ? <ListaFamiliaProfesionales dameFamiliasSeleccionadas = {dameFamiliasSeleccionadas} visible="listaVisible"></ListaFamiliaProfesionales>
                                                                              : <ListaFamiliaProfesionales dameFamiliasSeleccionadas = {dameFamiliasSeleccionadas} visible="listaOculta"></ListaFamiliaProfesionales>}</p>
                            </div>

                    </div>

                </div>
                </div>
                <ResultadosBusquedaAlumnos familiasSeleccionadas = {familiasSeleccionadas}
                                           perfilesSeleccionados = {perfilesSeleccionados}>
                </ResultadosBusquedaAlumnos>

            </>
    )
}

export default BusquedaAlumnos;
