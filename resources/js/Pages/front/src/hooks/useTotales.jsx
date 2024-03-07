import { useEffect, useState } from "react";

import { getAllTotales } from "../servicios/getAllTotales.jsx";


const useTotales = () => {

    const [totales, setTotales] = useState();

    const [buscando, setBuscando] = useState(true);

    function obtenerTotales() {

        setBuscando(true);

        getAllTotales().then(totales => {

            //console.log("DATOS", perfiles);
            setTotales(totales);
            setBuscando(false)

        })

    }

    useEffect(obtenerTotales, []);

    return ({buscando, totales});

}

export default useTotales;