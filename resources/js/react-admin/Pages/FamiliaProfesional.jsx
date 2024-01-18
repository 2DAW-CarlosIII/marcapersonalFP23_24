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
    SimpleShowLayout
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const familiasProfesionalesFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const FamiliaProfesionalList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={familiasProfesionalesFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{codigo}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="codigo" />
          <TextField source="nombre" />
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const FamiliaProfesionalTitle = () => {
  const record = useRecordContext();
  return <span>FamiliaProfesional {record ? `"${record.nombre}"` : ''}</span>;
};

export const FamiliaProfesionalEdit = () => (
    <Edit title={<FamiliaProfesionalTitle />}>
    <SimpleForm>
        <TextInput source="id" disabled />
        <TextInput source="codigo" />
        <TextInput source="nombre" />
    </SimpleForm>
    </Edit>
);

export const FamiliaProfesionalShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="codigo" />
            <TextField source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const FamiliaProfesionalCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="codigo" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Create>
);
