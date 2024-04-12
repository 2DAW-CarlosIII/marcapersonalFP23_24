import { Routes, Route } from "react-router-dom";
import { useState } from "react";

// Componentes ---------------------------------------------------------------------------------------------
import './App.css'
import Empresa from "./paginas/Empresa/Empresa";
import Home from "./paginas/Home/Home";
import BusquedaAlumnos from "./paginas/BusquedaAlumnos/BusquedaAlumnos";
import BusquedaProyectos from "./paginas/BusquedaProyectos/BusquedaProyectos";
import Cabecera from "./componentes/Cabecera/Cabecera";

// Configuración -------------------------------------------------------------------------------------------
import { ES } from "./settings";

// Contextos -----------------------------------------------------------------------------------------------
import IdiomaContext from './contextos/IdiomaContext';
import AlumnoMaxiCard from "./componentes/AlumnoMaxiCard/AlumnoMaxiCard";
import Dashboard from "../../Dashboard";
import Register from "../../Auth/Register";




/*
ICONOS SVG https://www.svgrepo.com/
GENERADOR DE ENDPOINT https://designer.mocky.io/design
FONDOS DE PANTALLA https://bg.ibelick.com/?fbclid=IwAR1kkzbtPPD8oTZow073AJ6ikYwmIUR_eksXaOjgiyTZMfdDMTg6ADfc0bQ

FOOTER SACADO DE https://ordinarycoders.com/blog/article/bootstrap-footers
PALETA DE COLORES https://mycolor.space/?hex=%23364F59&sub=1

COMPONENTES https://uiverse.io/WhiteNervosa/orange-chipmunk-72

EFECTO ICONOS LANDING PAGE https://uiverse.io/gharsh11032000/selfish-owl-57

GRÁFICAS
https://apexcharts.com/docs/installation/

TABCARD
https://ant.design/components/card

CARDS
  https://mdbootstrap.com/docs/standard/extended/profiles/
  https://uiverse.io/Sujitkavaiya/mighty-pig-81

  FONT AWESOME

  https://www.w3schools.com/icons/fontawesome5_icons_brands.asp
*/


function App() {

  const [idiomaElegido, setIdiomaElegido] = useState(ES);


  function seleccionarIdioma(idioma) {

    console.log("PADRE", idioma);
    setIdiomaElegido(idioma);

}

  return (
    <div className="container-fluid">
      <div className="row">
        <div className="col-md-12">
          <Cabecera seleccionarIdioma = {seleccionarIdioma}></Cabecera>
        </div>
      </div>

      <IdiomaContext.Provider value={idiomaElegido}>
        <div className="row">
          <div className="col-md-12">
              <Routes>
                <Route path="/"                           element={<Home></Home>}></Route>
                <Route path="/empresa"                    element={<Empresa></Empresa>}></Route>
                <Route path="/empresa/alumnos"            element={<BusquedaAlumnos></BusquedaAlumnos>}></Route>
                <Route path="/empresa/proyectos"          element={<BusquedaProyectos></BusquedaProyectos>}></Route>
                <Route path="/empresa/alumno/:id"         element={<AlumnoMaxiCard></AlumnoMaxiCard>}></Route>
                <Route path="/dashboard/*"                element={<Dashboard />} />
                <Route path="/register"                   element={<Register />} />
              </Routes>
          </div>
      </div>
     </IdiomaContext.Provider>

    </div>
  )
}

export default App
