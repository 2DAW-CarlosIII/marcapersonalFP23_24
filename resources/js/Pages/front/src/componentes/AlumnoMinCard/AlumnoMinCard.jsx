import { Link } from "react-router-dom";


import AlumnoIdiomaMinCard from '../AlumnoIdiomaMinCard/AlumnoIdiomaMinCard';
import AlumnoPerfiles from '../AlumnoPerfiles/AlumnoPerfiles';
import CiclosFormativos from '../CiclosFormativos/CiclosFormativos';

import imagenPorDefecto from '../../assets/img/student-boy-svgrepo-com.svg';
import './AlumnoMinCard.css'

const AlumnoMinCard = (props) => {

    const detalleAlumno = "/empresa/alumno/" + props.alumno.id;

    function imagenAlumno() {

        return props.alumno.attachments?.src ?? imagenPorDefecto;
    }

    return (


<div className="AlumnoMinCardRegistro ">
    <div className="infos">
    <Link  to={detalleAlumno}>
        <div className="image"><img src={imagenAlumno()} className="image  mx-auto d-block img-thumbnail" alt="Alumno"/></div>
        </Link>
        <div className="info">
            <div className="name">{props.alumno.nombre} {props.alumno.apellidos}</div>
            <div className="stats">
                <AlumnoIdiomaMinCard idiomas = {props.alumno.idiomas}></AlumnoIdiomaMinCard>
            </div>
            <div className="stats">
                <AlumnoPerfiles perfiles = {props.alumno.PC}></AlumnoPerfiles>
            </div>
            <div className="stats">
                <CiclosFormativos ciclos = {props.alumno.ciclos}></CiclosFormativos>
            </div>
        </div>
    </div>
    <p className="AlumnoMinCardSobreMi">{props.alumno.sobre_mi}</p>

</div>

    )
}
export default AlumnoMinCard;
