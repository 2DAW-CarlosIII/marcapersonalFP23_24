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

const FamiliaProfesionalInput = () => (
    <ReferenceInput label="Familia Profesional" source="familia_id" reference="familias_profesionales">
        <SelectInput
        label="Familia Profesional"
        source="familia_id"
        optionText={record => record && record.nombre} />
    </ReferenceInput>
)

const ciclosFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    FamiliaProfesionalInput(),
];

export const CicloList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={ciclosFilters} >
            {isSmall ? (
                <SimpleList
                    primaryText="%{nombre}"
                    secondaryText="%{grado}"
                    tertiaryText="%{codFamilia}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <NumberField label="ID" source="id" />
                    <TextField label="COD Ciclo" source="codCiclo" />
                    <ReferenceField label="Cod Familia" source="familia_id" reference="familias_profesionales">
                        <FunctionField render={record => record && `${record.codigo}`} />
                    </ReferenceField>
                    <ReferenceField label="Nombre Familia" source="familia_id" reference="familias_profesionales">
                        <FunctionField render={record => record && `${record.nombre}`} />
                    </ReferenceField>
                    <TextField source="grado" />
                    <TextField source="nombre" />
                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );


};

const FamiliaInput = () => (
    <ReferenceInput label="Nombre Familia" source="familia_id" reference="familias_profesionales">
        <SelectInput
            label="Nombre Familia"
            source="familia_id"
            optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

const CodFamiliaInput = () => (
    <ReferenceInput label="Nombre Familia" source="codFamilia" reference="familias_profesionales">
        <SelectInput
            label="Cod Familia"
            source="familia_id"
            optionText={record => record && `${record.codigo}`} />
    </ReferenceInput>
)



export const CicloTitle = () => {
    const record = useRecordContext();
    return <span>Ciclo {record ? `"${record.nombre}"` : ''}</span>;
};

export const CicloEdit = () => (
    <Edit title={<CicloTitle />}>
        <SimpleForm>
            <NumberInput label="ID" source="id" />
            <TextInput label="COD Ciclo" source="codCiclo" />
            <CodFamiliaInput />
            <FamiliaInput />
            <TextInput source="grado" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Edit>


);

export const CicloShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField label="COD Ciclo" source="codCiclo" />
            <ReferenceField label="Cod Familia" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.codigo}`} />
            </ReferenceField>
            <ReferenceField label="Nombre Familia" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <TextField source="grado" />
            <TextField source="nombre" />
            <ShowButton />
            <EditButton />
        </SimpleShowLayout>
    </Show>
);

export const CicloCreate = () => (
    <Create>
        <SimpleForm>
            <NumberInput label="ID" source="id" />
            <TextInput label="COD Ciclo" source="codCiclo" />
            <CodFamiliaInput />
            <FamiliaInput />
            <TextInput source="grado" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Create>
);
