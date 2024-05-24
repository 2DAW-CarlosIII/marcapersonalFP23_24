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
    SelectInput,
    BooleanInput,
    useNotify,
    useRefresh,
    Loading,
    DeleteButton,
  } from 'react-admin';

import { useRecordContext, useGetList} from 'react-admin';
import { useMediaQuery } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';
import React, { useState, useEffect } from 'react';
import DeleteIcon from '@mui/icons-material/Delete';

const ListActions = () => (
    <TopToolbar>
        <FilterButton/>
        <RenderCreateButton permisos={{ role: null }} />
        <ExportButton/>
    </TopToolbar>
);

const validateIdioma2Estudiante = (values) => {
  const errors = {};
  if (!values.idioma_id) {
      errors.idioma_id = 'El idioma es requerido';
  }
  if (!values.nivel) {
      errors.nivel = 'El nivel es requerido';
  }
  return errors
};

const IdiomaInput = () => {
  const { data, isLoading } = useGetList('idiomas', {
    pagination: { page: 1, perPage: 200 },
    sort: { field: 'english_name', order: 'ASC' },
  });
  return (
      <SelectInput
          source="idioma_id"
          choices={data}
          optionText="english_name"
          optionValue="id"
          isLoading={isLoading}
      />
  );
}

const BotonDeleteIdiomaEstudiante = () => {
  const record = useRecordContext(); //idioma
  const permisos = usePermissions();
  const notify = useNotify();
  const refresh = useRefresh();
    const deleteClick = (event) => {
      event.preventDefault();
      event.stopPropagation();
      dataProvider.deleteIdiomaEstudiante(permisos.permissions.id, record.id)
          .then(() => {
              refresh();
              notify('Idioma eliminado correctamente', { type: 'success' });
          })
          .catch((error) => {
              notify(`Error: ${error.message}`, { type: 'error' });
          });
    };

    return(
      <Button label="Eliminar idioma" onClick={deleteClick} >
          <DeleteIcon />
      </Button>
    )
};

const IdiomaEstudianteToolBar = props => {
  return props?.idiomaestudiante ? (
  <Toolbar {...props} >
      <SaveButton />
      <BotonDeleteIdiomaEstudiante />
  </Toolbar>
  )
  : (
      <Toolbar {...props} >
          <SaveButton />
      </Toolbar>
  );
}

export const FormAddIdiomaEstudiante = ({registrosIdiomasEstudiante}) => {
  const record = useRecordContext(); //idioma
  const permisos = usePermissions();
  const notify = useNotify();
  const refresh = useRefresh();
  const addIdiomaToEstudiante = (data) => {
    dataProvider.postIdiomaEstudiante(data)
      .then(() => {
        refresh();
        notify('Idioma añadido correctamente', { type: 'success' });
    })
      .catch((error) => {
        notify(`Error: ${error.message}`, { type: 'error' });
      });
  };
  if (permisos.permissions.role != 'estudiante' && permisos.permissions.role != 'admin' ) return null;

    const idiomaestudiante = registrosIdiomasEstudiante.find(registro => registro.idioma_id === record.id);
    return (
        <SimpleForm onSubmit={addIdiomaToEstudiante} toolbar={IdiomaEstudianteToolBar({ idiomaestudiante})} id="add_idioma_estudiante" validate={validateIdioma2Estudiante}>
          <TextInput source="estudiante_id" defaultValue={permisos.permissions.id} value="{permisos.permissions.id}" type="hidden"/>
          <TextInput source="idioma_id" defaultValue={record.id} value="{record.id}" type="hidden"/>
          <SelectInput source="nivel" choices={[
              { id: 'A1', name: 'A1' },
              { id: 'A2', name: 'A2' },
              { id: 'B1', name: 'B1' },
              { id: 'B2', name: 'B2' },
              { id: 'C1', name: 'C1' },
              { id: 'C2', name: 'C2' },
            ]} defaultValue={ idiomaestudiante?.nivel }/>
            <BooleanInput source="certificado" defaultValue={ !!idiomaestudiante?.certificado }/>
      </SimpleForm>
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
      <div className="RaToolbar-defaultToolbar">
        <SaveButton/>
        <RenderDeleteButton />
      </div>
    </Toolbar>
);

const IdiomasFilters = [
    <TextInput source="q" label="Search" alwaysOn />,
];

export const IdiomaList = () => {
  const [idiomasEstudiante, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
  const permisos = usePermissions();

  useEffect(() => {
    dataProvider.getIdiomasEstudiante(permisos.permissions.id).then((data) => {
      setData(data.json);
      setLoading(false);
    });
  }, []);

  if (loading) {
    return <Loading />;
  }

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
            <FormAddIdiomaEstudiante registrosIdiomasEstudiante={idiomasEstudiante} />
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
