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
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const CompetenciaInput = () => (
    <ReferenceInput label="Nombre" source="nombre" reference="competencias" alwaysOn >
        <SelectInput
        label="Nombre"
        source="competencias"
        optionText={record => record && record.nombre} />
    </ReferenceInput>
)
const competenciasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    CompetenciaInput(),
];

export const CompetenciasList = () => {
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

export const CompetenciaTitle = () => {
  const record = useRecordContext();
  return <span>Competencia {record ? `"${record.nombre}"` : ''}</span>;
};

export const CompetenciaEdit = () => (
    <Edit title={<CompetenciaTitle />}>
    <SimpleForm>
        <CompetenciaInput />
        <TextInput source="id" disabled />
        <TextInput source="color" />
    </SimpleForm>
    </Edit>
);

export const CompetenciaShow = () => (
    <Show>
        <SimpleShowLayout>
            <ReferenceField label="Competencia" source="nombre" reference="competencias">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <TextField source="id" />
            <TextField source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const CompetenciaCreate = () => (
    <Create title={<CompetenciaTitle />}>
        <SimpleForm>
            <CompetenciaInput />
            <TextInput source="color" />
        </SimpleForm>
    </Create>
);
