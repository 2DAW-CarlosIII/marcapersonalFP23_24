import "./Idioma.css";

const Idioma = (props) => {

    function asignarIdioma(event) {

        props.seleccionarIdioma(event.target.id);
        console.log(event.target.id);
    }

    return (
        <>
        <li  className="nav-item"><a className="nav-link"><img onClick={asignarIdioma} id="es" src="/src/assets/imgIdioma/flag-for-flag-spain-svgrepo-com.svg" width="30" alt=""></img></a></li>
        <li  className="nav-item"><a className="nav-link"><img onClick={asignarIdioma}id="gb" src="/src/assets/imgIdioma/united-kingdom-uk-svgrepo-com.svg" width="30"  alt=""></img><span className="sr-only">(current)</span></a></li>
        </>
    )
}

export default Idioma;