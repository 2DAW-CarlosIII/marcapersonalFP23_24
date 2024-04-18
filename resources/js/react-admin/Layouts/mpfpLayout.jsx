import { Layout, AppBar, TitlePortal } from 'react-admin';
import Box from '@mui/material/Box';

export const MPFPLayout = (props) => (
    <Layout
        {...props}
        appBar={props => (
            <>
            <AppBar sx={{ marginTop: '5em' , left:'15px', width:'auto', right:'15px'}} color="primary">
                <TitlePortal />
                <Box flex="1" />
                <Box flex="1" />
            </AppBar>
            </>
        )}
    />
);
