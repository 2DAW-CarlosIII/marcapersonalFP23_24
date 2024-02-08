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
    FileInput,
} from "react-admin";

import { useMediaQuery } from "@mui/material";

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
    DesdeInput(),
    HastaInput(),
];

export const UserList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down("sm"));

    return (
        <List filters={UserFilters}>
            {isSmall ? (
                <SimpleList
                    primaryText={(record) => record.nombre}
                    secondaryText={(record) => record.email}
                    tertiaryText={(record) => record.created_at}
                    linkType={(record) => (record.canEdit ? "edit" : "show")}
                />
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <TextField source="id" />
                    <TextField source="name" label="Usuario" />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="apellidos" label="Apellidos" />
                    <EmailField source="email" label="Email" />
                    <DateField source="created_at" label="Fecha de alta" />
                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
};

export const UserTitle = ({ record }) => {
    return <span>User {record ? `"${record.nombre}"` : ""}</span>;
};

export const UserEdit = () => (
    <Edit title={<UserTitle />}>
        <SimpleForm>
            <TextInput source="id" disabled />
            <TextInput source="name" label="Usuario" />
            <TextInput source="nombre" label="Nombre" />
            <TextInput source="apellidos" label="Apellidos" />
            <TextInput source="email" label="Email" />
            <ImageInput source="attachments" label="Foto de perfil">
                <ImageField source="src" title="title" />
            </ImageInput>
        </SimpleForm>
    </Edit>
);

export const UserShow = () => (
    <Show>
        <SimpleShowLayout>
            <ImageField source="avatar" title="name" label="Foto de perfil" />
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
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down("sm"));
    const widthCreate = isSmall ? "100%" : "200px";

    return (
        <Create>
            <SimpleForm>
                <TextInput
                    source="name"
                    label="Usuario"
                    style={{
                        width: widthCreate,
                    }}
                />
                <TextInput
                    source="nombre"
                    style={{
                        width: widthCreate,
                    }}
                />
                <TextInput
                    source="apellidos"
                    style={{
                        width: widthCreate,
                    }}
                />
                <PasswordInput
                    source="password"
                    style={{
                        width: widthCreate,
                    }}
                />
                <PasswordInput
                    source="confirmPassword"
                    label="Confirm Password"
                    validate={validatePasswordMatch}
                    style={{
                        width: widthCreate,
                    }}
                />
                <TextInput
                    source="email"
                    style={{
                        width: widthCreate,
                    }}
                />
                <ImageInput
                    source="avatar"
                    style={{
                        border: "2px dashed #ccc",
                        padding: "10px",
                        width: widthCreate,
                    }}
                />
            </SimpleForm>
        </Create>
    );
};
