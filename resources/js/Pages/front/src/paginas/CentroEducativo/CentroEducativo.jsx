import { Link } from "react-router-dom";

/* ALUMNO
    Registrarse en Marca personal
    Dar de alta su CV (PDF)
    Participar en las actividades
    Almacenar el resultado de su proyecto (Nota. En proyectos con varios participantes solo es necesario hacerlo desde uno de los usuarios)
    Descargar plantilla del proyecto (https://github.com/2DAW-CarlosIII/proyectosTemplate/archive/refs/heads/master.zip)
    Definir el perfil idiomático
    Definir el perfil competencial (por hacer)
 */


const CentroEducativo = () => {


    return (

        <div>Invitar empresas
            Crear y configurar los proyectos de sus alumnos
            Crear Actividades
            Asociar competencias a las actividades
            Validar la participación de los alumnos en las actividades


        <Link to="/dashboard">
                            <div className="cardLP" >
                                Dashboard
                            </div>

        </Link>


        </div>
    )

}
export default CentroEducativo;
