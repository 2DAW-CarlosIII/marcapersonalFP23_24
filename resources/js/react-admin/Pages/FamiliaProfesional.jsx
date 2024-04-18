import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    Edit,
    Create,
    SimpleForm,
    TextInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    SaveButton,
    ListButton,
    TopToolbar,
    ExportButton,
    FilterButton,
    Toolbar,
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';

const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: null }} />
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

const familiasProfesionalesFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const FamiliaProfesionalList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={familiasProfesionalesFilters} actions={<ListActions />} >
      {isSmall ? (
        <SimpleList
          primaryText="%{nombre}"
          secondaryText="%{codigo}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <RenderEditButton />
          <RenderDeleteButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="codigo" />
          <TextField source="nombre" />
          <ShowButton />
          <RenderEditButton />
          <RenderDeleteButton />
        </Datagrid>
      )}
    </List>
  );
}

export const FamiliaProfesionalTitle = () => {
  const record = useRecordContext();
  return <span>FamiliaProfesional {record ? `"${record.nombre}"` : ''}</span>;
};

export const FamiliaProfesionalEdit = () => (
    <Edit title={<FamiliaProfesionalTitle />}>
    <SimpleForm toolbar={<EditActions />}>
        <TextInput source="id" disabled />
        <TextInput source="codigo" />
        <TextInput source="nombre" />
    </SimpleForm>
    </Edit>
);

export const FamiliaProfesionalShow = () => (
    <Show actions={<ListButton />}>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="codigo" />
            <TextField source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const FamiliaProfesionalCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="codigo" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Create>
);
