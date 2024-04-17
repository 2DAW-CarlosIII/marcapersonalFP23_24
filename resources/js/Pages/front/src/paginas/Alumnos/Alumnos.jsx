import { useNavigate} from "react-router-dom";
import { useEffect } from 'react';
import MenuAlumnos from "../../componentes/MenuAlumnos/MenuAlumnos";

const Alumnos = () => {

    const authenticated = localStorage.getItem('authenticated')
    console.log("autenticated", authenticated);
    const navigate = useNavigate();

    // Si estamos autenticados vamos directamente al dashboard
    useEffect(() => { if (authenticated) navigate('/dashboard')}, [authenticated])

    return (
        <>
            {authenticated ? <div></div>
                           :(<div>
                            <div className="row">
                                    <div className="col-md-12"><MenuAlumnos></MenuAlumnos></div>
                            </div>
                            <p>Registrarse en Marca personal</p>
                            <p>Dar de alta su CV (PDF)</p>
                            <p>Participar en las actividades</p>
                            <p>Almacenar el resultado de su proyecto (Nota. En proyectos con varios participantes solo es necesario hacerlo desde uno de los usuarios)</p>
                            <p>Descargar plantilla del proyecto (https://github.com/2DAW-CarlosIII/proyectosTemplate/archive/refs/heads/master.zip)</p>
                            <p>Definir el perfil idiomático</p>
                            <p>Definir el perfil competencial (por hacer)</p>

                            </div>) }
        </>
    )
}
export default Alumnos;
