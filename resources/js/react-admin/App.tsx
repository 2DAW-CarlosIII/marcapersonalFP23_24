import React from 'react';
import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';
import { ProyectoList, ProyectoEdit, ProyectoShow, ProyectoCreate } from './pages/proyectos.jsx';
import proyectoIcon from '@mui/icons-material/AccountTree';

export const App = () => (
    <Admin
        dataProvider={dataProvider}
		authProvider={authProvider}
	>
        <Resource name="proyectos"
            icon={proyectoIcon}
            list={ProyectoList}
            edit={ProyectoEdit}
            show={ProyectoShow}
            create={ProyectoCreate} />
        <Resource name="users" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="actividades" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
    </Admin>
);

