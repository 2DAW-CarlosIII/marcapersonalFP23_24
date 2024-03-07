
const CiclosFormativos = (props) => {

    function muestraCiclo (ciclo) {

        //return ciclo.nombre;
        return <abbr key={ciclo.id} title={ciclo.nombre}>{ciclo.codCiclo} | </abbr>

    }



//    let ciclos = props.ciclos.map(muestraCiclo);
//    ciclos =ciclos.toString("");
//    ciclos = ciclos.replaceAll(",", " | ");

/*                  <p className="flex flex-col">
                </p>
 */

    return (

//         <span><b>Ciclos.</b> {ciclos}</span>
         <span><b>Ciclos.</b> {props.ciclos.map(muestraCiclo)}</span>


    )
}
export default CiclosFormativos;