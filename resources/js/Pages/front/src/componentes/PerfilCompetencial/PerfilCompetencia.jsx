/*
            <label className="checkbox-inline">{props.perfil.nombrePerfil}
                    <input id="a" type="checkbox" value=""></input>
            </label>
*/
import './PerfilCompetencial.css';

const PerfilCompetencial = (props) => {

        let idPerfil = "PE" + props.perfil.id;
    return (

        <label className="customCheckBoxHolder checkbox-inline">

                <input type="checkbox" id={idPerfil} className="customCheckBoxInput"></input>
                <label htmlFor={idPerfil} className="customCheckBoxWrapper">
                        <div className="customCheckBox">
                        <div className="inner">{props.perfil.nombre}</div>
                        </div>
                </label>
        </label>



    )

}
export default PerfilCompetencial;
