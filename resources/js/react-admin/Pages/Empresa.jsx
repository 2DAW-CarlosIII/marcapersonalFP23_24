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
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    NumberField,
    NumberInput
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const empresasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const EmpresaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={empresasFilters} >
          {isSmall ? (
            <SimpleList
              primaryText="%{nif}"
              secondaryText="%{email}"
              linkType={(record) => (record.canEdit ? 'edit' : 'show')}
            >
              <EditButton />
            </SimpleList>
          ) : (
            <Datagrid bulkActionButtons={false} >
              <TextField source="id" />
              <TextField source="nif" />
              <TextField source="email" />
              <TextField source="token" />
              <ShowButton />
              <EditButton />
            </Datagrid>
          )}
        </List>
      );


};

export const EmpresaTitle = () => {
    const record = useRecordContext();
    return <span>Empresa {record ? `"${record.email}"` : ''}</span>;
};

export const EmpresaEdit = () => (
    <Edit title={<EmpresaTitle />}>
        <SimpleForm>
            <NumberInput label="ID" source="id" />
            <TextInput source="nif" />
            <TextInput source="email" />
            <TextInput source="token" />
        </SimpleForm>
    </Edit>


);

export const EmpresaShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField source="nif" />
            <TextField source="email" />
            <TextField source="token" />
            <ShowButton />
            <EditButton />
        </SimpleShowLayout>
    </Show>
);

export const EmpresaCreate = () => (
    <Create>
        <SimpleForm>
            <NumberInput label="ID" source="id" />
            <TextInput source="nif" />
            <TextInput source="email" />
            <TextInput source="token" />
        </SimpleForm>
    </Create>
);
