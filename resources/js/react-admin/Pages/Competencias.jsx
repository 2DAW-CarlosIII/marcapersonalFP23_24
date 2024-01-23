// in resources/js/react-admin/pages/proyectos.jsx
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
    SimpleShowLayout
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const proyectosFilters = [
    <TextInput source="q" label="Search" alwaysOn />
];

export const CompetenciasList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={proyectosFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{color}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="nombre" />
          <TextField source="color" />
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const CompetenciasTitle = () => {
  const record = useRecordContext();
  return <span>Competencia {record ? `"${record.nombre}"` : ''}</span>;
};

export const CompetenciasEdit = () => (
    <Edit title={<CompetenciasTitle />}>
    <SimpleForm>
        <TextInput source="id" disabled />
        <TextInput source="nombre" />
        <TextInput source="color" />
    </SimpleForm>
    </Edit>
);

export const CompetenciasShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nombre" />
            <TextField source="color" />
        </SimpleShowLayout>
    </Show>
);

export const CompetenciasCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="nombre" />
            <TextInput source="color" />
        </SimpleForm>
    </Create>
);
