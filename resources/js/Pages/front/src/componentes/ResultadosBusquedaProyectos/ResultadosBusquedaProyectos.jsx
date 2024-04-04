import { useContext } from 'react';
// Componentes -----------------------------------------------------------
import AjaxLoader from '../AjaxLoader/AjaxLoader';
import ProyectoMinCard from "../ProyectoMinCard/ProyectoMinCard";


import './ResultadosBusquedaProyectos.css'

import useProyectos from '../../hooks/useProyectos';
import useFiltroFamilia from '../../hooks/useFiltroFamilia';



import idiomas from "../../mocks/mock-idiomas";
// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";


const ResultadosBusquedaProyectos = (props) => {

    const idioma = useContext(IdiomaContext);

    const proyectos = useProyectos();

    const listaProyectos = useFiltroFamilia(proyectos.listaProyectos, props.familiasSeleccionadas);
    const hasProyectos   = listaProyectos?.length > 0;
    const sinProyectos   = "Sin Proyectos";

    function mostrarProyecto(proyecto) {

        return <ProyectoMinCard key={proyecto.id} proyecto={proyecto}></ProyectoMinCard>
    }

    return (
        <div className="row">
            <div className="col-md-12">
                <div className="card ">
                        <h5 className="card-header h5 colorTexto1">{idiomas[idioma].filtros.op4}</h5>
                        <div className="card-body ListaProyectos">
                        {proyectos.buscando ? <AjaxLoader></AjaxLoader>
                                        : hasProyectos ? listaProyectos.map(mostrarProyecto)
                                                        : sinProyectos}
                        </div>
                </div>
            </div>
        </div>


    )
}
export default ResultadosBusquedaProyectos;
