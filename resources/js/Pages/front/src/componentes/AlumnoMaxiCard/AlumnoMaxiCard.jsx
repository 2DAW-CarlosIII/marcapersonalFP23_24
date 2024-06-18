import {Link, useParams } from "react-router-dom";
import React, { useState } from 'react';
import useAlumno from '../../hooks/useAlumno';

import { Card, Typography} from 'antd';

import AlumnoIdiomaMaxiCard from "../AlumnoIdiomaMaxiCard/AlumnoIdiomaMaxiCard";
import CiclosFormativosMaxiCard from "../CiclosFormativosMaxiCard/CiclosFormativosMaxiCard";
import AlumnoProyectosMaxiCard from "../AlumnoProyectosMaxiCard/AlumnoProyectosMaxiCard";
import AlumnoActividadesMaxiCard from "../AlumnoActividadesMaxiCard/AlumnoActividadesMaxiCard";

import imagenPorDefecto from '../../assets/img/student-boy-svgrepo-com.svg';
import { Button } from '@mui/material';

import './AlumnoMaxiCard.css'

const AlumnoMaxiCard = () => {

    // En {idAlumno} tenemos el id del alumno que usaremos para recuperar los datos del mismo con el hook useAlumno
    let {id} = useParams();

    const alumno = useAlumno(id);

    console.log(alumno.buscando)

/*    const pdfCV = alumno.buscando ? "" :
                        alumno.alumno.curriculo===null ? ""
                                                       :alumno.alumno.curriculo.pdf_curriculum;
*/
    const videoCV = alumno.buscando ? "" :
                        alumno.alumno.curriculo===null ? ""
                                                       : alumno.alumno.curriculo.video_curriculum;

    const idiomas = alumno.buscando ? [] : alumno.alumno.idiomas;

    const tabListNoTitle = [
        {
          key: 'Idiomas',
          label: 'Idiomas',
        },
        {
          key: 'Actividades',
          label: 'Actividades',
        },
        {
          key: 'Proyectos',
          label: 'Proyectos',
        },
        {
            key: 'Competencias',
            label: 'Competencias',
          },
          {
            key: 'Ciclos',
            label: 'Ciclos',
          }
          ];
      const contentListNoTitle = {
        Idiomas: <div className="stats"><AlumnoIdiomaMaxiCard idiomas = {idiomas}></AlumnoIdiomaMaxiCard></div>,
        Actividades: <AlumnoActividadesMaxiCard actividades = {alumno.alumno.actividades}></AlumnoActividadesMaxiCard>,
        Proyectos: <AlumnoProyectosMaxiCard proyectos={alumno.alumno.proyectos}></AlumnoProyectosMaxiCard>,
        Ciclos: <CiclosFormativosMaxiCard ciclos = {alumno.alumno.ciclos}></CiclosFormativosMaxiCard>
      };

      const [activeTabKey2, setActiveTabKey2] = useState('Idiomas');

      const onTab2Change = (key) => {
        setActiveTabKey2(key);
      };

      function imagenAlumno() {

        return alumno.alumno.attachments?.src ?? imagenPorDefecto;
    }


    return (

          <div>


              <>
                <div className="infos">
                  <div className="imageMaxiCard"><img src={imagenAlumno()} className="imageMaxiCard  mx-auto d-block img-thumbnail" alt="Alumno"/>
                  </div>
                  <div className="flexMaxiCard flex-col ">
                    <span className="AlumnoMaxiCardSobreMi">Contacto.</span>
                    <p><span className="AlumnoMaxiCardSobreMi"> {alumno.alumno.email}</span></p>
                    <Button variant="contained" color="primary" href={`${import.meta.env.VITE_JSON_SERVER_URL}/curriculos/${alumno.alumno.curriculo?.id}/pdf`}>
                                    Descargar currículo de estudiante
                    </Button>
                    <p><span className="AlumnoMaxiCardSobreMi"> {videoCV} </span></p>
                    <span className="AlumnoMaxiCardSobreMi">Sobre mi.</span>
                    <p><span className="AlumnoMaxiCardSobreMi"> {alumno.alumno.sobre_mi}</span></p>

                  </div>

                </div>
                <div className="nameMaxiCard">{alumno.alumno.nombre} {alumno.alumno.apellidos}</div>


                <Card
                  style={{
                    width: '100%',
                    minHeight:'50%'
                  }}
                  headStyle={{backgroundColor: '#F59432', colorText:'#ffffff'}}
                  loading={alumno.buscando}
                  tabList={tabListNoTitle}
                  activeTabKey={activeTabKey2}
                  onTabChange={onTab2Change}
                  tabProps={{
                    size: 'middle',
                  }}
                >
                  {contentListNoTitle[activeTabKey2]}
                </Card>

              </>




          <hr></hr>
                  <Link to="/empresa/alumnos">Volver</Link>


          </div>
    )

}
export default AlumnoMaxiCard;
