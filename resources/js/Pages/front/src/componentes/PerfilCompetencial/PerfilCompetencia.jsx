/*
            <label className="checkbox-inline">{props.perfil.nombrePerfil}
                    <input id="a" type="checkbox" value=""></input>
            </label>
*/
import './PerfilCompetencial.css';

const PerfilCompetencial = (props) => {

        let idPerfil = "PE" + props.perfil.id;

        function manejarSeleccion(e) {

            let perfil = e.target.id.substr(2);

            // Envío el código de la familia y si está marcada o desmarcada
            props.damePerfilSeleccionado(perfil,
                                          e.target.checked);
        }


    return (

        <label className="customCheckBoxHolder checkbox-inline">

                <input type="checkbox" id={idPerfil} className="customCheckBoxInput"onChange={manejarSeleccion}></input>
                <label htmlFor={idPerfil} className="customCheckBoxWrapper">
                        <div className="customCheckBox">
                        <div className="inner">{props.perfil.nombre}</div>
                        </div>
                </label>
        </label>



    )

}
export default PerfilCompetencial;
