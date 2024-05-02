

// in resources/js/react-admin/pages/users.jsx
import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    EditButton,
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
    DateInput,
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

import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';
import { CicloListMini, CicloListMiniSelected} from './Ciclos';
import { FormAddIdiomaEstudiante, IdiomaListMiniSelected } from './Idiomas';


const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: null }} />
        <ExportButton/>
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


const DesdeInput = () => (
    <DateInput source="created_at" label="Fecha de alta desde" />
);

const HastaInput = () => (
    <DateInput source="hasta_at" label="Fecha de alta hasta" />
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
                    secondaryText={(record) => record.email}
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
                    <EmailField source="email" label="Email" />
                    <DateField source="created_at" label="Fecha de alta" />
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
        dataProvider.postParticipanteProyecto(proyecto.id, record.id);
        console.log("REFRESCO DESDE BOTON ADD");
        refrescarLista();
    };

    return <Button onClick={handleClick}>Añadir</Button>;
};

const BotonDeleteParticipanteProyecto = ({proyecto, refrescarLista}) => {
   const permisos = usePermissions();
    if(permisos.permissions.role != 'docente' && permisos.permissions.role != 'admin') return null;
    const record = useRecordContext();

    const handleClick = () => {
        dataProvider.deleteParticipanteProyecto(proyecto.id, record.id);
        console.log("REFRESCO DESDE BOTON DELETE");
        refrescarLista();
    };

    return <Button onClick={handleClick}>Eliminar</Button>;
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
              actions={""}
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
                    <EmailField source="email" label="Email" />
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
            <CicloListMini estudiante={record} />
            <CicloListMiniSelected />
            <FormAddIdiomaEstudiante />
            <IdiomaListMiniSelected />
        </SimpleForm>
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
            <EmailField source="email" label="Email" />
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
