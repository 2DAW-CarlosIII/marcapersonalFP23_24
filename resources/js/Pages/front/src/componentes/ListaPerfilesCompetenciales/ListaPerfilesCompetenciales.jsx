
// Componentes -----------------------------------------------------------
import AjaxLoader from '../AjaxLoader/AjaxLoader';
import PerfilCompetencial from "../PerfilCompetencial/PerfilCompetencia";

// Custom Hooks
import usePerfiles from "../../hooks/usePerfiles";
import { useState } from 'react';

const ListaPerfilesCompetenciales = (props) => {

    const [perfilesSeleccionados, setPerfilesSeleccionadas] = useState([]);

    const perfiles = usePerfiles();

    const hasPerfiles = perfiles.listaPerfiles?.length > 0;
    const sinPerfiles = "No existen perfiles competenciales";


    function damePerfilesSeleccionados (id, marcado) {

        if (marcado) {
            setPerfilesSeleccionadas([...perfilesSeleccionados, id]);
            props.damePerfilesSeleccionados([...perfilesSeleccionados, id]);

        } else {

            let per = perfilesSeleccionados.filter(item => {return item !== id});
            setPerfilesSeleccionadas(per)
            props.damePerfilesSeleccionados(per);
        }


    }


    function muestraPerfil(perfil) {

        return <PerfilCompetencial key={perfil.id}
                                   perfil={perfil}
                                   damePerfilSeleccionado = {damePerfilesSeleccionados}>
               </PerfilCompetencial>

    }

    return (

        <div className={props.visible}>
            {perfiles.buscando ? <AjaxLoader></AjaxLoader>
                      : hasPerfiles ? perfiles.listaPerfiles.map(muestraPerfil)
                                    : sinPerfiles}
        </div>
    )

}
export default ListaPerfilesCompetenciales;
