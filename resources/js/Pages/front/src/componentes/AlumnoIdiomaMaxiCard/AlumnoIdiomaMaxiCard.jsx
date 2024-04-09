import useURLBandera from "../../hooks/useURLBandera";
import './AlumnoIdiomaMaxiCard.css'

const AlumnoIdiomaMaxiCard = (props) => {


    function muestraIdioma(idioma, index) {


        let url = useURLBandera(idioma.alpha2);


        //const certificado = (idioma.certificado) ? "C" : "SC";
        const textoCertificado = (idioma.certificado) ? "Certificado": "Sin certificar"

        return (

            <p  className="flexAlumnoIdiomaMaxiCard flex-col" key={"bandera " + index}>
            <abbr title={idioma.native_name}><img src={url} width="60" alt=""></img></abbr>
            <h2><span className="idiomaMaxiCard colorTextoMaxiCard">{idioma.nombre} </span></h2>
            <h6><span className="colorTextoMaxiCard">Nivel <span className="destacadoRojo">{idioma.nivel}</span> </span></h6>
            <span className="destacadoColor">{textoCertificado} </span>
            </p>


        )

    }


    return (
         <>{props.idiomas.map(muestraIdioma)}</>
    )
}
export default AlumnoIdiomaMaxiCard;
