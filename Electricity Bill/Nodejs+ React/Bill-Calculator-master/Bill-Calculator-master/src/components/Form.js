import React, { useState } from "react";
import Fields from "./Fields";
import { TextField, Typography } from "@material-ui/core";
import Button from "@material-ui/core/Button";
import Icon from "@material-ui/core/Icon";

function Form() {
  const [inputFields, setInputFields] = useState([
    {
      fromUnits: "",
      toUnits: "",
      unitAmount: "",
    },
  ]);

  const [totAmount, setTotAmount] = useState("0.00");
  const [totUnits, setTotUnits] = useState("");

  const handleChangeInput = (e, idx) => {
    let val = e.target.value;
    const values = [...inputFields];
    values[idx][e.target.name] = val;
    setInputFields(values);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    let totalAmt = 0.0;
    let i = 0;
    for (i; i < inputFields.length; i++) {
      let from = parseInt(inputFields[i].fromUnits);
      let to = parseInt(inputFields[i].toUnits);
      let unitAmt = parseFloat(inputFields[i].unitAmount);
      if (!validateInputFields(from, to, totUnits, unitAmt, i)) {
        setTotAmount("0.00");
        return;
      }
      if (totUnits >= from && totUnits < to) {
        totalAmt += (totUnits - from) * unitAmt;
      } else {
        totalAmt += (to - from) * unitAmt;
      }
    }
    setTotAmount((Math.round(totalAmt * 100) / 100).toFixed(2));
  };

  const validateInputFields = (from, to, totUnits, unitAmt, i) => {
    console.log(i);
    if ((String(from) === "NaN" || from <= 0) && i > 0) {
      alert("From Units should be a positive number");
      return false;
    }

    if (String(to) === "NaN" || to <= 0) {
      alert("To Units should be a positive number");
      return false;
    }

    if (String(unitAmt) === "NaN" || unitAmt <= 0) {
      alert("Amount per Unit should be a positive number");
      return false;
    }

    if (String(totUnits) === "NaN" || totUnits <= 0) {
      alert("Total Units should be a positive number");
      return false;
    }

    if (from > to) {
      alert("To Units should be greater than From Units");
      return false;
    }

    if (inputFields.length - 1 === i) {
      if (totUnits < from || totUnits > to) {
        alert("Total Units should be between From and To Units");
        return false;
      }
    }

    return true;
  };

  const handleAdd = () => {
    setInputFields([
      ...inputFields,
      {
        fromUnits: "",
        toUnits: "",
        unitAmount: "",
      },
    ]);
  };

  const handleRemove = (idx) => {
    const values = [...inputFields];
    if (!(values.length === 1)) {
      values.splice(idx, 1);
      setInputFields(values);
    }
  };

  const handleChangeTotUnits = (e) => {
    setTotUnits(e.target.value);
  };

  return (
    <form onSubmit={handleSubmit}>
      {inputFields.map((inputField, index) => (
        <Fields
          key={index}
          index={index}
          inputField={inputField}
          handleChangeInput={handleChangeInput}
          handleAdd={handleAdd}
          handleRemove={handleRemove}
        />
      ))}

      <TextField
        placeholder='0'
        type='number'
        name='totUnits'
        variant='outlined'
        label='Total Units'
        onChange={(event) => {
          handleChangeTotUnits(event);
        }}
        value={totUnits}
      />

      <Button
        variant='contained'
        type='submit'
        endIcon={<Icon>send</Icon>}
        onClick={handleSubmit}
      >
        Calculate
      </Button>

      <Typography
        tabIndex='-1'
        className='total-bill-amt'
        variant='h6'
        name='unitAmount'
        placeholder='0'
        gutterBottom
      >
        Total Bill Amount: {totAmount}
      </Typography>
    </form>
  );
}

export default Form;
