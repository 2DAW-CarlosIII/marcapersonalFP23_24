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

import { useMediaQuery } from '@mui/material';
import { useRecordContext } from 'react-admin';

const competenciasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const CompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={competenciasFilters} >
            {isSmall ? (
                <SimpleList
                    primaryText="%{nombre}"
                    secondaryText="%{color}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <NumberField label="ID" source="id" />
                    <TextField source="nombre" />
                    <TextField source="color" />
                    <ShowButton />
                    <EditButton />
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
        <SimpleForm>
            <TextInput source="id" disabled />
            <TextInput source="nombre" label="Nombre" />
            <TextInput source="color" label="Color" />
        </SimpleForm>
    </Edit>


);

export const CompetenciaShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField label="Nombre" source="nombre" />
            <TextField label="Color" source="color" />
        </SimpleShowLayout>
    </Show>
);

export const CompetenciaCreate = () => (
    <Create>
            <SimpleForm>
                <TextInput source="nombre" label="Nombre" />
                <TextInput source="color" label="Color" />
            </SimpleForm>
    </Create>
);
