const AlumnosProyecto = (props) => {

    function muestraAlumno (alumno) {

        return (<div key={alumno.name}>{alumno.nombre} {alumno.apellidos}</div>);
    }

    let alumno = props.alumnos.map(muestraAlumno);
    return (

         <div><b>ALUMNOS</b>
              {alumno}
        </div>
    )

}
export default AlumnosProyecto;