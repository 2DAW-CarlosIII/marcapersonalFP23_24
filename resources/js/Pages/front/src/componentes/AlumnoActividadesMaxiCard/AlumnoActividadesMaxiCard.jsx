import './AlumnoActividadesMaxiCard.css';

const AlumnoActividadesMaxiCard = (props) => {
   

    function muestraActividades (actividad) {

        let clasesInsignia = actividad.insignia + " insignia";

        return <p key={actividad.id}> Nombre. {actividad.nombre}  <br></br>Insiginia. 
        
        <i className={clasesInsignia} insignia></i>
        </p>

    }
    return (

         <span>{props.actividades.map(muestraActividades)}</span>

    )
}
export default AlumnoActividadesMaxiCard;