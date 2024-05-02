import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    ReferenceField,
    Edit,
    Create,
    SimpleForm,
    ReferenceInput,
    TextInput,
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    FileInput,
    FileField,
    SaveButton,
    ListButton,
    TopToolbar,
    ExportButton,
    FilterButton,
    Toolbar,
    AutocompleteInput,
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery, Button } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton, MySelf } from '../Components/BotonesPermissions';

const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: 'estudiante' }} />
        <ExportButton/>
    </TopToolbar>
);

const EditActions = () => (
    <Toolbar>
      <div className="RaToolbar-defaultToolbar">
        <SaveButton/>
        <RenderDeleteButton />
      </div>
    </Toolbar>
);

const CurriculoFileInput = () => {
    return (
        <FunctionField
            render={
                record => {
                    if (record.pdf_curriculum) {
                        return (
                            <Button variant="contained" color="primary" href={`${import.meta.env.VITE_JSON_SERVER_URL}/curriculos/${record.id}/pdf`}>
                                Descargar currículo de estudiante
                            </Button>
                        )
                    }
                }
            }
        />
    );
};

const EstudianteInput = () => (
    <ReferenceInput label="Estudiante" source="user_id" reference="estudiantes" alwaysOn enableGetChoices={({ q }) => q && q.length >= 3} >
        <AutocompleteInput
        label="Estudiante"
        source="user_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)
const curriculosFilters = [
    EstudianteInput(),
];

export const CurriculoList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={curriculosFilters} actions={<ListActions />} >
      {isSmall ? (
        <SimpleList
          primaryText="%{video_curriculo}"
          secondaryText="%{pdf_curriculo}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
            <RenderEditButton />
            <RenderDeleteButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
            <TextField source="id" />
            <ReferenceField label="Estudiante" source="user_id" reference="users">
            <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <TextField source="video_curriculum" />
            <TextField source="pdf_curriculum" />
            <ShowButton />
            <RenderEditButton />
            <RenderDeleteButton />
        </Datagrid>
      )}
    </List>
  );
}

export const CurriculoTitle = () => {
  const record = useRecordContext();
  return <span>Curriculo {record ? `"${record.nombre}"` : ''}</span>;
};

export const CurriculoEdit = (props) => (
    <Edit title={<CurriculoTitle />} >
        <SimpleForm toolbar={<EditActions />} >
            <MySelf />
            <TextInput source="id" disabled />
            <TextInput source="video_curriculum" />
            <TextInput source="sobre_mi" />
            <CurriculoFileInput {...props} />
            <FileInput source="attachments" label="Archivo comprimido con el proyecto">
                <FileField source="src" title={"curriculo"} download="curriculo"/>
            </FileInput>
        </SimpleForm>
    </Edit>
);

export const CurriculoShow = () => (
    <Show actions={<ListButton />} >
        <SimpleShowLayout>
            <ReferenceField label="Estudiante" source="user_id" reference="estudiantes">
                <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
            </ReferenceField>
            <TextField source="id" />
            <TextField source="video_curriculum" />
            <FunctionField
                render={
                    record => {
                        if (record.pdf_curriculum) {
                            return (
                                <Button variant="contained" color="primary" href={`${import.meta.env.VITE_JSON_SERVER_URL}/curriculos/${record.id}/pdf`}>
                                    Descargar currículo de estudiante
                                </Button>
                            )
                        }
                    }
                }
            />
            <TextField source="sobre_mi" />
        </SimpleShowLayout>
    </Show>
);

export const CurriculoCreate = () => (
    <Create title={<CurriculoTitle />}>
        <SimpleForm>
            <MySelf />
            <TextInput source="video_curriculum" />
            <TextInput source="pdf_curriculum" />
        </SimpleForm>
    </Create>
);
