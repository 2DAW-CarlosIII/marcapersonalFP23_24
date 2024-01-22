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

const IDIdiomaInput = () => (
    <ReferenceInput label="ID Idioma" source="idioma_id" reference="idiomas" alwaysOn >
        <SelectInput
        label="Idioma"
        source="idioma_id"
        optionText={record => record && `${record.id}`} />
    </ReferenceInput>
)

const IDUsuarioInput = () => (
    <ReferenceInput label="ID Usuario" source="user_id" reference="users" alwaysOn >
        <SelectInput
        label="ID Usuario"
        source="user_id"
        optionText={record => record && `${record.id}`} />
    </ReferenceInput>
)

const NivelInput = () => (
    <SelectInput source="nivel" choices={[
        { id: 'A1', name: 'A1' },
        { id: 'A2', name: 'A2' },
        { id: 'B1', name: 'B1' },
        { id: 'B2', name: 'B2' },
        { id: 'C1', name: 'C1' },
        { id: 'C2', name: 'C2' },
    ]} />
)

const IdiomasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    IDUsuarioInput(),
    IDIdiomaInput(),
    NivelInput(),
];

export const UsersIdiomaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={IdiomasFilters} >
      {isSmall ? (
        <SimpleList
          primaryText="%{user_id}"
          secondaryText="%{nivel}"
          linkType={(record) =>(record.canEdit ? 'edit' : 'show')}
        >
          <EditButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
            <TextField source="id" />
          <TextField source="user_id" />
          <TextField source="idioma_id" />
          <TextField source="nivel" />
          <TextField source="certificado" />
          <ShowButton />
          <EditButton />
        </Datagrid>
      )}
    </List>
  );
}

export const UsersIdiomaTitle = () => {
  const record = useRecordContext();
  return <span>Users Idioma {record ? `"${record.id}"` : ''}</span>;
};

export const UsersIdiomaEdit = () => (
    <Edit title={<UsersIdiomaTitle />}>
        <SimpleForm>
            <TextInput source="id" disabled />
            <IDUsuarioInput/>
            <IDIdiomaInput/>
            <NivelInput/>
        </SimpleForm>
    </Edit>
);

export const UsersIdiomaShow = () => (
    <Show>
        <SimpleShowLayout>
            <TextField source="id" />
            <TextField source="user_id" />
            <TextField source="idioma_id" />
            <TextField source="nivel" />
            <TextField source="certificado" />
        </SimpleShowLayout>
    </Show>
);

export const UsersIdiomaCreate = () => (
    <Create>
        <SimpleForm>
            <IDUsuarioInput/>
            <IDIdiomaInput/>
            <NivelInput/>
        </SimpleForm>
    </Create>
);
