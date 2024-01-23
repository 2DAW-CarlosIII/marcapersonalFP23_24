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

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

export const CompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List>
        {isSmall ? (
                <SimpleList

                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <TextField source="id" />
                    <TextField source="nombre" />
                    <TextField source="color" />
                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
}


export const CompetenciaEdit = () => (
    <Edit title={<CompetenciaTitle />}>
    <SimpleForm>

    </SimpleForm>
    </Edit>
);

export const CompetenciaShow = () => (
    <Show>
        <SimpleShowLayout>

        </SimpleShowLayout>
    </Show>
);

export const CompetenciaCreate = () => (
    <Create>
        <SimpleForm>

        </SimpleForm>
    </Create>
);
