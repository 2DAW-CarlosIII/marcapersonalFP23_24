import './CiclosFormativosMaxiCard.css';


const CiclosFormativosMaxiCard = (props) => {

    function muestraCiclo (ciclo) {

        return <p key={ciclo.id}> <h4><span className='MCciclo'>({ciclo.codCiclo})</span> - <span className='MCnombreCiclo'>{ciclo.nombre}</span></h4> <span className='MCfamiliaProfesional' >({ciclo.familia_profesional.nombre})</span></p>

    }
    return (

         <span>{props.ciclos.map(muestraCiclo)}</span>


    )
}
export default CiclosFormativosMaxiCard;