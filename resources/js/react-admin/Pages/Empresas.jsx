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
    EmailField
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const empresaFilters = [
    <TextInput source="q" label="Search" alwaysOn />,

];




export const EmpresaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={empresaFilters}>

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
          <EmailField source="email" />

          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const EmpresaTitle = () => {
  const record = useRecordContext();
  return <span>Empresa {record ? `"${record.nif}"` : ''}</span>;
};

export const EmpresaEdit = () => (
    <Edit title={<EmpresaTitle />}>
        <SimpleForm>
            <TextInput source="id" disabled />
            <TextInput source="nif" />
            <TextInput source="email" />

        </SimpleForm>
    </Edit>
);

export const EmpresaShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nif" />
            <EmailField source="email" />

        </SimpleShowLayout>
    </Show>
);

export const EmpresaCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="nif" />
            <TextInput source="email" />

        </SimpleForm>
    </Create>
);
