

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
    useDataProvider,
    CreateActions,
    CreateButton,
} from 'react-admin';

import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';


const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: null }} />
        <ExportButton/>
    </TopToolbar>
);

const EditActions = () => (
    <Toolbar>
      <div class="RaToolbar-defaultToolbar">
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

const BotonAddParticipanteProyecto = () => {
    const handleClick = () => {

        console.log(props.estudiante)
        dataProvider.postParticipanteProyecto(proyecto_id, estudiante_id);
    };

    return <Button onClick={handleClick}>Añadir al proyecto</Button>;
};

const BotonDeleteParticipanteProyecto = (props) => {
    const handleClick = () => {
        console.log(props.estudiante)
        dataProvider.deleteParticipanteProyecto(proyecto_id, estudiante_id);
    };

    return <Button onClick={handleClick}>Eliminar del proyecto</Button>;
};

export const UserListMini = (props) => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));

    console.log(props.proyecto)
    return (
        <List filters={UserFiltersMini} actions={""} resource="estudiantes" title={" "}>
            {isSmall ? (
                <SimpleList
                primaryText={(record) => record.nombre}
                secondaryText={(record) => record.email}
                tertiaryText={(record) => record.created_at}
                linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                />
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="apellidos" label="Apellidos" />
                    <EmailField source="email" label="Email" />
                    <BotonAddParticipanteProyecto />
                </Datagrid>
            )}
        </List>
    );
};

export const UserListMiniSelected = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));

// Lo haremos con ReferenceArrayField https://marmelab.com/react-admin/ReferenceArrayField.html
// o con  ReferenceManyField https://marmelab.com/react-admin/ReferenceManyField.html


    return (
        <SimpleShowLayout >
        <ArrayField   source = "selected" resource="estudiantes">
            <Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="apellidos" label="Apellidos" />
                    <EmailField source="email" label="Email" />
                    <BotonDeleteParticipanteProyecto />

            </Datagrid>
        </ArrayField>
        </SimpleShowLayout>


    );
};



export const UserTitle = ({ record }) => {
    return <span>User {record ? `"${record.nombre}"` : ''}</span>;
};

export const UserEdit = () => (
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
    </Edit>
);

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
