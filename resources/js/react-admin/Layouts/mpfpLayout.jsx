import { Layout, AppBar, TitlePortal } from 'react-admin';
import Box from '@mui/material/Box';
import Cabecera from '../../Pages/front/src/componentes/Cabecera/Cabecera';
import LogoCabecera from '../../Pages/front/src/componentes/LogoCabecera/LogoCabecera';

export const MPFPLayout = (props) => (
    <Layout
        {...props}
        appBar={props => (
            <>
            <AppBar color="primary">
                <TitlePortal />
                <LogoCabecera flex="1"></LogoCabecera>
                <h1 flex="1" className="colorTexto">Marca Personal FP</h1>
                <Box flex="1" />
                <Box flex="1" />
            </AppBar>
            </>
        )}
    />
);
