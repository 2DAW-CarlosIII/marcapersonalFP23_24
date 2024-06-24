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
    useEditContext,
    Labeled,
    useNotify,
    useRefresh,
} from 'react-admin';

import { useMediaQuery } from '@mui/material';
import DeleteIcon from '@mui/icons-material/Delete';
import { useRecordContext } from 'react-admin';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';
import AjaxLoader from '../../Pages/front/src/componentes/AjaxLoader/AjaxLoader';

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

const BotonAddCiclo = ({registro}) => {
    const record = useRecordContext();
    const notify = useNotify();
    const refresh = useRefresh();
    const handleClick = () => {
        dataProvider.postCicloEstudianteProyecto(registro, record.id)
        .then(() => {
          refresh();
          notify('Ciclo añadido correctamente', { type: 'success' });
      })
        .catch((error) => {
          notify(`Error: ${error.message}`, { type: 'error' });
        });
    };

    return <Button label="Añadir estudios" onClick={handleClick} />;
};

const BotonDeleteCiclo = ({registro}) => {
    const record = useRecordContext(); //ciclo
    const notify = useNotify();
    const refresh = useRefresh();
      const deleteClick = (event) => {
        event.preventDefault();
        event.stopPropagation();
        dataProvider.deleteCicloEstudianteProyecto(registro, record.id)
            .then(() => {
                refresh();
                notify('Ciclo eliminado correctamente', { type: 'success' });
            })
            .catch((error) => {
                notify(`Error: ${error.message}`, { type: 'error' });
            });
      };

      return(
        <Button label="Eliminar estudios" onClick={deleteClick} >
            <DeleteIcon />
        </Button>
      )
};

const CicloFiltersMini = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const CicloListMini = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const record = useRecordContext(); //estudiante o proyecto
    const permisos = usePermissions();
    let role = record.docente_id ? 'docente' : 'estudiante';
    if (permisos.permissions.role != role && permisos.permissions.role != 'admin' ) return null;
    return (
        <List filters={CicloFiltersMini} actions={false} resource="ciclos" title={" "}>
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
                    <BotonAddCiclo registro={record} />
                </Datagrid>
            )}
        </List>
    );
};

export const CicloListMiniSelected = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const {record, isFetching} = useEditContext();

    return (
        <Labeled label="Ciclos asociados">
        <SimpleShowLayout >
        <ArrayField source="ciclos" >
            { isFetching ? ( <AjaxLoader/>)
            : (<Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="cod_ciclo" label="Código" />
                    <TextField source="nombre" label="Nombre" />
                    <TextField source="grado" label="Grado" />
                    <BotonDeleteCiclo registro={record}/>
            </Datagrid>)
            }
        </ArrayField>

        </SimpleShowLayout>
        </Labeled>

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
