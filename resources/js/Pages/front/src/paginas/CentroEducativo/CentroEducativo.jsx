import { useNavigate} from "react-router-dom";
import { useEffect } from 'react';
import MenuCentroEducativo from "../../componentes/MenuCentroEducativo/MenuCentroEducativo";

const CentroEducativo = () => {

    const authenticated = localStorage.getItem('authenticated')
    const navigate = useNavigate();

    // Si estamos autenticados vamos directamente al dashboard
    useEffect(() => { if (authenticated) navigate('/dashboard')}, [authenticated])

    return (
        <>
            {authenticated ? <div></div>
                           :(<div>
                            <div className="row">
                                    <div className="col-md-12"><MenuCentroEducativo></MenuCentroEducativo></div>
                            </div>
                            <p>Invitar empresas</p>
                            <p>Crear y configurar los proyectos de sus alumnos</p>
                            <p>Crear Actividades</p>
                            <p>Asociar competencias a las actividades</p>
                            <p>Validar la participación de los alumnos en las actividades</p>
                            </div>) }
        </>
    )
}
export default CentroEducativo;
