
// Componentes -----------------------------------------------------------
import AjaxLoader from '../AjaxLoader/AjaxLoader';

// Custom Hooks
import useFamilias from "../../hooks/useFamilias";
import FamiliaProfesional from '../FamiliaProfesional/FamiliaProfesional';
import { useState } from 'react';

const ListaFamiliaProfesionales = (props) => {

    const [familiasSeleccionadas, setFamiliasSeleccionadas] = useState([]);

    const familias = useFamilias();

    const hasFamilias = familias.listaFamilias?.length > 0;
    const sinFamilias = "No existen familias profesionales";


    function dameFamiliasSeleccionadas (id, marcado) {

        if (marcado) {
            setFamiliasSeleccionadas([...familiasSeleccionadas, id]);
            props.dameFamiliasSeleccionadas([...familiasSeleccionadas, id]);

        } else {

            let fam = familiasSeleccionadas.filter(item => {return item !== id});
            setFamiliasSeleccionadas(fam)
            props.dameFamiliasSeleccionadas(fam);
        }


    }

    function muestraFamilia(familia) {

        return <FamiliaProfesional key={familia.id}
                                   familia={familia}
                                   dameFamiliaSeleccionada = {dameFamiliasSeleccionadas}>
               </FamiliaProfesional>
    }

    return (

        <div className={props.visible}>
            {familias.buscando ? <AjaxLoader></AjaxLoader>
                      : hasFamilias ? familias.listaFamilias.map(muestraFamilia)
                                    : sinFamilias}
        </div>
    )

}
export default ListaFamiliaProfesionales;
