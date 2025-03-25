// BFI2/Resource.jsx
import React from 'react';
import {
  Resource,
  List,
  Datagrid,
  TextField,
  DateField,
  ShowButton,
  EditButton,
  ChipField,
  Button,
  useTranslate,
  useRecordContext,
  ShowGuesser,
  EditGuesser,
  Create,
  SimpleForm,
  ReferenceInput,
  SelectInput,
  NumberInput,
} from 'react-admin';
import { useNavigate } from 'react-router-dom';
import VisibilityIcon from '@mui/icons-material/Visibility';
import PsychologyIcon from '@mui/icons-material/Psychology';
import BFI2Assessment from './Assessment';
import BFI2Results from './Results';

// Customized create form for Assessments
const AssessmentCreate = (props) => (
  <Create {...props}>
    <SimpleForm>
      <SelectInput
        source="language"
        choices={[
          { id: 'en', name: 'English' },
          { id: 'es', name: 'Spanish' }
        ]}
        defaultValue="en"
      />
      <SelectInput
        source="status"
        choices={[
          { id: 'in_progress', name: 'In Progress' },
          { id: 'completed', name: 'Completed' },
          { id: 'abandoned', name: 'Abandoned' }
        ]}
        defaultValue="in_progress"
      />
    </SimpleForm>
  </Create>
);

// Botón de Ver Resultados
const ViewResultsButton = () => {
  const record = useRecordContext();
  const navigate = useNavigate();
  const translate = useTranslate();

  // Solo mostrar botón para evaluaciones completadas
  if (record.status !== 'completed') {
    return null;
  }

  return (
    <Button
      onClick={() => navigate(`/dashboard/results/${record.id}`)}
      label={translate('Ver resultados')}
      color="primary"
      startIcon={<VisibilityIcon />}
    />
  );
};

// Componente personalizado para renderizar el chip de estado
const StatusField = () => {
  const record = useRecordContext();
  const statusColors = {
    completed: 'success',
    in_progress: 'info',
    abandoned: 'error'
  };

  const statusLabels = {
    completed: 'Completed',
    in_progress: 'In Progress',
    abandoned: 'Abandoned'
  };

  return (
    <ChipField
      source="status"
      color={statusColors[record.status]}
      record={{
        ...record,
        status: statusLabels[record.status]
      }}
    />
  );
};

// Lista personalizada de Assessments
const AssessmentsList = (props) => (
  <List {...props}>
    <Datagrid>
      <TextField source="id" />
      <StatusField source="status" />
      <TextField source="language" />
      <DateField source="created_at" />
      <DateField source="completed_at" />
      <ViewResultsButton />
      <ShowButton />
      <EditButton />
    </Datagrid>
  </List>
);

// Customized create form for Responses
const ResponseCreate = (props) => (
  <Create {...props}>
    <SimpleForm>
      <ReferenceInput source="assessment_id" reference="assessments">
        <SelectInput optionText="id" />
      </ReferenceInput>
      <ReferenceInput source="question_id" reference="questions">
        <SelectInput optionText={(record) => `${record.id}. ${record.text_en.substring(0, 40)}...`} />
      </ReferenceInput>
      <NumberInput
        source="value"
        min={1}
        max={5}
        step={1}
      />
    </SimpleForm>
  </Create>
);

export const BFI2Resources = [

  <Resource
    name="assessments"
    icon={PsychologyIcon}
    list={AssessmentsList}
    options={{ label: 'Competencias' }}
    show={ShowGuesser}
    edit={EditGuesser}
    create={() => <BFI2Assessment />}
  />,

  <Resource
    name="responses"
    show={ShowGuesser}
    edit={EditGuesser}
    create={ResponseCreate}
    options={{ label: 'Responses' }}
  />,

  // Results como recurso sin mostrar en el menú
  <Resource
    name="results"
    show={BFI2Results}
    options={{ label: 'Results' }}
  />,

  <Resource name="domains" />,
  <Resource name="facets" />,
  <Resource name="questions" />
];
