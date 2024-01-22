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

const EmpresaInput = () => (
    <ReferenceInput label="Tutor" source="docente_id" reference="users">
        <SelectInput
        label="Tutor"
        source="docente_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const empresasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    TutorInput(),
];

export const EmpresaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={empresasFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{dominio}"
          tertiaryText="%{calificacion}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="nombre" />
          <TextField source="dominio" />
          <ReferenceField label="Tutor" source="docente_id" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
          </ReferenceField>
          <NumberField source="calificacion" />
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const EmpresaTitle = () => {
  const record = useRecordContext();
  return <span>Empresa {record ? `"${record.nombre}"` : ''}</span>;
};

export const EmpresaEdit = () => (
    <Edit title={<EmpresaTitle />}>
    <SimpleForm>
        <TextInput source="id" disabled />
        <TextInput source="nombre" />
        <TextInput source="dominio" />
        <TutorInput />
        <NumberInput source="calificacion" />
    </SimpleForm>
    </Edit>
);

export const EmpresaShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nombre" />
            <TextField source="dominio" />
            <ReferenceField label="Tutor" source="docente_id" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <NumberField source="calificacion" />
        </SimpleShowLayout>
    </Show>
);

export const EmpresaCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="nombre" />
            <TextInput source="dominio" />
            <TutorInput />
            <NumberInput source="calificacion" />
        </SimpleForm>
    </Create>
);















/*
import React from 'react';
import { List, Edit, Show, Create } from 'react-admin';
import EmpresaList from '../components/EmpresaList';
import EmpresaEdit from '../components/EmpresaEdit';
import EmpresaShow from '../components/EmpresaShow';
import EmpresaCreate from '../components/EmpresaCreate';

const Empresas = (props) => (
    <List {...props} title="Lista de Empresas" perPage={10} sort={{ field: 'id', order: 'ASC' }}>
        <EmpresaList />
    </List>
);

export default [
    <List key="list" path="/empresas" component={Empresas} />,
    <Edit key="edit" path="/empresas/:id" component={EmpresaEdit} />,
    <Show key="show" path="/empresas/:id/show" component={EmpresaShow} />,
    <Create key="create" path="/empresas/create" component={EmpresaCreate} />,
];
*/
