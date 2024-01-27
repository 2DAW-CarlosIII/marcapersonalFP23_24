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
const curriculosFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    EstudianteInput(),
];

export const CurriculoList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={curriculosFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{video_curriculum}"
          secondaryText="%{pdf_curriculum}"
          tertiaryText="%{sobre_mi}"
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
            <TextField source="video_curriculum" />
            <TextField source="pdf_curriculum" />
            <TextField source="sobre_mi" />
            <ShowButton />
            <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const CurriculoTitle = () => {
  const record = useRecordContext();
  return <span>Curriculo {record ? `"${record.nombre}"` : ''}</span>;
};

export const CurriculoEdit = () => (
    <Edit title={<CurriculoTitle />}>
    <SimpleForm>
        <EstudianteInput />
        <TextInput source="id" disabled />
        <TextInput source="video_curriculum" />
        <TextInput source="pdf_curriculum" />
        <TextInput source="sobre_mi" />
    </SimpleForm>
    </Edit>
);

export const CurriculoShow = () => (
    <Show>
        <SimpleShowLayout>
            <ReferenceField label="Estudiante" source="user_id" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <TextField source="id" />
            <TextField source="video_curriculum" />
            <TextField source="pdf_curriculum" />
            <TextField source="sobre_mi" />
        </SimpleShowLayout>
    </Show>
);

export const CurriculoCreate = () => (
    <Create title={<CurriculoTitle />}>
        <SimpleForm>
            <EstudianteInput />
            <TextInput source="video_curriculum" />
            <TextInput source="pdf_curriculum" />
            <TextInput source="sobre_mi" />
        </SimpleForm>
    </Create>
);
