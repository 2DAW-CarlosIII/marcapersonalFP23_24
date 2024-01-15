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

const FamiliaInput = () => (
    <ReferenceInput label="Familia Profesional" source="familia_id" reference="familias_profesionales">
        <SelectInput
        label="Familia Profesional"
        source="familia_id"
        optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

const CodigoFamiliaInput = () => (
    <ReferenceInput label="Cod Familia Profesional" source="familia_id" reference="familias_profesionales">
        <SelectInput
        label="Cod Familia Profesional"
        source="codFamilia"
        optionText={record => record && `${record.codigo}`} />
    </ReferenceInput>
)

const ciclosFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    FamiliaInput(),
];

export const CicloList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={ciclosFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{grado}"
          tertiaryText="%{codFamilia}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="codCiclo" />
          <ReferenceField label="Cod Familia Profesional" source="familia_id" reference="familias_profesionales">
            <FunctionField render={record => record && `${record.codigo}`} />
          </ReferenceField>
          <ReferenceField label="Familia Profesional" source="familia_id" reference="familias_profesionales">
            <FunctionField render={record => record && `${record.nombre}`} />
          </ReferenceField>
          <TextField source="grado" />
          <TextField source="nombre" />
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const CicloTitle = () => {
  const record = useRecordContext();
  return <span>Ciclo {record ? `"${record.nombre}"` : ''}</span>;
};

export const CicloEdit = () => (
    <Edit title={<CicloTitle />}>
    <SimpleForm>
        <TextInput source="id" disabled />
        <TextInput source="codCiclo" />
        <CodigoFamiliaInput />
        <FamiliaInput />
        <TextInput source="grado" />
        <TextInput source="nombre" />
    </SimpleForm>
    </Edit>
);

export const CicloShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="codCiclo" />
            <ReferenceField label="cod Familia Profesional" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.codigo}`} />
            </ReferenceField>
            <ReferenceField label="Familia Profesional" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <TextField source="grado" />
            <TextField source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const CicloCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="codCiclo" />
            <CodigoFamiliaInput />
            <FamiliaInput />
            <TextInput source="grado" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Create>
);
