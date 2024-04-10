import {useState } from "react";

import dropdown from '../assets/img/caretdownminor-svgrepo-com.svg';

import dropup from '../assets/img/caretupminor-svgrepo-com.svg';


const useDropUpDown = () => {


    const [dropImg, setDropImg]  = useState(false);

    const dropImgSrc = dropImg ? dropdown
                               : dropup;


    function desplegarLista() {

        setDropImg(!dropImg);

    }

    return {dropImg, dropImgSrc, desplegarLista}

}

export default useDropUpDown;
