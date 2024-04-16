import {
    EditButton,
    CreateButton,
    DeleteWithConfirmButton,
    usePermissions,
    useRecordContext,
  } from 'react-admin';

export const RenderCreateButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();

    return (!isLoading && (permissions.role === permisos.role || permissions.role === 'admin')) && <CreateButton {...props} />;
};

export const RenderEditButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();
    const record = useRecordContext();
    if (!record || isLoading) return null;
    return (permissions.role === 'admin' || record.ownersId.includes(permissions.id)) && <EditButton {...props} />;
};

export const RenderDeleteButton = ({ permisos, ...props }) => {
    const { permissions, isLoading } = usePermissions();
    const record = useRecordContext();
    if (!record || isLoading) return null;
    return (permissions.role === 'admin' || record.ownersId.includes(permissions.id)) && <DeleteWithConfirmButton {...props} />;
};
