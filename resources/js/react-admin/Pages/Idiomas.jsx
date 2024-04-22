import {
    List,
    SimpleList,
    Datagrid,
    TextField,
    Edit,
    Create,
    SimpleForm,
    TextInput,
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

import { useRecordContext} from 'react-admin';
import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';

const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: null }} />
        <ExportButton/>
    </TopToolbar>
);
 
const BotonAddIdiomaEstudiante = ({estudiante}) => {
    const record = useRecordContext();
    const handleClick = () => {
        dataProvider.postIdiomaEstudiante(estudiante.id, record.id);
    };

    return <Button onClick={handleClick}>Añadir idioma</Button>;
};

const BotonDeleteIdiomaEstudiante = ({estudiante}) => {
    const record = useRecordContext();
    const handleClick = () => {
        dataProvider.deleteIdiomaEstudiante(estudiante.id, record.id);
    };

    return <Button onClick={handleClick}>Eliminar idioma</Button>;
};

const IdiomaFiltersMini = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const IdiomaListMini = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const permisos = usePermissions();
    const record = useRecordContext();
    if (permisos.permissions.role != 'estudiante' && permisos.permissions.role != 'admin' ) return null;
    return (
        <List filters={IdiomaFiltersMini} actions={""} resource="idiomas" title={" "}>
            {isSmall ? (
                <SimpleList
                primaryText="%{id}"
                secondaryText="%{english_name}"
                linkType={(record) => (record.canEdit ? 'edit' : 'show')}
                />
            ) : (
                <Datagrid bulkActionButtons={false}>
                    <TextField source="id" disabled />
                    <TextField source="english_name" />
                    <TextField source="native_name" />
                    <BotonAddIdiomaEstudiante estudiante={record} />
                    <BotonDeleteIdiomaEstudiante estudiante={record} />
                </Datagrid>
            )}
        </List>
    );
};

export const IdiomaListMiniSelected = () => {
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
                <TextField source="english_name" />
                <TextField source="native_name" />
            </Datagrid>
        </ArrayField>
        </SimpleShowLayout>


    );
};

const EditActions = () => (
    <Toolbar>
      <div class="RaToolbar-defaultToolbar">
        <SaveButton/>
        <RenderDeleteButton />
      </div>
    </Toolbar>
);

const IdiomasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const IdiomaList = () => {
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  return (
    <List filters={IdiomasFilters} actions={<ListActions />} >
      {isSmall ? (
        <SimpleList
          primaryText="%{id}"
          secondaryText="%{english_name}"
          linkType={(record) => (record.canEdit ? 'edit' : 'show')}
        >
          <RenderEditButton />
          <RenderDeleteButton />
        </SimpleList>
      ) : (
        <Datagrid bulkActionButtons={false} >
          <TextField source="id" />
          <TextField source="english_name" />
          <TextField source="native_name" />
          <ShowButton />
          <RenderEditButton />
          <RenderDeleteButton />
        </Datagrid>
      )}
    </List>
  );
}

export const IdiomaTitle = () => {
  const record = useRecordContext();
  return <span>Idioma {record ? `"${record.nombre}"` : ''}</span>;
};

export const IdiomaEdit = () => (
    <Edit title={<IdiomaTitle />}>
        <SimpleForm toolbar={<EditActions />} >
        <TextInput source="id" disabled />
            <TextInput source="alpha2" />
            <TextInput source="alpha3t" />
            <TextInput source="alpha3b" />
            <TextInput source="english_name" label="Nombre"/>
            <TextInput source="native_name"/>
        </SimpleForm>
    </Edit>
);

export const IdiomaShow = () => (
    <Show actions={<ListButton />} >
        <SimpleShowLayout>
        <TextField source="id" />
          <TextField source="alpha2" />
          <TextField source="alpha3t" />
          <TextField source="alpha3b" />
          <TextField source="english_name" />
          <TextField source="native_name" />
        </SimpleShowLayout>
    </Show>
);

export const IdiomaCreate = () => (
    <Create>
        <SimpleForm>
        <TextInput source="alpha2" />
            <TextInput source="alpha3t" />
            <TextInput source="alpha3b" />
            <TextInput source="english_name" label="Nombre"/>
            <TextInput source="native_name"/>
        </SimpleForm>
    </Create>
);
