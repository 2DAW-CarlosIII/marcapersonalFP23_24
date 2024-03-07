import { Link } from "react-router-dom";

import { useContext } from "react";

//import Company from '../../assets/imgHome/company-small-24px-svgrepo-com.svg';
//import Student from '../../assets/imgHome/student-person-svgrepo-com.svg';
//import School from '../../assets/imgHome/school-college-svgrepo-com.svg';

// Componentes ---------------------------------------------------------------------------------------------
//import Company from '../../assets/imgHome/company-small-24px-svgrepo-com-Azul.svg';
//import Student from '../../assets/imgHome/student-person-svgrepo-com-Azul.svg';
//import School from '../../assets/imgHome/school-college-svgrepo-com-Azul.svg';

import Company from '../../assets/imgHome/empresa.jpg';
import Student from '../../assets/imgHome/student.jpg';
import School from '../../assets/imgHome/school.jpg';


import Pie from '../../componentes/Pie/Pie';

import idiomas from "../../mocks/mock-idiomas";


// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";
import './Home.css'
import BotonLanding from "../../componentes/BotonLanding/BotonLanding";



const Home = () => {

    const idioma = useContext(IdiomaContext);

    return (
        <div className="align-middle fondo">
            <div className="row altura">
                    <div className="col-md-4">
                            <Link to="/empresa">
                            <BotonLanding  titulo ={idiomas[idioma].botoneraInicial.op1}
                                        sourceImg ={Company} ></BotonLanding>
                            </Link>
                    </div>
                    <div className="col-md-4 ">

                    <div className="cardLP">
                    <Link to="/centroeducativo">
                    <BotonLanding  titulo ={idiomas[idioma].botoneraInicial.op2}
                                   sourceImg ={School} ></BotonLanding>
                            </Link>
                    </div>



                    </div>
                    <div className="col-md-4">

                    <Link to="/alumno">
                    <div className="cardLP" >
                    <BotonLanding  titulo ={idiomas[idioma].botoneraInicial.op3}
                                   sourceImg ={Student} ></BotonLanding>
                    </div>
                    </Link>


                    </div>                            
            </div>
            <div className="row">
                    <div className="col-md-12"><Pie></Pie></div>
            </div>

        </div>

    )
}

export default Home;







