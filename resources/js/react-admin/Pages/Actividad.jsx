import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    ReferenceField,
    Edit,
    Create,
    SimpleForm,
    SaveButton,
    ReferenceInput,
    TextInput,
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    ListButton,
    ExportButton,
    FilterButton,
    TopToolbar,
    Toolbar,
    useRecordContext,
  } from 'react-admin';

import { useMediaQuery } from '@mui/material';

import { RenderCreateButton, RenderEditButton, RenderDeleteButton, MySelf } from '../Components/BotonesPermissions';

const ListActions = () => (
  <TopToolbar>
      <FilterButton/>
      <RenderCreateButton permisos={{ role: 'docente' }} />
      <ExportButton/>
  </TopToolbar>
);

const EditActions = () => (
  <Toolbar>
    <div class="RaToolbar-defaultToolbar">
      <SaveButton/>
      <RenderDeleteButton />
    </div>
  </Toolbar>
);

const OrganizadorInput = () => (
    <ReferenceInput label="Organizador" source="docente_id" reference="docentes" alwaysOn >
        <SelectInput
        label="Organizador"
        source="docente_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const actividadesFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    OrganizadorInput(),
];

export const ActividadList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={actividadesFilters} actions={<ListActions />}>
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{insignia}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <RenderEditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="nombre" />
          <TextField source="insignia" />
          <ReferenceField label="Organizador" source="docente_id" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
          </ReferenceField>
          <ShowButton />
          <RenderEditButton />
          <RenderDeleteButton />
        </Datagrid>
      )}
    </List>
  );
}

export const ActividadTitle = () => {
  const record = useRecordContext();
  return <span>Actividad {record ? `"${record.nombre}"` : ''}</span>;
};

export const ActividadEdit = () => (
    <Edit title={<ActividadTitle />} >
        <SimpleForm toolbar={<EditActions />}>
            <TextInput source="id" disabled />
            <TextInput source="nombre" label="Nombre Actividad" />
            <TextInput source="insignia" />
            <MySelf />
        </SimpleForm>
    </Edit>
);

export const ActividadShow = () => (
    <Show actions={<ListButton />}>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="nombre" label="Nombre Actividad" />
            <TextField source="insignia" />
            <ReferenceField label="Organizador" source="docente_id" reference="users">
              <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <ListButton />
        </SimpleShowLayout>
    </Show>
);

export const ActividadCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="nombre" label="Nombre Actividad" />
            <TextInput source="insignia" />
            <MySelf />
        </SimpleForm>
    </Create>
);
