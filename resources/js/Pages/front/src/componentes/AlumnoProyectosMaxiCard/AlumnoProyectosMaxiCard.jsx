
const AlumnoProyectosMaxiCard = (props) => {


    function muestraProyectos (proyecto) {

        return <p key={proyecto.id}> Nombre. {proyecto.nombre}  <br></br>Calificación. {proyecto.calificacion}</p>

    }
    return (

         <span>{props.proyectos.map(muestraProyectos)}</span>

    )
}
export default AlumnoProyectosMaxiCard;