import { createMuiTheme } from "@material-ui/core/styles";

const Theme = createMuiTheme({
  palette: {
    primary: {
      main: "#F4A261",
    },
    secondary: {
      main: "#F00",
    },
  },
  typography: {
    fontFamily: ["Calibri", "sans-serif"],
  },
  shape: {
    borderRadius: 20,
  },
  overrides: {
    MuiButtonBase: {
      root: {
        margin: "10px",
      },
    },
    MuiTextField: {
      root: {
        margin: "10px",
      },
    },
    MuiButton: {
      root: {
        margin: "10px",
        textTransform: "none",
        fontSize: "20px",
      },
    },
    MuiTypography: {
      root: {
        marginTop: "5px",
        marginLeft: "10px",
      },
    },
  },
  props: {
    MuiButton: {
      disableRipple: true,
      color: "primary",
    },

    MuiTextField: {
      InputLabelProps: {
        shrink: true,
      },
    },

    MuiButtonBase: {
      disableRipple: true,
    },
  },
});

export default Theme;
