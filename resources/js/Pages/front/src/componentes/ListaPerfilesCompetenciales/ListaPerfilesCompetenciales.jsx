
// Componentes -----------------------------------------------------------
import AjaxLoader from '../AjaxLoader/AjaxLoader';
import PerfilCompetencial from "../PerfilCompetencial/PerfilCompetencia";

// Custom Hooks
import usePerfiles from "../../hooks/usePerfiles";

const ListaPerfilesCompetenciales = () => {

    const perfiles = usePerfiles();

    const hasPerfiles = perfiles.listaPerfiles?.length > 0;
    const sinPerfiles = "No existen perfiles competenciales";

    function muestraPerfil(perfil) {

        return <PerfilCompetencial key={perfil.id}
                                   perfil={perfil}>
               </PerfilCompetencial>

    }

    return (

        <div>
            {perfiles.buscando ? <AjaxLoader></AjaxLoader>
                      : hasPerfiles ? perfiles.listaPerfiles.map(muestraPerfil)
                                    : sinPerfiles}
        </div>
    )

}
export default ListaPerfilesCompetenciales;
