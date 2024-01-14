import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    ReferenceField,
    EditButton,
    Edit,
    Create,
    SimpleForm,
    ReferenceInput,
    TextInput,
    NumberField,
    NumberInput,
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    DateField,
    PasswordInput
} from 'react-admin';




import { useRecordContext } from 'react-admin';
import { useMediaQuery } from '@mui/material';

const equalToPassword = (value, allValues) => {
    if (value !== allValues.password) {
        return 'The two passwords must match';
    }
}

const UserInput = () => (
    <ReferenceInput label="Nombre" source="nombre" reference="users">
        <SelectInput
            label="Nombre"
            source="nombre"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const usersFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    UserInput(),
];




export const UserList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={usersFilters} >
            {isSmall ? (
                <SimpleList
                    primaryText="%{nombre}"
                    secondaryText="%{apellidos}"
                    tertiaryText="%{email}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <TextField source="id" />
                    <TextField source="name" />
                    <TextField source="nombre" />
                    <TextField source="apellidos" />
                    <TextField source="email" />
                    <TextField source="password" />
                    <DateField source="email_verified_at" locales="es-ES"/>
                    <TextField source="avatar" />
                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
}

export const UserTitle = () => {
    const record = useRecordContext();
    return <span>User {record ? `"${record.nombre}"` : ''}</span>;
};

export const UserEdit = () => (
    <Edit title={<UserTitle />}>
        <SimpleForm>
            <TextInput source="id" disabled />
            <TextInput source="name" />
            <TextInput source="nombre" />
            <TextInput source="apellidos" />
            <TextInput source="email" />
            <PasswordInput source='password'  />

        </SimpleForm>
    </Edit>
);

export const UserShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nombre" />
            <TextField source="apellidos" />
            <TextField source="email" />
            <TextField source="password" />
        </SimpleShowLayout>
    </Show>
);

export const UserCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="name" />
            <TextInput source="nombre" />
            <TextInput source="apellidos" />
            <TextInput source="email" />
            <PasswordInput source="password" />
            <PasswordInput source="confirmar contraseña" validate={equalToPassword} />

        </SimpleForm>
    </Create>
);
