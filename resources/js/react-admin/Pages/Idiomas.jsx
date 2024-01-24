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

const NombreInput = () => (
    <TextInput source="nombre" label="Nombre"/>
)
const IdiomasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    NombreInput(),
];

export const IdiomaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={IdiomasFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{id}"
          secondaryText="%{nombre}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="nombre" />
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
            <NombreInput />
        </SimpleForm>
    </Edit>
);

export const IdiomaShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const IdiomaCreate = () => (
    <Create>
        <SimpleForm>
            <NombreInput />
        </SimpleForm>
    </Create>
);
