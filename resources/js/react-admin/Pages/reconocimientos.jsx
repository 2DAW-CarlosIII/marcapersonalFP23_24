import React, { useState } from "react";
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
    SimpleShowLayout,
    DateInput,
    DateField
  } from 'react-admin';
import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

    /**   INPUTS   */

    const DocenteInput = () => (
        <ReferenceInput label="Docente" source="docente_id" reference="users">
            <SelectInput
                label="Docente"
                source="docente_id"
                optionText={record => record && `${record.nombre} ${record.apellidos}`} />
        </ReferenceInput>
    )

    const ActividadInput = () => (
        <ReferenceInput label="Actividad" source="actividad_id" reference="actividades">
            <SelectInput
                label="Actividad"
                source="actividad_id"
                optionText={record => record && `${record.nombre} `} />
        </ReferenceInput>
    )

    const EstudianteInput = () => (
        <ReferenceInput label="Estudiantes" source="estudiante_id" reference="users">
            <SelectInput
                label="Estudiante"
                source="estudiante_id"
                optionText={record => record && `${record.nombre} ${record.apellidos} `} />
        </ReferenceInput>
    )

    /**     FILTROS     */

    /**     COMPONENETES GENERALES     */

    export const ReconocimientoTitle = () =>  {
        const record = useRecordContext();
        return <span>Reconocimiento {record ? `"${record.id}"` : ''}</span>;
    }

    export const ReconocimientoEdit = () => (
        <Edit title={<ReconocimientoTitle />}>
            <SimpleForm>
                <NumberInput label="Reconocimiento_id" source="id" disabled />
                <EstudianteInput />
                <ActividadInput />
                <TextInput label="Documento" source="documento" />
                <DocenteInput />
                <DateInput label="Fecha" source="fecha" />
            </SimpleForm>
        </Edit>
    );

    export const ReconocimientoCreate = () => (
        <Create>
            <SimpleForm>
                <NumberInput label="Reconocimiento_id" source="id" />
                <EstudianteInput />
                <ActividadInput />
                <TextInput label="Documento" source="documento" />
                <DocenteInput />
                <DateInput label="Fecha" source="fecha" />
            </SimpleForm>
        </Create>
    );

    export const ReconocimientoShow = () => (
        <Show title={<ReconocimientoTitle />}>
            <SimpleShowLayout>
                <NumberField label="Reconocimiento_id" source="id" />
                <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
                    <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                </ReferenceField>
                <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                    <FunctionField render={record => record && `${record.nombre}`} />
                </ReferenceField>
                <TextField label="Documento" source="documento" />
                <ReferenceField label="Docente" source="docente_validador" reference="users">
                    <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                </ReferenceField>
                <DateField label="Fecha" source="fecha" />
            </SimpleShowLayout>
        </Show>
    );

    export const ReconocimientoList = () => {
        const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
        return (
            <List>
                {isSmall ? (
                    <SimpleList
                        primaryText="%{actividad_id}"
                        secondaryText="%{documento}"
                        tertiaryText="%{docente_validador}"
                        linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                    >
                        <EditButton />
                    </SimpleList>
                ) : (
                    <Datagrid bulkActionButtons={false}>
                        <NumberField label="Reconocimiento_id" source="id" />
                        <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
                            <FunctionField render={(record) => record && `${record.nombre} ${record.apellidos}`} />
                        </ReferenceField>
                        <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                            <FunctionField render={(record) => record && `${record.nombre}`} />
                        </ReferenceField>
                        <TextField label="Documento" source="documento" />
                        <ReferenceField label="Docente" source="docente_validador" reference="users">
                            <FunctionField render={(record) => record && `${record.nombre} ${record.apellidos}`} />
                        </ReferenceField>
                        <DateField label="Fecha" source="fecha" />
                        <ShowButton />
                        <EditButton />
                    </Datagrid>
                )}
            </List>
        );
    };
