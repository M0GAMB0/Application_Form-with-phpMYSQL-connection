// First name validation
const nameValidation = (name) => {
  let idx = formatNames(name.value);
  console.log(idx);
  if (idx === -1) {
    return true;
  } else {
    name.value = name.value.substr(0, idx);
  }
};

const formatNames = (name) => {
  name = name.toUpperCase();
  for (let i = 0; i < name.length; i++) {
    if (
      (name.charAt(i) >= "A" && name.charAt(i) <= "Z") ||
      name.charAt(i) === ""
    ) {
      continue;
    } else {
      return i;
    }
  }
  return -1;
};
const formatNumbers = (numbers) => {
  for (let i = 0; i < numbers.length; i++) {
    if (numbers.charAt(i) >= 0 && numbers.charAt(i) <= 9) {
      continue;
    } else {
      return i;
    }
  }
  return -1;
};

const phoneValidation = () => {
  const phone = document.getElementById("phone");
  phone.setAttribute("type", "tel");
  let idx = formatNumbers(phone.value);
  if (idx != -1) {
    phone.value = phone.value.substr(0, idx);
  }

  if (phone.value.length > 10) {
    phone.value = phone.value.substr(0, 10);
  }
  //   console.log(typeof phone.value);
  //   console.log(phone.type);
};

const expNumber = () => {
  const exp = document.getElementById("exp");
  //   exp.setAttribute("type", "number");
  //   console.log(typeof exp.value);
  let idx = formatNumbers(exp.value);
  if (idx != -1) {
    exp.value = exp.value.substr(0, idx);
  }
  if (exp.value > 20 || exp.value < 0) {
    exp.value = "";
    alert("Please insert work experience correctly in range between 0 to 20");
  }
};

const validateAll = (...ele) => {
  for (let i = 0; i < ele.length; i++) {
    if (ele[i].value === null || ele[i].value === "") {
      alert("Please fill all fields to complete registration");
      return false;
    }
  }
  return true;
};
const onSubmit = (event) => {
  const fname = document.getElementById("fname");
  const lname = document.getElementById("lname");
  const phone = document.getElementById("phone");
  const date = document.getElementById("date");
  const gender = document.getElementById("gender");
  const city = document.getElementById("city");
  const country = document.getElementById("country");
  const qualification = document.getElementById("qualification");
  const exp = document.getElementById("exp");
  const emi = document.getElementById("emi");
  const tandc = document.getElementById("tandc");
  if(document.getElementById('emailWarning').innerText!=""){
    alert("Invalid Email ID...!!!");
    return false;
  }
  if (tandc.checked == false) {
    alert("Please accept Terms and Condition before proceeding.");
    return false;
  }
  if (
    validateAll(
      fname,
      lname,
      phone,
      date,
      gender,
      city,
      country,
      qualification,
      exp,
      emi
    )
  ) {
    if (
      confirm(
        `Name : ${fname.value} ${lname.value}\nPhone : ${phone.value}\nDate : ${date.value}\nGender: ${gender.value}\nCity: ${city.value}\nCountry: ${country.value}\nQualification: ${qualification.value}\nWork Experience: ${exp.value},\nEMI Months: ${emi.value}`
      ) == true
    ) {
      return true;
    }
    return false;
  } else return false;
};

function validateEmail()
{
  inputText=document.getElementById('email');
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.getElementById('emailWarning').innerText=""
return true;
}
else
{
// alert("You have entered an invalid email address!");
document.getElementById('emailWarning').innerText="**INVALID EMAIL!!!!**"
return false;
}
}
