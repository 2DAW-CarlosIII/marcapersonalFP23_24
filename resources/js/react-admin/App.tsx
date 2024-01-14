
import { Admin, Resource, ListGuesser, EditGuesser, ShowGuesser } from 'react-admin';

/**   COMPONENETES    */
import { ReconocimientoCreate,ReconocimientoEdit,ReconocimientoList,ReconocimientoShow } from '../Pages/reconocimientos';

/**   ICONS    */
import IconVerfied from '@mui/icons-material/Verified';

/**   PROVIDERS   */
import { dataProvider } from './dataProvider';
import { authProvider } from './authProvider';

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
        <Resource
            name="reconocimientos"
            icon={IconVerfied}
            list={ReconocimientoList}
            edit={ReconocimientoEdit}
            show={ReconocimientoShow}
            create={ReconocimientoCreate}/>
    </Admin>
);

