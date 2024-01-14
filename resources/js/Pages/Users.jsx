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
    PasswordInput,
    DateInput,
    DateField
  } from 'react-admin';
import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const userFilters = [
    <TextInput source="q" label="Search" alwaysOn />,

];
export function UserCreate() {
    return(
    <Create>
        <SimpleForm>
            <TextInput source="name" label="Nombre de usuario"/>
            <TextInput source="nombre"/>
            <TextInput source="apellidos"/>
            <TextInput source="email"/>
            <PasswordInput source="password"/>
        </SimpleForm>
    </Create>
    )
}
export function UserEdit() {
    return(
    <Edit >
    <SimpleForm>
            <TextInput source="id" disabled />
            <TextInput source="name" label="Nombre de usuario" />
            <TextInput source="nombre" />
            <TextInput source="apellidos"/>
            <TextInput source="email"/>
            <PasswordInput source="password" label="Contraseña" />
            </SimpleForm>
    </Edit>
    )

}
export function UserList() {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
      <List filters={userFilters} >
        {isSmall ? (
          <SimpleList
            primaryText="%{name}"
            secondaryText="%{nombre}"
            tertiaryText="%{apellidos}"
            quaternaryText="%{email}"
            linkType={(record) => (record.canEdit ? 'edit' : 'show')}
          >
            <EditButton />
          </SimpleList>
        ) : (
          <Datagrid bulkActionButtons={false} >
            <TextField source="id" />
            <TextField source="name" label="Nombre de Usuario"/>
            <TextField source="nombre" />
            <TextField source="apellidos" />
            <TextField source="email" />
            <ShowButton />
            <EditButton />
          </Datagrid>
        )}
      </List>
    );
}
export function UserShow() {
    return(
        <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="name" label="Nombre de Usuario"/>
            <TextField source="nombre"/>
            <TextField source="apellidos" />
            <TextField source="email" />
            <DateField source="created_at"  label="Fecha de creación"/>
            <DateField source="updated_at"  label="Fecha de edición"/>
        </SimpleShowLayout>
    </Show>
    )

}
