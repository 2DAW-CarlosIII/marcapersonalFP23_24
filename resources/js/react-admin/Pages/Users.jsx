

// in resources/js/react-admin/pages/users.jsx
import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    Edit,
    Create,
    SimpleForm,
    TextInput,
    EmailField,
    DateField,
    ShowButton,
    Show,
    ImageField,
    ImageInput,
    SimpleShowLayout,
    PasswordInput,
    SaveButton,
    ListButton,
    TopToolbar,
    ExportButton,
    FilterButton,
    Toolbar,
    Button,
    ArrayField,
    useRecordContext,
    useEditContext,
    usePermissions,
    Labeled
} from 'react-admin';

import AjaxLoader from '../../../js/Pages/front/src/componentes/AjaxLoader/AjaxLoader';
import { useMediaQuery, Box } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton, RenderExportButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';
import { CicloListMini, CicloListMiniSelected} from './Ciclos';
import { IdiomaListMiniSelected, FormAddIdiomaEstudiante } from './Idiomas';
import DropDownComponent from '../../Pages/front/src/componentes/DropDownComponent';


const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: null }} />
        <RenderExportButton permisos={{ role: null }} exporter={exportUsers}/>
    </TopToolbar>
);

const EditActions = () => (
    <Toolbar>
      <div className="RaToolbar-defaultToolbar">
        <SaveButton/>
        <RenderDeleteButton />
      </div>
    </Toolbar>
);

const validatePasswordMatch = (value, allValues) => {
    if (value !== allValues.password) {
        return "Las contraseñas no coinciden";
    }
    return undefined;
};

const UserFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

const UserFiltersMini = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const UserList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));

    return (
        <List filters={UserFilters} actions={<ListActions />} >
            {isSmall ? (
                <SimpleList
                    primaryText={(record) => record.nombre}
                    secondaryText={(record) => record.apellidos}
                    tertiaryText={(record) => record.created_at}
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <RenderEditButton />
                    <RenderDeleteButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <TextField source="id" />
                    <TextField source="name" label="Usuario" />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="apellidos" label="Apellidos" />
                    <ShowButton />
                    <RenderEditButton />
                    <RenderDeleteButton />
                </Datagrid>
            )}
        </List>
    );
};

const BotonAddParticipanteProyecto = ({proyecto, refrescarLista}) => {
    const record = useRecordContext();
    const handleClick = () => {
        dataProvider.postParticipanteProyecto(proyecto.id, record.id)
        .then(() => refrescarLista());
    };

    return <Button onClick={handleClick}><span>Añadir</span></Button>;
};

const BotonDeleteParticipanteProyecto = ({proyecto, refrescarLista}) => {
   const permisos = usePermissions();
    if(permisos.permissions.role != 'docente' && permisos.permissions.role != 'admin') return null;
    const record = useRecordContext();

    const handleClick = () => {
        dataProvider.deleteParticipanteProyecto(proyecto.id, record.id)
        .then(() => refrescarLista());
    };

    return <Button onClick={handleClick}><span>Eliminar</span></Button>;
};

export const UserListMini = () => {
    const permisos = usePermissions();
    if(permisos.permissions.role != 'docente' && permisos.permissions.role != 'admin') return null;
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));

    // record va a tener los datos del proyecto que estamos editando
    const {refetch, record} = useEditContext();

    const refrescarLista = () =>{

        console.log("refresco insertar", record);
        refetch()
    }

    return (
        <>
        <List filters={UserFiltersMini}
              actions={false}
              resource="estudiantes"
              title={" "}
              perPage={5}
              sx={{background:'#F7F7F7'}}>
            { isSmall ? (
                <SimpleList
                primaryText={(record) => record.nombre}
                secondaryText={(record) => record.email}
                tertiaryText={(record) => record.created_at}
                linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                />
            ) : (

                <Datagrid bulkActionButtons={false}
                sx={{
                    "& .RaDatagrid-table": {
                        backgroundColor: "#F7F7F7",
                    },
                    "& .RaDatagrid-headerCell": {
                        backgroundColor: "#F7F7F7",
                    }
                }}>
                    <TextField source="id" disabled />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="apellidos" label="Apellidos" />
                    <EmailField source="email" label="Email" />
                    <BotonAddParticipanteProyecto proyecto={record} refrescarLista={refrescarLista}/>
                </Datagrid>

            )}
        </List>

        </>
    );
};

