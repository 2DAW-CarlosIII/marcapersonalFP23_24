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
                    primaryText="%{user_id}"
                    secondaryText="%{competencia_id}"
                    tertiaryText="%{docente_validador}"
                linkType={(record) => (record.canEdit ? 'edit' : 'show')}
              >
                <EditButton />
              </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <TextField source="user_id" />
                    <TextField source="competencia_id" />
                    <TextField source="docente_validador" />
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
