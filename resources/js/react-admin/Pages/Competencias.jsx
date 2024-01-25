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
                    <TextField label="nombre" source="nombre" />
                    <TextField label="color" source="color" />
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
            <NumberInput label="ID" source="id" />
            <TextInput label="nombre" source="nombre" />
            <TextInput label="color" source="color" />
        </SimpleForm>
    </Edit>


);

export const CompetenciaShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField label="nombre" source="nombre" />
            <TextField source="color" />
            <ShowButton />
            <EditButton />
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
