import { useEffect, useState } from "react";

import { getAllPerfiles } from "../servicios/getAllPerfiles.jsx";


const usePerfiles = () => {

    const [listaPerfiles, setListaPerfiles] = useState([]);

    const [buscando, setBuscando] = useState(false);

    function obtenerPerfiles() {

        setBuscando(true);

        getAllPerfiles().then(perfiles => {

            console.log("DATOS", perfiles);
            setListaPerfiles(perfiles);
            setBuscando(false)

        })

    }

    useEffect(obtenerPerfiles, []);

    return ({buscando, listaPerfiles});

}

export default usePerfiles;