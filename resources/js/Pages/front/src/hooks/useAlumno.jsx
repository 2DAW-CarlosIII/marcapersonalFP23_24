import { useEffect, useState } from "react";

import { getAlumno } from "../servicios/getAlumno.jsx";


const useAlumno = (id) => {


    const [alumno, setAlumno] = useState({});

    const [buscando, setBuscando] = useState(true);

    function obtenerAlumno() {

        setBuscando(true);

        getAlumno(id).then(alumno => {

            setAlumno(alumno);
            setBuscando(false)
        })
    }

    useEffect(obtenerAlumno, [id]);


    return {buscando, alumno};

}

export default useAlumno;