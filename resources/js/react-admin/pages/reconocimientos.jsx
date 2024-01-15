import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

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

const DocenteInput = () => (
    <ReferenceInput label="Tutor" source="docente_validador" reference="users">
        <SelectInput
        label="Tutor"
        source="docente_validador"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const EstudianteInput = () => (
    <ReferenceInput label="Estudiante" source="estudiante_id" reference="users">
        <SelectInput
        label="Estudiante"
        source="estudiante_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const ActividadInput = () => (
    <ReferenceInput label="Actividad" source="actividad_id" reference="proyectos">
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
          primaryText="%{estudiante_id}"
          secondaryText="%{actividad_id}"
          tertiaryText="%{docente_validador}"
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
          <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
            <FunctionField render={record => record && `${record.nombre}`} />
          </ReferenceField>
          <TextField source="documento" />
          <ReferenceField label="Tutor" source="docente_validador" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
          </ReferenceField>
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
