import useURLBandera from "../../hooks/useURLBandera";


const AlumnoIdiomaMinCard = (props) => {


    function muestraIdioma(idioma, index) {

        let url = useURLBandera(idioma.alpha2);

        const certificado = (idioma.certificado) ? "C" : "SC";
        const textoCertificado = certificado==="C" ? "Certificado": "Sin certificar"

        return (

            <p className="flex flex-col" key={"bandera " + index}>
            <abbr title={idioma.native_name}><img src={url} width="35" alt=""></img></abbr>
            <span className="state-value">{idioma.nivel}
            </span>
            <span className="state-value" >
            <abbr title={textoCertificado}>{certificado}</abbr>
            </span>
            </p>
        )
    }
    return (
         <>{props.idiomas.map(muestraIdioma)}</>
    )
}
export default AlumnoIdiomaMinCard;
