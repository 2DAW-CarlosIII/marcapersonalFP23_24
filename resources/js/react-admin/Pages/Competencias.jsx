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
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    NumberField
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';

const ColorInput = () => (
    <ReferenceInput label="Color" source="color" reference="competencias" >
        <SelectInput
            label="Color"
            source="color"
            optionText={record => record && `${record.color}`} />
    </ReferenceInput>
)

const competenciasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    ColorInput(),
];

export const CompetenciaList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
      <List filters={competenciasFilters} >
        {isSmall ? (
          <SimpleList>
            <EditButton />
          </SimpleList>
        ) : (
          <Datagrid bulkActionButtons={false} >
                <NumberField source='id' />
                <TextField source='nombre' />
                <TextField source='color' />
                <ShowButton />
                <EditButton />
          </Datagrid>
        )}
      </List>
    );
  }

  export const CompetenciaTitle = () => {
    const record = useRecordContext();
    return <span>Compentencia {record ? `"${record.nombre}"` : ''}</span>;
  };

  export const CompetenciaEdit = () => (
      <Edit title={<CompetenciaTitle />}>
        <SimpleForm>
                <TextInput source='id' disabled />
                <TextInput source='nombre' />
                <TextInput source='color' />
        </SimpleForm>
      </Edit>
  );

  export const CompetenciaShow = () => (
      <Show>
          <SimpleShowLayout>
                <NumberField source='id' disabled />
                <TextField source='nombre' />
                <TextField source='color' />
          </SimpleShowLayout>
      </Show>
  );

  export const CompetenciaCreate = () => (
      <Create title={<CompetenciaTitle />}>
          <SimpleForm>
                <TextInput source='nombre' />
                <TextInput source='color' />
          </SimpleForm>
      </Create>
  );
