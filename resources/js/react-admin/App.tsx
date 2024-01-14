
import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';
import { CicloList, CicloEdit, CicloShow, CicloCreate } from '../Pages/ciclos';
import CicloIcon from '@mui/icons-material/AccountTree';

export const App = () => (
    <Admin
        dataProvider={dataProvider}
		authProvider={authProvider}
	>
        <Resource name="users" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="curriculos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="proyectos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="ciclos" icon={CicloIcon} list={CicloList} edit={CicloEdit} show={CicloShow} create={CicloCreate} />
        <Resource name="familias_profesionales" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="actividades" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
        <Resource name="reconocimientos" list={ListGuesser} edit={EditGuesser} show={ShowGuesser} />
    </Admin>
);

