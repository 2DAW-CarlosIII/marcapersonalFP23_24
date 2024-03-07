import { useEffect, useState } from "react";

import { getAllFamilias } from "../servicios/getAllFamilias.jsx";


const useFamilias = () => {

    const [listaFamilias, setListaFamilias] = useState([]);

    const [buscando, setBuscando] = useState(false);

    function obtenerFamilias() {

        setBuscando(true);

        getAllFamilias().then(familias => {

            console.log("DATOS", familias);
            setListaFamilias(familias);
            setBuscando(false)

        })

    }

    useEffect(obtenerFamilias, []);

    return ({buscando, listaFamilias});

}

export default useFamilias;