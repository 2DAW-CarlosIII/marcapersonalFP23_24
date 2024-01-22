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
} from "react-admin";

import { useMediaQuery } from "@mui/material";
import { useRecordContext } from "react-admin";

const idiomasuserFilter = [
    <TextInput source="q" label="Search" alwaysOn />,
    <TextInput source="nombre" label="Nombre" />,
];
export const IdiomauserList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down("sm"));
    return (
        <List filters={idiomasuserFilter}>
            {isSmall ? (
                <SimpleList
                    primaryText="%{nombre}"
                    linkType={(record) => (record.canEdit ? "edit" : "show")}
                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <NumberField label="ID" source="id" />
                    <ReferenceField
                        label="Usuario"
                        source="user_id"
                        reference="users"
                    >
                        <TextField source="name" />
                    </ReferenceField>
                    <ReferenceField
                        label="Idioma"
                        source="idioma_id"
                        reference="idiomas"
                    >
                        <TextField source="nombre" />
                    </ReferenceField>
                    <TextField label="Certificado" source="certificado" />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
};

export const IdiomauserShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <ReferenceField label="Usuario" source="user_id" reference="users">
                <TextField source="name" />
            </ReferenceField>
            <ReferenceField
                label="Idioma"
                source="idioma_id"
                reference="idiomas"
            >
                <TextField source="nombre" />
            </ReferenceField>
            <TextField label="Certificado" source="certificado" />
        </SimpleShowLayout>
    </Show>
);

export const IdiomauserEdit = () => {
    const record = useRecordContext();
    return (
        <Edit>
            <SimpleForm>
                <NumberInput disabled source="id" />
                <ReferenceInput
                    label="Usuario"
                    source="user_id"
                    reference="users"
                >
                    <SelectInput optionText="name" />
                </ReferenceInput>
                <ReferenceInput
                    label="Idioma"
                    source="idioma_id"
                    reference="idiomas"
                >
                    <SelectInput optionText="nombre" />
                </ReferenceInput>
                <TextInput label="Certificado" source="certificado" />
            </SimpleForm>
        </Edit>
    );
};

export const IdiomauserCreate = () => (
    <Create>
        <SimpleForm>
            <ReferenceInput label="Usuario" source="user_id" reference="users">
                <SelectInput optionText="name" />
            </ReferenceInput>
            <ReferenceInput
                label="Idioma"
                source="idioma_id"
                reference="idiomas"
            >
                <SelectInput optionText="nombre" />
            </ReferenceInput>
            <TextInput label="Certificado" source="certificado" />
        </SimpleForm>
    </Create>
);
