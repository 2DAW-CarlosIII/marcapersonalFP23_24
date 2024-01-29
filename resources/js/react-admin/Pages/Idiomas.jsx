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

const IdiomasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const IdiomaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={IdiomasFilters} >
      {isSmall ? (
        <SimpleList
            primaryText="%{alpha3t}"
            secondaryText="%{native_name}"
            tertiaryText="%{english_name}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="alpha2" label="Codigo Idioma 2"/>
          <TextField source="english_name" label="Nombre Ingles"/>
          <TextField source="native_name" label="Nombre Nativo"/>
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const IdiomaTitle = () => {
  const record = useRecordContext();
  return <span>Idioma {record ? `"${record.nombre}"` : ''}</span>;
};

export const IdiomaEdit = () => (
    <Edit title={<IdiomaTitle />}>
        <SimpleForm>
            <TextInput source="id" disabled />
            <TextInput source="alpha2" label="Codigo Idioma 2"/>
            <TextInput source="alpha3t" label="Codigo Idioma 3t"/>
            <TextInput source="alpha3b" label="Codigo Idioma 3b"/>
            <TextInput source="english_name" label="Nombre Ingles"/>
            <TextInput source="native_name" label="Nombre Nativo"/>
        </SimpleForm>
    </Edit>
);

export const IdiomaShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="alpha2" label="Codigo Idioma 2"/>
            <TextField source="alpha3t" label="Codigo Idioma 3t"/>
            <TextField source="alpha3b" label="Codigo Idioma 3b"/>
            <TextField source="english_name" label="Nombre Ingles"/>
            <TextField source="native_name" label="Nombre Nativo"/>
        </SimpleShowLayout>
    </Show>
);

export const IdiomaCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="alpha2" label="Codigo Idioma 2"/>
            <TextInput source="alpha3t" label="Codigo Idioma 3t"/>
            <TextInput source="alpha3b" label="Codigo Idioma 3b"/>
            <TextInput source="english_name" label="Nombre Ingles"/>
            <TextInput source="native_name" label="Nombre Nativo"/>
        </SimpleForm>
    </Create>
);
