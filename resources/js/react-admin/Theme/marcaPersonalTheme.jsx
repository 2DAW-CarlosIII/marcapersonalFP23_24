
import { createTheme } from '@mui/material/styles';

// Extraido de https://mui.com/material-ui/customization/palette/
// #364f59 Azul
// #F59432 Naranja

const marcaPersonalTheme = createTheme({
    palette: {
      primary: {
        main: '#364f59',
        // light: will be calculated from palette.primary.main,
        // dark: will be calculated from palette.primary.main,
        // contrastText: will be calculated to contrast with palette.primary.main
      },
      secondary: {
        main: '#E0C2FF',
        light: '#F5EBFF',
        // dark: will be calculated from palette.secondary.main,
        contrastText: '#47008F',
      },
    },
  });
export default marcaPersonalTheme;
