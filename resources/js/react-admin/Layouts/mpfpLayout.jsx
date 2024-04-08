import { Layout, AppBar, TitlePortal } from 'react-admin';
import { default as LogoCabecera } from '../../Pages/front/src/componentes/LogoCabecera/LogoCabecera';
import Box from '@mui/material/Box';

export const MPFPLayout = (props) => (
    <Layout
        {...props}
        appBar={props => (
            <AppBar color="primary">
                <TitlePortal />
                <Box flex="1" />
                <LogoCabecera />
                <Box flex="1" />
            </AppBar>
        )}
    />
);
