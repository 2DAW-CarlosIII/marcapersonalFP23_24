import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    Edit,
    Create,
    SimpleForm,
    TextInput,
    NumberField,
    NumberInput,
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

import { useMediaQuery } from '@mui/material';
import { useRecordContext } from 'react-admin';
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
      <div className="RaToolbar-defaultToolbar">
        <SaveButton/>
        <RenderDeleteButton />
      </div>
    </Toolbar>
);

const competenciasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const CompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={competenciasFilters} actions={<ListActions />} >
            {isSmall ? (
                <SimpleList
                    primaryText="%{nombre}"
                    secondaryText="%{color}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <RenderEditButton />
                    <RenderDeleteButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <NumberField label="ID" source="id" />
                    <TextField label="nombre" source="nombre" />
                    <TextField label="color" source="color" />
                    <ShowButton />
                    <RenderEditButton />
                    <RenderDeleteButton />
                </Datagrid>
            )}
        </List>
    );


};

export const CompetenciaTitle = () => {
    const record = useRecordContext();
    return <span>Competencia {record ? `"${record.nombre}"` : ''}</span>;
};

export const CompetenciaEdit = () => (
    <Edit title={<CompetenciaTitle />}>
        <SimpleForm toolbar={<EditActions />} >
            <NumberInput label="ID" source="id" />
            <TextInput label="nombre" source="nombre" />
            <TextInput label="color" source="color" />
        </SimpleForm>
    </Edit>


);

export const CompetenciaShow = () => (
    <Show actions={<ListButton />} >
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField label="nombre" source="nombre" />
            <TextField source="color" />
        </SimpleShowLayout>
    </Show>
);

export const CompetenciaCreate = () => (
    <Create>
        <SimpleForm>
            <NumberInput label="ID" source="id" />
            <TextInput label="nombre" source="nombre" />
            <TextInput label="color" source="color" />
        </SimpleForm>
    </Create>
);
