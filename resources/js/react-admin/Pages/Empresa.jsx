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
    SimpleShowLayout
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const OrganizadorInput = () => (
    <ReferenceInput label="Email" source="email" reference="empresas" alwaysOn >
        <SelectInput
        label="Email"
        source="email"
        optionText={record => record && `${record.email}`} />
    </ReferenceInput>
)
const empresaFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    OrganizadorInput(),
];

export const EmpresaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={empresaFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nif}"
          secondaryText="%{email}"
          tertiaryText="%{token}"
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
}

export const EmpresaTitle = () => {
  const record = useRecordContext();
  return <span>Empresa {record ? `"${record.email}"` : ''}</span>;
};

export const EmpresaEdit = () => (
    <Edit title={<EmpresaTitle />}>
        <SimpleForm>
            <TextInput source="id" />
            <TextInput source="nif" />
            <TextInput source="email" />
            <TextInput source="token" />
        </SimpleForm>
    </Edit>
);

export const EmpresaShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nif" />
            <TextField source="email" />
            <TextField source="token" />
            <ReferenceField label="Organizador" source="email" reference="empresas">
                <FunctionField render={record => record && `${record.email}`} />
            </ReferenceField>
        </SimpleShowLayout>
    </Show>
);

export const EmpresaCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="nif" />
            <TextInput source="email" />
            <TextInput source="token" />
            <OrganizadorInput />
        </SimpleForm>
    </Create>
);
