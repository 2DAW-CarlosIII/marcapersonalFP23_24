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
    Labeled,
    useEditContext,
  } from 'react-admin';

import { useRecordContext, useGetList} from 'react-admin';
import { useMediaQuery, Box } from '@mui/material';
import { RenderCreateButton, RenderEditButton, RenderDeleteButton } from '../Components/BotonesPermissions';
import { dataProvider } from '../dataProvider';
import React, { useState, useEffect } from 'react';
import DeleteIcon from '@mui/icons-material/Delete';
import AjaxLoader from '../../Pages/front/src/componentes/AjaxLoader/AjaxLoader';

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

const BotonDeleteIdiomaEstudiante = ({estudiante}) => {
  const record = useRecordContext(); //idioma
  const notify = useNotify();
  const refresh = useRefresh();
    const deleteClick = (event) => {
      event.preventDefault();
      event.stopPropagation();
      dataProvider.deleteIdiomaEstudiante(estudiante.id, record.id)
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

const IdiomaEstudianteToolBar = props => (
      <Toolbar {...props} >
          <SaveButton />
      </Toolbar>
  );

export const FormAddIdiomaEstudiante = ({registrosIdiomasEstudiante}) => {
  const record = useRecordContext(); //estudiante
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

    return (
        <SimpleForm onSubmit={addIdiomaToEstudiante}
                    toolbar={<IdiomaEstudianteToolBar />}
                    id="add_idioma_estudiante"
                    validate={validateIdioma2Estudiante}
                    sx={{background:'#F7F7F7'}}>
          <TextInput source="estudiante_id" defaultValue={record.id} value="{record.id}" type="hidden" sx={{ display: 'none' }} />
          <Box  display="flex" justifyContent="space-between" gap={4} >
            <IdiomaInput />
            <SelectInput source="nivel" choices={[
                { id: 'A1', name: 'A1' },
                { id: 'A2', name: 'A2' },
                { id: 'B1', name: 'B1' },
                { id: 'B2', name: 'B2' },
                { id: 'C1', name: 'C1' },
                { id: 'C2', name: 'C2' },
              ]} />
              <BooleanInput source="certificado"/>
          </Box>
      </SimpleForm>
    );
};

export const IdiomaListMiniSelected = () => {
    const isSmall = useMediaQuery((theme) => theme.breakpoints.down('sm'));
    const {record, isFetching} = useEditContext();

    return (
        <Labeled label="Idiomas del estudiante">
        <SimpleShowLayout >
        <ArrayField source="idiomas" >
            { isFetching ? ( <AjaxLoader/>)
            : (<Datagrid bulkActionButtons={false}>
                <TextField source="id" disabled />
                <TextField source="english_name" />
                <TextField source="native_name" />
                    <BotonDeleteIdiomaEstudiante estudiante={record}/>
            </Datagrid>)
            }
        </ArrayField>

        </SimpleShowLayout>
        </Labeled>

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
