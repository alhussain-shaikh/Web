import React from "react";
import "./../App.css";
import { TextField, IconButton } from "@material-ui/core";
import AddIcon from "@material-ui/icons/Add";
import RemoveIcon from "@material-ui/icons/Remove";

function Fields({
  index,
  inputField,
  handleChangeInput,
  handleAdd,
  handleRemove,
}) {
  return (
    <div key={index}>
      <TextField
        autoFocus
        type='number'
        name='fromUnits'
        variant='outlined'
        label='From Units'
        value={inputField.fromUnits}
        placeholder='0'
        onChange={(event) => {
          handleChangeInput(event, index);
        }}
      />
      <TextField
        type='number'
        name='toUnits'
        variant='outlined'
        label='To Units'
        value={inputField.toUnits}
        placeholder='0'
        onChange={(event) => {
          handleChangeInput(event, index);
        }}
      />
      <TextField
        name='unitAmount'
        variant='outlined'
        label='Amount per Unit'
        value={inputField.unitAmount}
        placeholder='0.00'
        onChange={(event) => {
          handleChangeInput(event, index);
        }}
      />

      <IconButton
        className='plus'
        tabIndex='-1'
        onClick={handleAdd}
        color='primary'
      >
        <AddIcon />
      </IconButton>
      <IconButton
        className='minus'
        tabIndex='-1'
        onClick={handleRemove}
        color='secondary'
        variant='contained'
      >
        <RemoveIcon />
      </IconButton>
    </div>
  );
}

export default Fields;
