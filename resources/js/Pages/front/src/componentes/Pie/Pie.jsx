import Facebook from '../../assets/imgPie/facebook-svgrepo-com.svg';
import Twitter from '../../assets/imgPie/twitter-rounded-com.svg';
import Instagram from '../../assets/imgPie/instagram-svgrepo-com.svg';
import TikTok from '../../assets/imgPie/brand-tiktok-sq-svgrepo-com.svg';
import Youtube from '../../assets/imgPie/youtube-168-svgrepo-com.svg';

import LogoInvertido from '../../assets/img/mp-logoReves.png';

import { useContext } from "react";

import useTotales from  '../../hooks/useTotales';

// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from "../../contextos/IdiomaContext";

import idiomas from "../../mocks/mock-idiomas";

import './Pie.css'

const Pie = () => {

  const idioma = useContext(IdiomaContext);

  const datos = useTotales();

  const empresas = (datos.buscando) ? "0" :datos.totales.empresas;
  const proyectos = (datos.buscando) ? "0" :datos.totales.proyectos;
  const alumnos = (datos.buscando) ? "0" :datos.totales.alumnos;

    return (
        <footer id="footer" className=" text-white d-flex-column text-center">

        {/*<!--/.Social buttons-->*/}
        <hr className="mb-0 colorFondoPie2"/>


        {/*<!--Footer Links-->*/}
        <div className="container text-left text-md-center colorFondoPie2 ">
          <div className="row">
            {/*<!--First column-->*/}
            <div className="col-md-3 mx-auto shfooter">
              <h5 className="my-2 font-weight-bold d-none d-md-block">{idiomas[idioma].estadisticaInicial.op1}</h5>
              <div className="d-md-none title" data-target="#Product" data-toggle="collapse">
                <div className="mt-3 font-weight-bold">Empresas
                </div>
              </div>
              <ul className="list-unstyled" id="Product">
                <li><h4 className="display-4">{empresas}</h4></li>
              </ul>
            </div>
            {/*<!--/.First column-->*/}
            <hr className="clearfix w-100 d-md-none mb-0"/>
            {/*<!--Second column-->*/}
            <div className="col-md-3 mx-auto shfooter">
              <h5 className="my-2 font-weight-bold d-none d-md-block">{idiomas[idioma].estadisticaInicial.op2}</h5>
              <div className="d-md-none title" data-target="#Company" data-toggle="collapse">
                <div className="mt-3 font-weight-bold">Proyectos
                </div>
              </div>
              <ul className="list-unstyled" id="Company">
                <li><h4 className="display-4">{proyectos}</h4></li>
              </ul>
            </div>
            {/*<!--/.Second column-->*/}
            <hr className="clearfix w-100 d-md-none mb-0"/>
            {/*<!--Third column-->*/}
            <div className="col-md-3 mx-auto shfooter">
              <h5 className="my-2 font-weight-bold d-none d-md-block">{idiomas[idioma].estadisticaInicial.op3}</h5>
              <div className="d-md-none title" data-target="#Resources" data-toggle="collapse">
                <div className="mt-3 font-weight-bold">Alumnos
                </div>
              </div>
              <ul className="list-unstyled " id="Resources">
                <li><h4 className="display-4">{alumnos}</h4></li>
              </ul>
            </div>
            {/*<!--/.Third column-->*/}
            <hr className="clearfix w-100 d-md-none mb-0"/>
          </div>
        </div>





        <hr className="mt-0"/>
        {/*<!--Social buttons-->*/}
        <div className="text-center">
        <li className="list-inline-item"><h4>CIFP Carlos III </h4></li>
        <ul className="list-unstyled list-inline ">
        <li className="list-inline-item"><small>C/ Carlos III, 30201 - Cartagena | 30019702@murciaeduca.es |  968321301</small></li>
        </ul>
          <ul className="list-unstyled list-inline ">
            <li className="list-inline-item"><a href="https://www.facebook.com/cifpcarlos3" target='_blank'><img src={Facebook} width="30"  alt=""></img></a></li>
            <li className="list-inline-item"><a href="https://twitter.com/cifpcarlos3" target='_blank'><img src={Twitter} width="30"  alt=""></img></a></li>
            <li className="list-inline-item"><a href="https://www.instagram.com/cifpcarlos3/" target='_blank'><img src={Instagram} width="31" alt=""></img></a></li>
            <li className="list-inline-item"><a href="https://www.tiktok.com/@cifpcarlos3" target='_blank'><img src={TikTok} width="33"  alt=""></img></a></li>
            <li className="list-inline-item"><a href="https://www.youtube.com/c/cifpcarlosiiicartagena" target='_blank'><img src={Youtube} width="30"  alt=""></img></a></li>
          </ul>
        </div>
       {/* <!--/.Footer Links-->*/}
        <hr className="mb-0"/>
        {/*<!--Copyright-->*/}
        <div className="py-3 text-center">
        <h6><img id="LogoInvertidoPie" src={LogoInvertido} className="align-baseline" width="70" height="30"  alt="Logo Marca Personal"></img>Marca PersonaL FP <small> | {idiomas[idioma].disenoInicial.op1} CFGS Desarrollo de Aplicaciones Web © 2024</small></h6>
        </div>

        </footer>
    )
}
export default Pie;
