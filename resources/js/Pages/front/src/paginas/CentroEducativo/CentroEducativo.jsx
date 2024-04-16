import { useNavigate} from "react-router-dom";
import { useEffect } from 'react';
import MenuCentroEducativo from "../../componentes/MenuCentroEducativo/MenuCentroEducativo";
import AjaxLoader from "../../componentes/AjaxLoader/AjaxLoader";
import { useAuthState, useAuthenticated, Loading, useLogin, useGetIdentity } from 'react-admin';

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


const authenticated = localStorage.getItem('authenticated')
console.log("autenticated", authenticated);
const navigate = useNavigate();

/*
    console.log("2xxx ");
    const { isLoading, authenticated } = useAuthState();
    console.log("4xxx ", isLoading, authenticated);

<div>
                       : authenticated ? navigate('/dashboard')
                                       :
                                       (<div>
                                       <div className="row">
                                               <div className="col-md-12"><MenuCentroEducativo></MenuCentroEducativo></div>
                                       </div>
                                       <p>Invitar empresas</p>
                                       <p>Crear y configurar los proyectos de sus alumnos</p>
                                       <p>Crear Actividades</p>
                                       <p>Asociar competencias a las actividades</p>
                                       <p>Validar la participación de los alumnos en las actividades</p>
                                        </div>)
                           }
        </div>
    */
        useEffect(() => { if (authenticated) navigate('/dashboard')}, [authenticated])


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
