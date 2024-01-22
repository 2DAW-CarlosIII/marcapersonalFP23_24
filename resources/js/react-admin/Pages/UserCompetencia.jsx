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

export const UserCompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List >
        {isSmall ? (
                <SimpleList

                >
                    <EditButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >

                    <ShowButton />
                    <EditButton />
                </Datagrid>
            )}
        </List>
    );
}


export const UserCompetenciaEdit = () => (
    <Edit title={<UserCompetenciaTitle />}>
    <SimpleForm>

    </SimpleForm>
    </Edit>
);

export const UserCompetenciaShow = () => (
    <Show>
        <SimpleShowLayout>

        </SimpleShowLayout>
    </Show>
);

export const UserCompetenciaCreate = () => (
    <Create>
        <SimpleForm>

        </SimpleForm>
    </Create>
);
