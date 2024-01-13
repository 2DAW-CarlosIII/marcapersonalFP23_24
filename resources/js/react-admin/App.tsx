import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';
import { ReconocimientoList, ReconocimientoEdit, ReconocimientoShow, ReconocimientoCreate } from './pages/reconocimientos';
import ReconocimientoIcon from '@mui/icons-material/AccountTree';

export const App = () => (
    <Admin
        dataProvider={dataProvider}
		authProvider={authProvider}
	>
        <Resource name="users" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="curriculos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="proyectos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="ciclos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
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

