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
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const EstudianteInput = () => (
    <ReferenceInput label="Estudiante" source="estudiante_id" reference="users">
        <SelectInput
        label="Estudiante"
        source="estudiante_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const DocenteInput = () => (
    <ReferenceInput label="Docente Validador" source="docente_validador" reference="users">
        <SelectInput
        label="Docente Validador"
        source="docente_validador"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const ActividadInput = () => (
    <ReferenceInput label="Actividad" source="actividad_id" reference="users">
        <SelectInput
        label="Actividad"
        source="actividad_id"
        optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

const reconocimientosFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    EstudianteInput(),
];

export const ReconocimientoList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={reconocimientosFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{actividad_id}"
          secondaryText="%{documento}"
          tertiaryText="%{docente_validador}"
          quaternaryText="%{fecha}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
          </ReferenceField>
          <ReferenceField label="Actividad" source="actividad_id" reference="users">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
          <TextField source="documento" />
          <ReferenceField label="Docente Validador" source="docente_validador" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
          </ReferenceField>
          <TextField source="fecha" />
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const ReconocimientoTitle = () => {
  const record = useRecordContext();
  return <span>Recomocimiento {record ? `"${record.nombre}"` : ''}</span>;
};

export const ReconocimientoEdit = () => (
    <Edit title={<ReconocimientoTitle />}>
    <SimpleForm>
        <TextInput source="id" disabled />
        <EstudianteInput />
        <ActividadInput />
        <TextInput source="documento" />
        <DocenteInput />
        <TextInput source="fecha" />
    </SimpleForm>
    </Edit>
);

export const ReconocimientoShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <ReferenceField label="Actividad" source="actividad_id" reference="users">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <TextField source="documento" />
            <ReferenceField label="Docente" source="docente_validador" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <TextField source="fecha" />
        </SimpleShowLayout>
    </Show>
);

export const ReconocimientoCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="id" disabled />
            <EstudianteInput />
            <ActividadInput />
            <TextInput source="documento" />
            <DocenteInput />
            <TextInput source="fecha" />
        </SimpleForm>
    </Create>
);
