// in resources/js/react-admin/pages/proyectos.jsx
import {
    List,
    Filter,
    SimpleList,
    Datagrid,
    TextField,
    DateField,
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
    FileInput,
} from 'react-admin';

import { useRecordContext } from 'react-admin';
import { useMediaQuery } from '@mui/material';


//TODO mostraremos id_estudiante como nombre (referenceFIeld + input para validad),
//id_actividad como nombre (reference field), docente_validador como texto (reference field) y fecha como fecha

//inputs para luego poder filtrar por docente_validador, por estudiante y por actividad
const DocenteInput = () => (
    <ReferenceInput label="Docente" source="docente_validador" reference="users" alwaysOn >
        <SelectInput
            label="Docente"
            source="docente_validador"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const EstudianteInput = () => (
    <ReferenceInput label="Estudiante" source="estudiante_id" reference="users" alwaysOn >
        <SelectInput
            label="Estudiante"
            source="estudiante_id"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const ActividadInput = () => (
    <ReferenceInput label="Actividad" source="actividad_id" reference="actividades">
        <SelectInput
            label="Actividad"
            source="actividad_id"
            optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

//filtros por docente_validador, por estudiante y por actividad

const EstudiantesFilter = () => (
    <ReferenceInput label="Estudiante" source="estudiante_id" reference="users" alwaysOn >
        <SelectInput
            label="Estudiante"
            source="estudiante_id"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
);

const ActividadesFilter = () => (
    <ReferenceInput label="Actividad" source="actividad_id" reference="actividades" alwaysOn >
        <SelectInput
            label="Actividad"
            source="actividad_id"
            optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
);

const DocentesFilter = () => (
    <ReferenceInput label="Docente" source="docente_validador" reference="users" alwaysOn >
        <SelectInput
            label="Docente"
            source="docente_validador"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
);

const reconocimientosFilters = [
    EstudiantesFilter(),
    ActividadesFilter(),
    DocentesFilter(),
];

export const ReconocimientoList = (props) => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List {...props} filters={reconocimientosFilters}>
            {isSmall ? (
                <SimpleList
                    primaryText="%{estudiante_id}"
                    secondaryText="%{actividad_id}"
                    tertiaryText="%{docente_validador}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <TextField source="id" />
                    <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
                        <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                    </ReferenceField>
                    <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                        <FunctionField render={record => record && `${record.nombre}`} />
                    </ReferenceField>
                    <ReferenceField label="Docente" source="docente_validador" reference="users">
                        <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                    </ReferenceField>
                    <DateField source="fecha" />
                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
}

export const ReconocimientoTitle = () => {
    const record = useRecordContext();
    return <span>Reconocimiento {record ? `"${record.id}"` : ''}</span>;
};

export const ReconocimientoEdit = () => (
    <Edit title={<ReconocimientoTitle />}>
        <SimpleForm>
            <EstudianteInput />
            <DocenteInput />
            <ActividadInput />

        </SimpleForm>
    </Edit>
);

export const ReconocimientoShow = () => (
    <Show>
        <SimpleShowLayout>
            <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <ReferenceField label="Docente" source="docente_validador" reference="users">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <DateField source="fecha" />
        </SimpleShowLayout>
    </Show>
);

export const ReconocimientoCreate = () => (
    <Create>
        <SimpleForm>
            <EstudianteInput />
            <DocenteInput />
            <ActividadInput />
        </SimpleForm>
    </Create>
);
