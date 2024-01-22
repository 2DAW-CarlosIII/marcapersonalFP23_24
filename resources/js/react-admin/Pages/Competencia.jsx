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
import React from 'react';

export const CompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List>
            {isSmall ? (
                <SimpleList
                    primaryText={record => record.nombre}
                    secondaryText={record => `Color: ${record.color}`}
                    linkType={record => record.canEdit ? 'edit' : 'show'}
                />
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <TextField source="id" label="ID" />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="color" label="Color" />
                    <EditButton />
                    <ShowButton />
                </Datagrid>
            )}
        </List>
    );
};

