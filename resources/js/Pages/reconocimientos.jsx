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

const TutorInput = () => (
    <ReferenceInput label="Tutor" source="docente_id" reference="users">
        <SelectInput
        label="Tutor"
        source="docente_id"
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
    return (
      <span>
        Reconocimiento de{' '}
        {record ? ( /* TO-DO El nombre y apellidos del estudiante se deben mostrar con el mismo estilo del título */
          <ReferenceField label="Usuario" resource="reconocimientos" reference="users" source="estudiante_id">
              <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
          </ReferenceField>
        ) : (
          ''
        )}
      </span>
    );
};

export const ReconocimientoEdit = () => (
    <Edit title={<ReconocimientoTitle />}>
        <SimpleForm>
            <TextInput source="id" disabled />
            <EstudianteInput />
            <ActividadInput />
            <TextInput source="documento" />
            <TutorInput />
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
            <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <TextField source="documento" />
            <ReferenceField label="Tutor" source="docente_validador" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
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
            <TutorInput />
        </SimpleForm>
    </Create>
);