export const UserListMiniSelected = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));

    const {refetch, record, isFetching} = useEditContext();

    const refrescarLista = () =>{
        console.log("refresco borrar ", record);
        refetch()
    }

    return (
        <Labeled label="Estudiantes incluidos en el proyecto">
        <SimpleShowLayout >
        <ArrayField   source="estudiantes" >
            { isFetching ? ( <AjaxLoader/>)
            : (<Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="nombre" label="Nombre"/>
                    <TextField source="apellidos" label="Apellidos" />
                    <BotonDeleteParticipanteProyecto proyecto={record} refrescarLista={refrescarLista}/>
            </Datagrid>)
            }
        </ArrayField>

        </SimpleShowLayout>
        </Labeled>

    );
};

export const UserTitle = ({ record }) => {
    return <span>User {record ? `"${record.nombre}"` : ''}</span>;
};

export const UserEdit = () => {
    const record = useRecordContext();
    return (
    <Edit title={<UserTitle />}>
        <SimpleForm toolbar={<EditActions />} >
            <TextInput source="id" disabled />
            <TextInput source="name" label="Usuario" />
            <TextInput source="nombre" label="Nombre" />
            <TextInput source="apellidos" label="Apellidos" />
            <TextInput source="email" label="Email" />
            <ImageInput source="attachments" label='Imagen de Avatar' accept="image/*">
                <ImageField source="src" title="title" label="Foto de perfil" />
            </ImageInput>
        </SimpleForm>
        <Box display="block" textAlign="center">
            <CicloListMiniSelected />
            <DropDownComponent message="Indica los ciclos que cursas o eres titulado">
                <CicloListMini estudiante={record} />
            </DropDownComponent>
        </Box>
        <Box display="block" textAlign="center">
            <IdiomaListMiniSelected />
            <DropDownComponent message="Añade idiomas a tu competencia idiomática">
                <FormAddIdiomaEstudiante />
            </DropDownComponent>
        </Box>
    </Edit>
);}

export const UserShow = () => (
    <Show actions={<ListButton />} >
        <SimpleShowLayout>
        <ImageField source="attachments.src" title="attachments.title" label="Foto de perfil" />
            <TextField source="id" />
            <TextField source="name" label="Usuario" className="bold-label" />
            <TextField source="nombre" label="Nombre" />
            <TextField source="apellidos" label="Apellidos" />
            <DateField source="created_at" label="Fecha de alta" />
            <DateField source="updated_at" label="Última actualización" />
        </SimpleShowLayout>
    </Show>
);
export const UserCreate = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const widthCreate = isSmall ? '100%' : '200px';

    return (
        <Create>
            <SimpleForm>
                <TextInput source="name" label="Usuario" style={{
                    width: widthCreate,
                }} />
                <TextInput source="nombre" style={{
                    width: widthCreate,
                }} />
                <TextInput source="apellidos" style={{
                    width: widthCreate,
                }} />
                <PasswordInput source="password" style={{
                    width:widthCreate,
                }} />
                <PasswordInput
                    source="confirmPassword"
                    label="Confirm Password"
                    validate={validatePasswordMatch}
                    style={{
                        width: widthCreate,
                    }}
                />
                <TextInput source="email" style={{
                    width: widthCreate,
                }} />
            </SimpleForm>
        </Create>
    );
};

const exportUsers = (users) => {
    const usersForExport = users.map((user) => {
        const { nombre, apellidos } = user;
        return { nombre, apellidos };
    });
    const usersJson = JSON.stringify(usersForExport);
    const blob = new Blob([usersJson], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'users.json';
    a.click();
}
