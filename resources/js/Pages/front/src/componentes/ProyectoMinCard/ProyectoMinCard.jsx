import './ProyectoMinCard.css'
import CiclosFormativos from '../CiclosFormativos/CiclosFormativos';
import AlumnosProyecto from '../AlumnosProyecto/AlumnosProyecto';

import imagenPorDefecto from '../../assets/img/project-svgrepo-com.svg';

const ProyectoMinCard = (props) => {


    function imagenProyecto() {

        console.log(imagenPorDefecto);
        //return props.alumno.avatar===null?imagenPorDefecto:props.alumno.avatar;
        return imagenPorDefecto;
    }


    return (


<div className="ProyectoMinCardRegistro " >

    <div className="infos">
        <div className="image"><img src={imagenProyecto()} className="image  mx-auto d-block img-thumbnail" alt="Alumno"/></div>
        <div className="info">
            <div className="name">{props.proyecto.nombre}</div>
            <div className="stats">
                <AlumnosProyecto alumnos = {props.proyecto.estudiantes}></AlumnosProyecto>
            </div>
            <div className="stats">
            <span><b>Tutor.</b> {props.proyecto.docente_id}</span>
            </div>
            <div className="stats">
                <CiclosFormativos ciclos = {props.proyecto.ciclos}></CiclosFormativos>
            </div>
        </div>
    </div>
    </div>

    )
}
export default ProyectoMinCard;
