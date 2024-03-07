const FamiliaProfesional = (props) => {

    let idFamilia = "FA"+ props.familia.id;

    function manejarSeleccion(e) {

        let familia = e.target.id.substr(2);

        // Envío el código de la familia y si está marcada o desmarcada
        props.dameFamiliaSeleccionada(familia, 
                                      e.target.checked);
    }

    return (

        <label className="customCheckBoxHolder checkbox-inline">

            <input type="checkbox" id={idFamilia} className="customCheckBoxInput" onChange={manejarSeleccion}></input>
            <label htmlFor={idFamilia} className="customCheckBoxWrapper">
                    <div className="customCheckBox">
                    <div className="inner">{props.familia.nombre}</div>
                    </div>
            </label>
        </label>
    )

}
export default FamiliaProfesional;