import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    EditButton,
    Edit,
    Create,
    SimpleForm,
    ReferenceInput,
    TextInput,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    ReferenceField,
    FunctionField
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const DocenteInput = () => (
    <ReferenceInput label="Docente" source="docente_validador" reference="users" >
        <SelectInput
            label="Docente"
            source="docente_validador"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const UserInput = () => (
    <ReferenceInput label="User" source="id" reference="users" >
        <SelectInput
            label="User"
            source="id"
            optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const CompetenciaInput = () => (
    <ReferenceInput label="Competencia" source="id" reference="competencias" >
        <SelectInput
            label="Competencia"
            source="id"
            optionText={record => record && `${record.nombre} ${record.color}`} />
    </ReferenceInput>
)

const user_CompetenciasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    DocenteInput(),
    UserInput(),
    CompetenciaInput(),
];

export const User_CompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
      <List filters={user_CompetenciasFilters} >
        {isSmall ? (
          <SimpleList>
            <EditButton />
          </SimpleList>
        ) : (
          <Datagrid bulkActionButtons={false} >
                <ReferenceField label="User" source="user_id" reference="users">
                    <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                </ReferenceField>
                <ReferenceField label="Competencia" source="competencia_id" reference="user_competencias">
                    <FunctionField render={record => record && `${record.nombre} ${record.color}`} />
                </ReferenceField>
                <ReferenceField label="Docente" source="docente_validador" reference="users">
                    <FunctionField render={record => record && `${record.nombre} ${record.color}`} />
                </ReferenceField>
                <ShowButton />
                <EditButton />
          </Datagrid>
        )}
      </List>
    );
  }

  export const User_CompetenciaTitle = () => {
    const record = useRecordContext();
    return <span>User compentencia {record ? `"${record.user_id}"` : ''}</span>;
  };

  export const User_CompetenciaEdit = () => (
      <Edit title={<User_CompetenciaTitle />}>
        <SimpleForm>
            <CompetenciaInput />
            <DocenteInput />
            <UserInput />
        </SimpleForm>
      </Edit>
  );

  export const User_CompetenciaShow = () => (
      <Show>
          <SimpleShowLayout>
                <ReferenceField label="User" source="user_id" reference="user_competencias">
                    <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                </ReferenceField>
                <ReferenceField label="Competencia" source="competencia_id" reference="user_competencias">
                    <FunctionField render={record => record && `${record.nombre} ${record.color}`} />
                </ReferenceField>
                <ReferenceField label="Docente" source="docente_validador" reference="users">
                    <FunctionField render={record => record && `${record.nombre} ${record.color}`} />
                </ReferenceField>
          </SimpleShowLayout>
      </Show>
  );

  export const User_CompetenciaCreate = () => (
      <Create title={<User_CompetenciaTitle />}>
          <SimpleForm>
            <CompetenciaInput />
            <DocenteInput />
            <UserInput />
          </SimpleForm>
      </Create>
  );
