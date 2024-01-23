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

const idiomasFilter = [
    <TextInput source="q" label="Search" alwaysOn />,
    <TextInput source="nombre" label="Nombre" />,
];

export const IdiomaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down("sm"));
    return (
        <List filters={idiomasFilter}>
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
                    <TextField label="Nombre" source="nombre" />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
};

export const IdiomaShow = () => (
    <Show>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField label="Nombre" source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const IdiomaEdit = () => (
    <Edit>
        <SimpleForm>
            <TextInput label="Nombre" source="nombre" />
        </SimpleForm>
    </Edit>
);

export const IdiomaCreate = () => (
    <Create>
        <SimpleForm>
            <TextInput label="Nombre" source="nombre" />
        </SimpleForm>
    </Create>
);
