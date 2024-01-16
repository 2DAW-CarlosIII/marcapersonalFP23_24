import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';
import {
    UserEdit, UserList, UserTitle, UserCreate, UserShow
} from '../Pages/users';

import UserIcon from '@mui/icons-material/AccountCircle';
import { ReconocimientoList, ReconocimientoEdit, ReconocimientoShow, ReconocimientoCreate } from './pages/reconocimientos';
import ReconocimientoIcon from '@mui/icons-material/AccountTree';
import CicloIcon from '../Pages/iconos/CicloIcons';
import { CicloCreate, CicloEdit, CicloList, CicloShow } from '../Pages/Ciclos'

import { ProyectoList, ProyectoEdit, ProyectoShow, ProyectoCreate } from '../Pages/Proyectos';
import ProyectoIcon from '@mui/icons-material/AccountTree';
export const App = () => (
    <Admin
        dataProvider={dataProvider}
        authProvider={authProvider}
    >
        <Resource
            name="users"
            icon={UserIcon}
            list={UserList}
            edit={UserEdit}
            show={UserShow}
            create={UserCreate} />
        <Resource name="curriculos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="proyectos"
          icon={ProyectoIcon}
          list={ProyectoList}
          edit={ProyectoEdit}
          show={ProyectoShow}
          create={ProyectoCreate}/>
        <Resource name="ciclos" list={CicloList} edit={CicloEdit} show={CicloShow} create={CicloCreate} icon={CicloIcon} />
        <Resource name="familias_profesionales" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="actividades" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="reconocimientos"
            icon={ReconocimientoIcon}
            list={ReconocimientoList}
            edit={ReconocimientoEdit}
           show={ReconocimientoShow}
          create={ReconocimientoCreate}
        />
    </Admin>
);
