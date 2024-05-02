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
    NumberField,
    NumberInput,
    FunctionField,
    SelectInput,
    ShowButton,
    Show,
    SimpleShowLayout,
    SaveButton,
    ListButton,
    TopToolbar,
    ExportButton,
    FilterButton,
    Toolbar,
    usePermissions,
    Button,
    ArrayField,
} from 'react-admin';

import { useMediaQuery } from '@mui/material';
import { useRecordContext } from 'react-admin';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';

const ListActions = () => (
  <TopToolbar>
      <FilterButton/>
      <RenderCreateButton permisos={{ role: null }} />
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

const FamiliaProfesionalInput = () => (
    <ReferenceInput label="Familia Profesional" source="familia_id" reference="familias_profesionales" alwaysOn >
        <SelectInput
        label="Familia Profesional"
        source="familia_id"
        optionText={record => record && record.nombre} />
    </ReferenceInput>
)
const ciclosFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
    FamiliaProfesionalInput(),
];

export const CicloList = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    return (
        <List filters={ciclosFilters} actions={<ListActions />} >
            {isSmall ? (
                <SimpleList
                    primaryText="%{nombre}"
                    secondaryText="%{grado}"
                    tertiaryText="%{codFamilia}"
                    linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                >
                    <RenderEditButton />
                    <RenderDeleteButton />
                </SimpleList>
            ) : (
                <Datagrid bulkActionButtons={false} >
                    <NumberField label="ID" source="id" />
                    <TextField label="COD Ciclo" source="codCiclo" />
                    <ReferenceField label="Cod Familia" source="familia_id" reference="familias_profesionales">
                        <FunctionField render={record => record && `${record.codigo}`} />
                    </ReferenceField>
                    <ReferenceField label="Nombre Familia" source="familia_id" reference="familias_profesionales">
                        <FunctionField render={record => record && `${record.nombre}`} />
                    </ReferenceField>
                    <TextField source="grado" />
                    <TextField source="nombre" />
                    <ShowButton />
                    <RenderEditButton />
                    <RenderDeleteButton />
                </Datagrid>
            )}
        </List>
    );


};

const BotonAddCicloEstudiante = ({estudiante}) => {
    const record = useRecordContext();
    const handleClick = () => {
        dataProvider.postCicloEstudiante(estudiante.id, record.id);
    };

    return <Button onClick={handleClick}>Añadir estudios</Button>;
};

const BotonDeleteCicloEstudiante = ({estudiante}) => {
    const record = useRecordContext();
    const handleClick = () => {
        dataProvider.deleteCicloEstudiante(estudiante.id, record.id);
    };

    return <Button onClick={handleClick}>Eliminar estudios</Button>;
};

const CicloFiltersMini = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const CicloListMini = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const permisos = usePermissions();
    const record = useRecordContext();
    if (permisos.permissions.role != 'estudiante' && permisos.permissions.role != 'admin' ) return null;
    return (
        <List filters={CicloFiltersMini} actions={""} resource="ciclos" title={" "}>
            {isSmall ? (
                <SimpleList
                primaryText={(record) => record.nombre}
                secondaryText={(record) => record.cod_ciclo}
                tertiaryText={(record) => record.grado}
                linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                />
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="cod_ciclo" label="Código" />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="grado" label="Grado" />
                    <BotonAddCicloEstudiante estudiante={record} />
                    <BotonDeleteCicloEstudiante estudiante={record} />
                </Datagrid>
            )}
        </List>
    );
};

export const CicloListMiniSelected = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const permisos = usePermissions();
    if (permisos.permissions.role != 'estudiante' && permisos.permissions.role != 'admin' ) return null;

// Lo haremos con ReferenceArrayField https://marmelab.com/react-admin/ReferenceArrayField.html
// o con  ReferenceManyField https://marmelab.com/react-admin/ReferenceManyField.html
    return (
        <SimpleShowLayout >
        <ArrayField source = "selected">
            <Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="cod_ciclo" label="Código" />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="grado" label="Grado" />
            </Datagrid>
        </ArrayField>
        </SimpleShowLayout>


    );
};

const FamiliaInput = () => (
    <ReferenceInput label="Nombre Familia" source="familia_id" reference="familias_profesionales">
        <SelectInput
            label="Nombre Familia"
            source="familia_id"
            optionText={record => record && `${record.nombre}`} />
    </ReferenceInput>
)

const CodFamiliaInput = () => (
    <ReferenceInput label="Nombre Familia" source="codFamilia" reference="familias_profesionales">
        <SelectInput
            label="Cod Familia"
            source="familia_id"
            optionText={record => record && `${record.codigo}`} />
    </ReferenceInput>
)



export const CicloTitle = () => {
    const record = useRecordContext();
    return <span>Ciclo {record ? `"${record.nombre}"` : ''}</span>;
};

export const CicloEdit = () => (
    <Edit title={<CicloTitle />}>
        <SimpleForm toolbar={<EditActions />}>
            <NumberInput label="ID" source="id" />
            <TextInput label="COD Ciclo" source="codCiclo" />
            <CodFamiliaInput />
            <FamiliaInput />
            <TextInput source="grado" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Edit>


);

export const CicloShow = () => (
    <Show actions={<ListButton />}>
        <SimpleShowLayout>
            <NumberField label="ID" source="id" />
            <TextField label="COD Ciclo" source="codCiclo" />
            <ReferenceField label="Cod Familia" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.codigo}`} />
            </ReferenceField>
            <ReferenceField label="Nombre Familia" source="familia_id" reference="familias_profesionales">
                <FunctionField render={record => record && `${record.nombre}`} />
            </ReferenceField>
            <TextField source="grado" />
            <TextField source="nombre" />
        </SimpleShowLayout>
    </Show>
);

export const CicloCreate = () => (
    <Create>
        <SimpleForm>
            <NumberInput label="ID" source="id" />
            <TextInput label="COD Ciclo" source="codCiclo" />
            <CodFamiliaInput />
            <FamiliaInput />
            <TextInput source="grado" />
            <TextInput source="nombre" />
        </SimpleForm>
    </Create>
);
