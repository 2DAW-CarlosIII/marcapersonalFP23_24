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
    NumberField,
    ListButton,
    TopToolbar,
    ExportButton,
    FilterButton,
    Toolbar,
    SaveButton,
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton, RenderExportButton } from '../Components/BotonesPermissions';

const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: 'docente' }} />
        <RenderExportButton permisos={{ role: null }}/>
    </TopToolbar>
);

const EditActions = () => (
    <Toolbar>
      <div className="RaToolbar-defaultToolbar">
        <SaveButton/>
        <RenderDeleteButton />
      </div>
    </Toolbar>
);


const empresasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const EmpresaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={empresasFilters} actions={<ListActions />} >
          {isSmall ? (
            <SimpleList
              primaryText="%{nif}"
              secondaryText="%{nombre}"
              tertiaryText="%{email}"
              linkType={(record) => (record.canEdit ? 'edit' : 'show')}
            >
              <RenderEditButton />
              <RenderDeleteButton />
            </SimpleList>
          ) : (
            <Datagrid bulkActionButtons={false} >
              <TextField source="id" />
              <TextField source="nif" />
              <TextField source="nombre" />
              <TextField source="email" />
              <ShowButton />
              <RenderEditButton permisos={{ role: 'docente' }} />
              <RenderDeleteButton />
            </Datagrid>
          )}
        </List>
      );


};

export const EmpresaTitle = () => {
    const record = useRecordContext();
    return <span>Empresa {record ? `"${record.email}"` : ''}</span>;
};

export const EmpresaEdit = () => (
    <Edit title={<EmpresaTitle />}>
        <SimpleForm toolbar={<EditActions />}>
            <NumberField label="ID" source="id" />
            <TextInput source="nif" />
            <TextInput source="nombre" />
            <TextInput source="email" />
        </SimpleForm>
    </Edit>


);

export const EmpresaShow = () => (
    <Show actions={<ListButton />} >
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField source="nombre" />
            <TextField source="nif" />
            <TextField source="email" />
        </SimpleShowLayout>
    </Show>
);

export const EmpresaCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput source="nombre" />
            <TextInput source="nif" />
            <TextInput source="email" />
        </SimpleForm>
    </Create>
);
