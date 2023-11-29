import React, { useState } from 'react';

const Result = () => {
  const [marks, setMarks] = useState({
    marks1:0,
    marks2:0,
    marks3:0,
    marks4:0,
    marks5:0,
    marks6:0,
    marks7:0,
    marks8:0,
  });
  const [subject, setSubjects] = useState({
    subject1: "",
    subject2: "",
    subject3: "",
    subject4: ""
  });

  const handleChange = event => {
    const { name, value } = event.target;
    setMarks(prevMarks => ({
      ...prevMarks,
      [name]: parseInt(value)
    }));
  };

  const handleSubChange = (e) => {
    const {name , value} = e.target ;
    setSubjects(prevSub => ({
        ...prevSub,
        [name]: value 
    }));
  }

  const calculateTotalPercentage = () => {
    const midsemMarks = marks.marks1 + marks.marks2 + marks.marks3 + marks.marks4;
    const endsemMarks = marks.marks5 + marks.marks6 + marks.marks7 + marks.marks8
    const totalPercentage =  ((midsemMarks * 0.3)  + (endsemMarks*0.7)) / 4 ;
    return totalPercentage.toFixed(2);  
  };

  return (
    <div style={{margin:"100px"}}>
    <h1> Mid Sem Marks </h1>
      <h2>Marks Calculator</h2>
      <div>
        <label>Enter the subject Name :  </label>
        <input type="text" name="subject1" value={subject.subject1} onChange={handleSubChange} />
      </div>
      <br />
      <div>
        <label> {subject.subject1} {"==>"} </label>
       Mid :  <input type="number" placeholder='Marks' name="marks1" value={marks.marks1} onChange={handleChange} />
       {"  "} End :  <input type="number" placeholder='Marks' name="marks5" value={marks.marks5} onChange={handleChange} />
      </div>
      <div>
      <br />
        <label>Enter the subject Name :  </label>
        <input type="text" name="subject2" value={subject.subject2} onChange={handleSubChange} />
      </div>
      <br />
      <div>
        <label>{subject.subject2} {"==>"} </label>
       Mid :  <input type="number" name="marks2" value={marks.marks2} onChange={handleChange} />
       {"  "} End : <input type="number" name="marks6" value={marks.marks6} onChange={handleChange} />
      </div>
      <br />
      <div>
        <label>Enter the subject Name :  </label>
        <input type="text" name="subject3" value={subject.subject3} onChange={handleSubChange} />
      </div>
      <br />
      <div>
        <label> {subject.subject3} </label>
       Mid :  <input type="number" name="marks3" value={marks.marks3} onChange={handleChange} />
       {"  "} End : <input type="number" name="marks7" value={marks.marks7} onChange={handleChange} />
      </div>
      <br />
      <div>
        <label>Enter the subject Name :  </label>
        <input type="text" name="subject4" value={subject.subject4} onChange={handleSubChange} />
      </div>
      <br />
      <div>
        <label> {subject.subject4} </label>
        Mid : <input type="number" name="marks4" value={marks.marks4} onChange={handleChange} />
        {"  "} End : <input type="number" name="marks8" value={marks.marks8} onChange={handleChange} />
      </div>
    <br /><br /><hr /><br />
      <div>
        <h3>Total Percentage: {calculateTotalPercentage()}%</h3>
      </div>
    </div>
  );
}

export default Result;
