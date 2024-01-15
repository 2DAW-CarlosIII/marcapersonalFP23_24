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
    ShowButton,
    Show,
    SimpleShowLayout,
    ImageField,
    EmailField,
    ImageInput,
    PasswordInput,
    DateInput,
    DateField,
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const validarPassword = (values) => {
    const errors = {};
    if (values.password !== values.confirmar_password) {
        errors.confirm_password = ['Las contraseñas no coinciden'];
    }
    return errors;
};

const DateCreacion = () => (
    <DateInput source='created_at' />
)

const NameUsuario = () => (
    <TextInput source="name" label="Name" />
)

const NombreUsuario = () => (
    <TextInput source="nombre" label="Nombre" />
)

const ApellidoUsuario = () => (
    <TextInput source="name" label="Apellidos" />
)

const UserFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    DateCreacion(),
    NameUsuario(),
    NombreUsuario(),
    ApellidoUsuario(),
];

export const UserList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={UserFilters}>
            {isSmall ? (
                <SimpleList
                    primaryText={(record) => record.name}
                    secondaryText={(record) => record.nombre}
                    tertiaryText={(record) => record.apellidos}
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                />
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <TextField source="id" />
                    <TextField source="name" />
                    <TextField source="nombre" />
                    <TextField source="apellidos" />
                    <EmailField source="email" />
                    <DateField source="created_at" />
                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
}

export const UserName= () => {
const record = useRecordContext();
return <span>Proyecto {record ? `"${record.name}"` : ''}</span>;
};

export const UserEdit = () => (
<Edit title={<UserName />}>
    <SimpleForm >
        <TextInput source="name" style={{width:' 50%'}}/>
        <TextInput source="nombre" style={{width:' 50%'}}/>
        <TextInput source="apellidos" style={{width:' 50%'}}/>
        <TextInput source="email" style={{width:' 50%'}}/>
        <ImageInput source="avatar" label="Avatar" accept="image/*">
            <ImageField source="src" title="title" />
        </ImageInput>
        <DateInput source='updated_at'
                   style={{display: 'none'}}/>
    </SimpleForm>
</Edit>
);

export const UserShow = () => (
<Show>
    <SimpleShowLayout>
        <TextField source="id" />
        <TextField source="name" />
        <TextField source="nombre" />
        <TextField source="apellidos" />
        <EmailField source="email" />
        <TextField source="created_at" />
        <TextField source="updated_at" />
        <ImageField source="avatar"/>
    </SimpleShowLayout>
</Show>
);

export const UserCreate = () => (
<Create>
    <SimpleForm validate={validarPassword}>
        <TextInput source="name" style={{width:' 50%'}}/>
        <TextInput source="nombre" style={{width:' 50%'}}/>
        <TextInput source="apellidos" style={{width:' 50%'}}/>
        <TextInput source="email" style={{width:' 50%'}}/>
        <PasswordInput source="password"style={{width:' 50%'}} />
        <PasswordInput source="confirmar_password" style={{width:' 50%'}} />
        <ImageInput source="avatar" label="Avatar" accept="image/*">
            <ImageField source="src" title="title" />
        </ImageInput>
        <DateInput source='created_at'
                   style={{display: 'none'}}/>
    </SimpleForm>
</Create>
);
