// CUSTOM HOOK
// Recibe dos listas:
//     1.  Una lista de elementos que tienen una o varias familias profesionales 
//     2.  Una lista de familias profesionales.
// Devuelve la lista 1 con los elementos que contienen alguna de las familias de la lista 2
// Lo uso tanto en ResultadosBusquedaAlumnos como en ResultadosBusquedaProyectos


const useFiltroFamilia = (listaAFiltrar, familiasSeleccionadas) => {

    const lista = listaAFiltrar.filter(filtraListaFamilias);

    function incluyeFamilia(ciclo){

        //console.log("INCLUYE fa selecc ", familiasSeleccionadas)
        
        // Concateno familia_profesional.id con "" para hacerlo una cadena de texto
        let incluye = familiasSeleccionadas.includes(ciclo.familia_profesional.id+"");
        //console.log("INCLUYE ", ciclo.familia_profesional.id, incluye)
        return incluye;

    }


    function filtraListaFamilias(elemento) {

        let elementoExiste=true;

        //console.table ("FILTRO FA", familiasSeleccionadas);
        //console.table ("FILTRO FA ciclos. ",elemento.ciclos);

        if (familiasSeleccionadas.length>0) {

            //console.table("FAM SELECCIONADAS", familiasSeleccionadas);

            let existe = elemento.ciclos.filter(incluyeFamilia);

            //console.log("Familia existe, elemento válido ", existe);

            if (existe.length===0) elementoExiste=false;
    
        }        

        return elementoExiste;
    }

    return (lista);

}

export default useFiltroFamilia;
