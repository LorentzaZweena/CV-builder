const strRegex =  /^[a-zA-Z\s]*$/;
const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

const digitRegex = /^\d+$/;
const mainForm = document.getElementById('cv-form');

let firstnameElem = mainForm.firstname;
let middlenameElem = mainForm.middlename;
let lastnameElem = mainForm.lastname;
let imageElem = mainForm.image;
let designationElem = mainForm.designation;
let addressElem = mainForm.address;
let emailElem = mainForm.email;
let mobilenoElem = mainForm.mobileno;
let summaryElem = mainForm.summary;

const getUserInputs = () =>{
    console.log(firstnameElem.value, middlenameElem.value, lastnameElem.value, imageElem.value, designationElem.value, addressElem.value, emailElem.value, mobilenoElem.value, summaryElem.value);
}

const generateCV = () => {
    let userData = getUserInputs();
}