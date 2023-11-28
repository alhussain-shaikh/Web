import React from "react";
import "./App.css";
import Form from "./components/Form";
import Container from "@material-ui/core/Container";
import Theme from "./components/Theme";
import { ThemeProvider } from "@material-ui/core";

function App() {
  return (
    <Container>
      <header className='head'>Bill Calculator App</header>
      <ThemeProvider theme={Theme}>
        <Form />
      </ThemeProvider>
    </Container>
  );
}

export default App;
