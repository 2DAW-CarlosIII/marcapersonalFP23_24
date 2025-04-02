// CUSTOM HOOK
// Recibe dos listas:
//     1.  Una lista de elementos que tienen una o varios perfiles competenciales
//     2.  Una lista de perfiles competenciales
// Devuelve la lista 1 con los elementos que contienen alguno de los perfiles de la lista 2
// Lo uso tanto en ResultadosBusquedaAlumnos como en ResultadosBusquedaProyectos


const useFiltroPerfil = (listaAFiltrar, perfilesSeleccionados) => {

    const lista = listaAFiltrar.filter(filtraListaPerfiles);

    function incluyePerfil(competencias){

        // Concateno familia_profesional.id con "" para hacerlo una cadena de texto
        let incluye = perfilesSeleccionados.includes(competencias.id+"");

        return incluye;
    }


    function filtraListaPerfiles(elemento) {

        let elementoExiste=true;


        if (perfilesSeleccionados.length>0) {

            let existe = elemento.competencias.filter(incluyePerfil);

            if (existe.length===0) elementoExiste=false;

        }

        return elementoExiste;
    }

    return (lista);

}

export default useFiltroPerfil;
