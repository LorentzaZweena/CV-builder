const strRegex =  /^[a-zA-Z\s]*$/;
const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

const digitRegex = /^\d+$/;
const mainForm = document.getElementById('cv-form');
const validType = {
    TEXT : 'text',
    TEXT_EMP : 'text_emp',
    EMAIL : 'email',
    DIGIT : 'digit',
    MOBILENO : 'mobileno',
    ANY : 'any'
}

let firstnameElem = mainForm.firstname;
let middlenameElem = mainForm.middlename;
let lastnameElem = mainForm.lastname;
let imageElem = mainForm.image;
let designationElem = mainForm.designation;
let addressElem = mainForm.address;
let emailElem = mainForm.email;
let mobilenoElem = mainForm.mobileno;
let summaryElem = mainForm.summary;

const fetchValues = (attrs, ...nodeLists) => {
    let elemsAttrsCount = nodeLists.length;
    let elemsDataCount = nodeLists[0].length;
    let tempDataArr = [];

    for(let i = 0; i < elemsDataCount; i++){
        let dataObj = {};
        for(let j = 0; j < elemsAttrsCount; j++){
            dataObj[`${attrs[j]}`] = nodeLists[j][i].value;
        }
        tempDataArr.push(dataObj);
    }

    return tempDataArr;
}

const getUserInputs = () =>{

    //achievement
    let achievementsTitleElem = document.querySelectorAll('.achieve_title'), 
    achievementsDescriptionElem = document.querySelectorAll('.achieve_description');

    //experience
    let expTitleElem = document.querySelectorAll('.exp_title'),
    expOrganizationElem = document.querySelectorAll('.exp_organization'),
    expLocationElem = document.querySelectorAll('.exp_location'),
    expStartDateElem = document.querySelectorAll('.exp_start_date'),
    expEndDateElem = document.querySelectorAll('.exp_end_date'),
    expDescriptionElem = document.querySelectorAll('.exp_description');

    //educations
    let eduSchoolElem = document.querySelectorAll('.edu_school'),
    eduDegreeElem = document.querySelectorAll('.edu_degree'),
    eduCityElem = document.querySelectorAll('.edu_city'),
    eduStartDateElem = document.querySelectorAll('.edu_start_date'),
    eduGraduationDateElem = document.querySelectorAll('.edu_graduation_date'),
    eduDescriptionElem = document.querySelectorAll('.edu_description');

    //projects
    let projTitleElem = document.querySelectorAll('.proj_title'),
    projLinkElem = document.querySelectorAll('.proj_link'),
    proDescriptionElem = document.querySelectorAll('.proj_description');

    //skill
    let skillElem = document.querySelectorAll('.skill');
    firstnameElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'First name'));
    middlenameElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT_EMP, 'Middle name'));
    lastnameElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'Last name'));
    mobilenoElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'Phone number'));
    emailElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.EMAIL, 'Email'));
    addressElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Address'));
    designationElem.addEventListener('keyup', (e) => validateFormData(e.target, validType.TEXT, 'Designation'));

    achievementsTitleElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Title')));
    achievementsDescriptionElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Description')));
    
    expTitleElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Title')));
    expOrganizationElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Organization')));
    expLocationElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Location')));
    expStartDateElem.forEach(item => item.addEventListener('blur', (e) => validateFormData(e.target, validType.ANY, 'End date')));
    expDescriptionElem.forEach(item => item.addEventListener('keyup', (e) => validateFormData(e.target, validType.ANY, 'Description')));

    return {
        firstname: firstnameElem.value,
        middlename: middlenameElem.value,
        lastname: lastnameElem.value,
        designation: designationElem.value,
        address: addressElem.value,
        email: emailElem.value,
        mobileno: mobilenoElem.value,
        summary: summaryElem.value,
        achievements: fetchValues(['achieve_title', 'achieve_description'], achievementsTitleElem, achievementsDescriptionElem),
        experiences: fetchValues(['exp_title', 'exp_organization', 'exp_location', 'exp_start_date', 'exp_end_date', 'end_description'], expTitleElem, expOrganizationElem, expLocationElem, expStartDateElem, expEndDateElem, expDescriptionElem),
        educations: fetchValues(['edu_school', 'edu_degree', 'edu_city', 'edu_start_date', 'edu_graduation_date', 'edu_description'], eduSchoolElem, eduDegreeElem, eduCityElem, eduStartDateElem, eduGraduationDateElem, eduDescriptionElem),
        projects: fetchValues(['proj_title', 'proj_link', 'proj_description'], projTitleElem, projLinkElem, proDescriptionElem),
        skills: fetchValues(['skill'], skillElem)
    }
};

function validateFormData(elem, elemType, elemName){
    if(elemType == validType.TEXT){
        if(!strRegex.test(elem.value) || elem.value.trim().length == 0) addErrMsg(elem, elemName);
        else removeErrMsg(elem);
    }

    if(elemType == validType.TEXT_EMP){
        if(!strRegex.test(elem.value)) addErrMsg(elem, elemName);
        else removeErrMsg(elem);
    }

    if(elemType == validType.EMAIL){
        if(!emailRegex.test(elem.value) || elem.value.trim().length == 0) addErrMsg(elem, elemName);
        else removeErrMsg(elem);
    }

    if(elemType == validType.MOBILENO){
        if(!phoneRegex.test(elem.value) || elem.value.trim().length == 0) addErrMsg(elem, elemName);
        else removeErrMsg(elem);
    }

    if(elemType == validType.ANY){
        if(elem.value.trim().length == 0) addErrMsg(elem, elemName);
        else removeErrMsg(elem);
    }
}


function addErrMsg(formElem, formElemName){
    formElem.nextElementSibling.innerHTML = `${formElemName} is invalid`;
}

function removeErrMsg(formElem){
    formElem.nextElementSibling.innerHTML = "";
}

const generateCV = () => {
    let userData = getUserInputs();
    console.log(userData);
}