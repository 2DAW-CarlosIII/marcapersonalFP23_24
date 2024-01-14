
import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';
import { ProyectoList, ProyectoEdit, ProyectoShow, ProyectoCreate } from './pages/proyectos';
import { UserList, UserEdit, UserShow, UserCreate } from './pages/users';
import ProyectoIcon from '@mui/icons-material/Work';
import UserIcon from '@mui/icons-material/PeopleAlt';



export const App = () => (
    <Admin
        dataProvider={dataProvider}
        authProvider={authProvider}
    >
        <Resource name="users"
            icon={UserIcon}
            list={UserList}
            edit={UserEdit}
            show={UserShow}
            create={UserCreate}
        />
        <Resource name="curriculos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="proyectos"
            icon={ProyectoIcon}
            list={ProyectoList}
            edit={ProyectoEdit}
            show={ProyectoShow}
            create={ProyectoCreate}
        />
        <Resource name="ciclos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="familias_profesionales" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="actividades" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="reconocimientos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
    </Admin>
);

