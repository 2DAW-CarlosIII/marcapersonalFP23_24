import {
    EditButton,
    CreateButton,
    DeleteWithConfirmButton,
    ExportButton,
    usePermissions,
    useRecordContext,
    useGetIdentity,
  } from 'react-admin';

  import { TextField, FormControl, InputLabel } from '@mui/material';

export const RenderCreateButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();

    return (!isLoading && (permissions.role === permisos.role || permissions.role === 'admin')) && <CreateButton {...props} />;
};

export const RenderEditButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();
    const record = useRecordContext();
    if (!record || isLoading) return null;
    return (
        (permissions.role === permisos?.role || permissions.role === 'admin')
        || record.ownersId?.includes(permissions.id))
        && <EditButton {...props} />;
};

export const RenderDeleteButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();
    const record = useRecordContext();
    if (!record || isLoading) return null;
    return (permissions.role === 'admin' || (record.ownersId?.includes(permissions.id))) && <DeleteWithConfirmButton {...props} />;
};

export const RenderExportButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();
    if (isLoading) return null;
    return ((permissions.role === permisos?.role || permissions.role === 'admin')) && <ExportButton {...props} />;
};

export const MySelf = () => {
    const { data, loading, error } = useGetIdentity();

    if (loading) return <div>Loading...</div>;
    if (error) return <div>Error: {error.message}</div>;

    return (
            <InputLabel>{data ? data.fullName : ''}</InputLabel>
    );
}
