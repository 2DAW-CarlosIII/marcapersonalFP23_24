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

const EstudianteInput = () => (
    <ReferenceInput label="Estudiante" source="user_id" reference="users" alwaysOn >
        <SelectInput
        label="Estudiante"
        source="user_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const idiomaFilter = [
    <TextInput source="q" label="Search" alwaysOn />,
    EstudianteInput(),
];

export const IdiomaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={idiomaFilter} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{certificado}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
            <TextField source="id" />
            <ReferenceField label="Estudiante" source="user_id" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <TextField source="nombre" />
            <TextField source="certificado" />
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
        <EstudianteInput />
        <TextInput source="id" disabled />
        <TextInput source="nombre" />
        <TextInput source="certificado" />
    </SimpleForm>
    </Edit>
);

export const IdiomaShow = () => (
    <Show>
        <SimpleShowLayout>
            <ReferenceField label="Estudiante" source="user_id" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <TextField source="id" />
            <TextField source="nombre" />
            <TextField source="certificado" />
        </SimpleShowLayout>
    </Show>
);

export const IdiomaCreate = () => (
    <Create title={<IdiomaTitle />}>
        <SimpleForm>
            <EstudianteInput />
            <TextInput source="nombre" />
            <TextInput source="certificado" />
        </SimpleForm>
    </Create>
);
