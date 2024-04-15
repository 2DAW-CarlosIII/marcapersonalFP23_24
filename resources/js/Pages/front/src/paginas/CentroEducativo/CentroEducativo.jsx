import { useNavigate} from "react-router-dom";
import MenuCentroEducativo from "../../componentes/MenuCentroEducativo/MenuCentroEducativo";
import {useCheckAuth} from 'ra-core';
import { useEffect } from "react";

/* ALUMNO
    Registrarse en Marca personal
    Dar de alta su CV (PDF)
    Participar en las actividades
    Almacenar el resultado de su proyecto (Nota. En proyectos con varios participantes solo es necesario hacerlo desde uno de los usuarios)
    Descargar plantilla del proyecto (https://github.com/2DAW-CarlosIII/proyectosTemplate/archive/refs/heads/master.zip)
    Definir el perfil idiomático
    Definir el perfil competencial (por hacer)
 */

/*
        <Link to="/dashboard">
                            <div className="cardLP" >
                                Dashboard
                            </div>

        </Link>
*/
const CentroEducativo = () => {
/*
console.log("1");
    const checkAuth = useCheckAuth();
    console.log("2", checkAuth);
    const navigate = useNavigate();
    console.log("3");
    useEffect(() => {
        checkAuth({}, false)
            .then(() => {

                // already authenticated, redirect to the home page
                navigate('/dashboard');
            })
            .catch(() => {

                // not authenticated, stay on the login page
            });
    }, [checkAuth, navigate]);

*/
    return (

        <div>
            <div className="row">
                    <div className="col-md-12"><MenuCentroEducativo></MenuCentroEducativo></div>
            </div>
            <p>Invitar empresas</p>
            <p>Crear y configurar los proyectos de sus alumnos</p>
            <p>Crear Actividades</p>
            <p>Asociar competencias a las actividades</p>
            <p>Validar la participación de los alumnos en las actividades</p>

        </div>
    )

}
export default CentroEducativo;
