import { useEffect, useState } from "react";

import { getAllAlumnos } from "../servicios/getAllAlumnos.jsx";


const useAlumnos = () => {

    const [listaAlumnos, setListaAlumnos] = useState([]);

    const [buscando, setBuscando] = useState(false);

    function obtenerAlumnos() {

        setBuscando(true);

        getAllAlumnos().then(alumnos => {

            setListaAlumnos(alumnos);
            setBuscando(false)
        })
    }

    useEffect(obtenerAlumnos, []);

    return ({buscando, listaAlumnos});

}

export default useAlumnos;