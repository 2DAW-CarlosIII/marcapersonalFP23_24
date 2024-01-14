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

const NombreInput = () => (
    <ReferenceInput label="Nombre" source="nombre" reference="ciclos">
        <SelectInput
        label="Nombre"
        source="nombre"
        optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

const CodCicloInput = () => (
    <ReferenceInput label="Codigo de ciclo" source="codCiclo" reference="ciclos">
        <SelectInput
        label="Codigo de ciclo"
        source="codCiclo"
        optionText={record => record && `${record.codCiclo}`} />
    </ReferenceInput>
)

const CodFamiliaInput = () => (
    <ReferenceInput label="Codigo de familia de ciclo" source="codFamilia" reference="ciclos">
        <SelectInput
        label="Codigo de familia de ciclo"
        source="codFamilia"
        optionText={record => record && `${record.codFamilia}`} />
    </ReferenceInput>
)

const ciclosFilter = [
    <TextInput label="Buscar" source="q" alwaysOn />,
    NombreInput(),
    CodCicloInput(),
    CodFamiliaInput(),
];





export const CicloList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={ciclosFilter} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{codCiclo}"
          tertiaryText="%{codFamilia}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <NumberField source="id" />
          <TextField source="codCiclo" />
          <TextField source="codFamilia" />
          <ReferenceField label="familia" source="familia_id" reference="familias_profesionales">
            <FunctionField render={record => record && `${record.id}`} />
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
        <TextInput label="Codigo ciclo" source="codCiclo" />
        <CodFamiliaInput/>
        <NumberInput label="Familia_id" source='familia_id'/>
        <TextInput label="Grado" source='grado' />
        <TextInput label="Nombre" source="nombre" />
    </SimpleForm>
    </Edit>
);

export const CicloShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField source="id" />
            <TextField source="codCiclo" />
            <TextField source="codFamilia" />
            <ReferenceField label="familia" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.id}`} />
            </ReferenceField>
            <TextField source="grado" />
            <TextField source="nombre" />
            <EditButton />
        </SimpleShowLayout>
    </Show>
);

export const CicloCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput label="Codigo ciclo" source="codCiclo" />
            <CodFamiliaInput/>
            <NumberInput label="Familia_id" source='familia_id'/>
            <TextInput label="Grado" source='grado' />
            <TextInput label="Nombre" source="nombre" />
        </SimpleForm>
    </Create>
);
