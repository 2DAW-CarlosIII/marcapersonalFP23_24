// in resources/js/react-admin/pages/proyectos.jsx
import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    DateField,
    ReferenceField,
    Edit,
    Create,
    SimpleForm,
    ReferenceInput,
    FunctionField,
    ShowButton,
    Show,
    SimpleShowLayout,
    SaveButton,
    ListButton,
    TopToolbar,
    ExportButton,
    FilterButton,
    Toolbar,
    AutocompleteInput,
    usePermissions,
    useNotify,
    Button,
    useRefresh,
  } from 'react-admin';

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton, RenderExportButton } from '../Components/BotonesPermissions';

const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: "estudiante" }} />
        <RenderExportButton permisos={{ role: "docente" }}/>
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

//TODO mostraremos id_estudiante como nombre (referenceFIeld + input para validad),
//id_actividad como nombre (reference field), docente_validador como texto (reference field) y fecha como fecha

//inputs para luego poder filtrar por docente_validador, por estudiante y por actividad
const DocenteInput = () => (
    <ReferenceInput label="Docente" source="docente_validador" reference="docentes" alwaysOn >
        <AutocompleteInput
        label="Docente"
        source="docente_validador"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const EstudianteInput = () => (
    <ReferenceInput label="Estudiante" source="estudiante_id" reference="estudiantes" alwaysOn >
        <AutocompleteInput
        label="Estudiante"
        source="estudiante_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
)

const ActividadInput = () => (
    <ReferenceInput label="Actividad" source="actividad_id" reference="actividades">
        <AutocompleteInput
        label="Actividad"
        source="actividad_id"
        optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

//filtros por docente_validador, por estudiante y por actividad

const EstudiantesFilter = () => (
    <ReferenceInput label="Estudiante" source="estudiante_id" reference="estudiantes" alwaysOn >
        <AutocompleteInput
        label="Estudiante"
        source="estudiante_id"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
);

const ActividadesFilter = () => (
    <ReferenceInput label="Actividad" source="actividad_id" reference="actividades" alwaysOn >
        <AutocompleteInput
        label="Actividad"
        source="actividad_id"
        optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
);

const DocentesFilter = () => (
    <ReferenceInput label="Docente" source="docente_validador" reference="docentes" alwaysOn >
        <AutocompleteInput
        label="Docente"
        source="docente_validador"
        optionText={record => record && `${record.nombre} ${record.apellidos}`} />
    </ReferenceInput>
);

const reconocimientosFilters = [
    EstudiantesFilter(),
    ActividadesFilter(),
    DocentesFilter(),
];

const ValidarButton = () => {
    const permisos = usePermissions();
    const notify = useNotify();
    const refresh = useRefresh();
    const registro = useRecordContext();
    if(
        (permisos.permissions.role != 'docente' && permisos.permissions.role != 'admin')
        ||
        registro.docente_validador
    ) return null;

    const handleClick = () => {
        fetch(`${import.meta.env.VITE_JSON_SERVER_URL}/reconocimientos/${registro.id}/validar`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(() => {
            notify('Reconocimiento validado');
            refresh();
        })
        .catch((error) => {
            notify(error, 'error');
        });
    };

    return (
        <Button variant="contained" color="primary" onClick={handleClick}>
            Validar Reconocimiento del Estudiante
        </Button>
    )
}

export const ReconocimientoList = (props) => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List {...props} filters={reconocimientosFilters} actions={<ListActions />} >
        {isSmall ? (
                <SimpleList
                    primaryText="%{estudiante_id}"
                    secondaryText="%{actividad_id}"
                    tertiaryText="%{docente_validador}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <RenderEditButton />
                    <RenderDeleteButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <TextField source="id" />
                    <ReferenceField label="Estudiante" source="estudiante_id" reference="estudiantes">
                        <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                    </ReferenceField>
                    <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                        <FunctionField render={record => record && `${record.nombre}`} />
                    </ReferenceField>
                    <ReferenceField label="Docente" source="docente_validador" reference="docentes">
                        <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                    </ReferenceField>
                    <DateField source="fecha" />
                    <ValidarButton />
                    <ShowButton />
                    <RenderEditButton />
                    <RenderDeleteButton />
                </Datagrid>
            )}
        </List>
    );
}

export const ReconocimientoTitle = () => {
  const record = useRecordContext();
  return <span>Reconocimiento {record ? `"${record.id}"` : ''}</span>;
};

export const ReconocimientoEdit = () => (
    <Edit title={<ReconocimientoTitle />}>
    <SimpleForm toolbar={<EditActions />} >
        <EstudianteInput />
        <DocenteInput />
        <ActividadInput />
    </SimpleForm>
    </Edit>
);

export const ReconocimientoShow = () => (
    <Show actions={<ListButton />} >
        <SimpleShowLayout>
                    <ReferenceField label="Estudiante" source="estudiante_id" reference="users">
                        <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                    </ReferenceField>
                    <ReferenceField label="Actividad" source="actividad_id" reference="actividades">
                        <FunctionField render={record => record && `${record.nombre}`} />
                    </ReferenceField>
                    <ReferenceField label="Docente" source="docente_validador" reference="users">
                        <FunctionField render={record => record && `${record.nombre} ${record.apellidos}`} />
                    </ReferenceField>
                    <DateField source="fecha" />
        </SimpleShowLayout>
    </Show>
);

export const ReconocimientoCreate = () => (
    <Create>
        <SimpleForm>
            <EstudianteInput />
            <DocenteInput />
            <ActividadInput />
        </SimpleForm>
    </Create>
);
