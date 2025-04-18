import { useContext } from 'react';
// Componentes -----------------------------------------------------------
import AjaxLoader from '../../componentes/AjaxLoader/AjaxLoader';
import AlumnoMinCard from "../../componentes/AlumnoMinCard/AlumnoMinCard";

import idiomas from "../../mocks/mock-idiomas";
// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";


import './ResultadosBusquedaAlumnos.css'

import useAlumnos from '../../hooks/useAlumnos';
import useFiltroFamilia from '../../hooks/useFiltroFamilia';
import useFiltroPerfil from '../../hooks/useFiltroPerfil';

const ResultadosBusquedaAlumnos = (props) => {

    const idioma = useContext(IdiomaContext);

    const alumnos = useAlumnos();


    // Filtro primero por familia
    const listaAlumnosFiltradosFamilia = useFiltroFamilia(alumnos.listaAlumnos, props.familiasSeleccionadas);

    // Ahora filtro por perfil competencial sobre la lista ya filtrada por familia
    const listaAlumnos = useFiltroPerfil(listaAlumnosFiltradosFamilia, props.perfilesSeleccionados)
    const hasAlumnos   = listaAlumnos?.length > 0;
    const sinAlumnos   = "Sin Alumnos";

    function mostrarAlumno(alumno) {

        return <AlumnoMinCard key={alumno.id} alumno={alumno}></AlumnoMinCard>
    }

    return (
        <div className="row">
            <div className="col-md-12">
            <div className="card ">
                    <h5 className="card-header h5 colorTexto1">{idiomas[idioma].filtros.op4}</h5>
                    <div className="card-body ListaAlumnos">
                    {alumnos.buscando ? <AjaxLoader></AjaxLoader>
                                      : hasAlumnos ? listaAlumnos.map(mostrarAlumno)
                                                   : sinAlumnos}
                    </div>
            </div>
        </div>
        </div>


    )
}
export default ResultadosBusquedaAlumnos;
