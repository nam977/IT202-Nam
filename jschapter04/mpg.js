"use strict";

const select = selector => 
document.querySelector(selector);

const getErrorMag = lb1 =>
      `select{lbl} must be a valid number greater than zero.`;

const focusAndSelect = selector => {
    const elem = select(selector);
    elem.focus();
    elem.select();
};

const processEntries = () => {
    const miles = parseFloat(select("#miles").value);
    const gallons = parseFloat(select("#gallons").value);
    if (isNaN(miles) || miles <= 0) {
        alert(getErrorMsg("Miles driven"));
        focusAndSelect("#miles");
    }else if(isNaN(gallons) || gallons <= 0){
        alert(getErrorMag("Gallons of gas used."));
        focusAndSelect("#gallons");
    }else{
        select("#mpg").value = (miles / gallons).toFixed(2);
    }
};

document.addEventListener("DOMContentLoaded", () => {
    select("#calculate").addEventListener(
        "click", processEntries);
    select("#miles").focus();
});