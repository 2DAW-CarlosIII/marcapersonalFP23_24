// BFI2/Resource.jsx
import React from 'react';
import {
  Resource,
  ListGuesser,
  ShowGuesser,
  EditGuesser,
  Create,
  SimpleForm,
  TextInput,
  ReferenceInput,
  SelectInput,
  NumberInput,
  BooleanInput
} from 'react-admin';
import AssessmentIcon from '@mui/icons-material/Assessment';
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
    name="bfi2"
    icon={PsychologyIcon}
    options={{ label: 'BFI-2 Assessment' }}
    list={() => <BFI2Assessment />}
  />,

  <Resource
    name="assessments"
    icon={AssessmentIcon}
    list={ListGuesser}
    show={ShowGuesser}
    edit={EditGuesser}
    create={AssessmentCreate}
  />,

  <Resource
    name="responses"
    list={ListGuesser}
    show={ShowGuesser}
    edit={EditGuesser}
    create={ResponseCreate}
  />,

  <Resource
    name="results"
    list={ListGuesser}
    show={BFI2Results}
    edit={EditGuesser}
  />,

  <Resource name="domains" />,
  <Resource name="facets" />,
  <Resource name="questions" />
];
