import * as React from 'react';
import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';
import { UserList , UserEdit, UserShow, UserCreate } from './pages/users.jsx';
import UserIcon from '@mui/icons-material/Group';

export const App = () => (
    <Admin
        dataProvider={dataProvider}
		authProvider={authProvider}
	>
        <Resource icon={UserIcon}
                  name="users"
                  list={UserList}
                  edit={UserEdit}
                  show={UserShow}
                  create={UserCreate}/>

        <Resource name="curriculos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="proyectos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="ciclos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="familias_profesionales" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="actividades" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="reconocimientos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
    </Admin>
);

