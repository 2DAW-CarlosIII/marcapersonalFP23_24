import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';

// Icons
import UserIcon from '@mui/icons-material/AccountCircle';
import ReconocimientoIcon from '@mui/icons-material/AccountTree';
import CicloIcon from '@mui/icons-material/School';
import ProyectoIcon from '@mui/icons-material/AccountTree';
import CurriculoIcon from '@mui/icons-material/Badge';
import FamiliaIcon from '@mui/icons-material/Work';
import ActivityIcon from '@mui/icons-material/LocalActivity';

import { ReconocimientoList, ReconocimientoEdit, ReconocimientoShow, ReconocimientoCreate } from './Pages/Reconocimientos';
import { CicloCreate, CicloEdit, CicloList, CicloShow } from './Pages/Ciclos';
import { EmpresaList, EmpresaEdit, EmpresaShow, EmpresaCreate } from './Pages/Empresas';
import {
    UserEdit, UserList, UserTitle, UserCreate, UserShow
} from './Pages/Users';
import { ProyectoList, ProyectoEdit, ProyectoShow, ProyectoCreate } from './Pages/Proyectos';
import { CurriculoCreate, CurriculoEdit, CurriculoList, CurriculoShow } from './Pages/Curriculos';
import { ActividadCreate, ActividadEdit, ActividadList, ActividadShow } from './Pages/Actividad';
import { FamiliaProfesionalCreate, FamiliaProfesionalEdit, FamiliaProfesionalList, FamiliaProfesionalShow } from './Pages/FamiliaProfesional';

export const App = () => (
    <Admin
        dataProvider={dataProvider}
        authProvider={authProvider}
        basename='/dashboard'
    >
        <Resource
            name="users"
            icon={UserIcon}
            list={UserList}
            edit={UserEdit}
            show={UserShow}
            create={UserCreate} />
        <Resource
            name="curriculos"
            list={CurriculoList}
            edit={CurriculoEdit}
            show={CurriculoShow}
            create={CurriculoCreate}
            icon={CurriculoIcon}
        />
        <Resource
            name="proyectos"
            icon={ProyectoIcon}
            list={ProyectoList}
            edit={ProyectoEdit}
            show={ProyectoShow}
            create={ProyectoCreate}
        />
        <Resource
            name="ciclos"
            list={CicloList}
            edit={CicloEdit}
            show={CicloShow}
            create={CicloCreate}
            icon={CicloIcon}
        />
        <Resource
            name="familias_profesionales"
            list={FamiliaProfesionalList}
            edit={FamiliaProfesionalEdit}
            show={FamiliaProfesionalShow}
            create={FamiliaProfesionalCreate}
            icon={FamiliaIcon}
        />
        <Resource
            name="actividades"
            list={ActividadList}
            edit={ActividadEdit}
            show={ActividadShow}
            create={ActividadCreate}
            icon={ActivityIcon}
        />
        <Resource
            name="reconocimientos"
            icon={ReconocimientoIcon}
            list={ReconocimientoList}
            edit={ReconocimientoEdit}
            show={ReconocimientoShow}
            create={ReconocimientoCreate}
        />
        <Resource
            name="empresas"
            icon={FamiliaIcon}
            list={ReconocimientoList}
            edit={ReconocimientoEdit}
            show={ReconocimientoShow}
            create={ReconocimientoCreate}
        />
    </Admin>
);
