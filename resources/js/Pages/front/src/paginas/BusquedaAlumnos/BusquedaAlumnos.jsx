import { useState } from 'react';

import ListaPerfilesCompetenciales from '../../componentes/ListaPerfilesCompetenciales/ListaPerfilesCompetenciales'
import ListaFamiliaProfesionales from '../../componentes/ListaFamiliaProfesionales/ListaFamiliaProfesionales'
import MenuEmpresa from '../../componentes/MenuEmpresa/MenuEmpresa';
import ResultadosBusquedaAlumnos from '../../componentes/ResultdosBusquedaAlumnos/ResultadosBusquedaAlumnos';

const BusquedaAlumnos = () => {

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
                            <h5 className="card-header h5 colorTexto1">Busca a tus Alumnos</h5>
                            <div className="card-body">
                                <p className="card-title">Filtra por perfil competencial</p>
                                <p className="card-text"><ListaPerfilesCompetenciales></ListaPerfilesCompetenciales></p>
                                <p className="card-title">Filtra por familia profesional</p>
                                <p className="card-text"><ListaFamiliaProfesionales dameFamiliasSeleccionadas = {dameFamiliasSeleccionadas}></ListaFamiliaProfesionales></p>
                            </div>
                            
                    </div>
                    
                </div>
                </div>
                <ResultadosBusquedaAlumnos familiasSeleccionadas = {familiasSeleccionadas}></ResultadosBusquedaAlumnos>

            </>
    )
}

export default BusquedaAlumnos;

