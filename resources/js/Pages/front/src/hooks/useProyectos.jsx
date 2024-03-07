import { useEffect, useState } from "react";

import { getAllProyectos } from "../servicios/getAllProyectos.jsx";


const useProyectos = () => {

    const [listaProyectos, setListaProyectos] = useState([]);

    const [buscando, setBuscando] = useState(false);

    function obtenerProyectos() {

        setBuscando(true);

        getAllProyectos().then(proyectos => {

            setListaProyectos(proyectos);
            setBuscando(false)
        })
    }

    useEffect(obtenerProyectos, []);

    return ({buscando, listaProyectos});

}

export default useProyectos;