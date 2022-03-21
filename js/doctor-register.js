var registerButton = document.getElementsByClassName("login-button-main")[0],
  firstnameInput = document.querySelector("[placeholder='Firstname']"),
  lastnameInput = document.querySelector("[placeholder='Lastname']"),
  emailInput = document.querySelector(
    "[placeholder='Email or phone number...']"
  ),
  //
  //
  passwordInput = document.querySelector("[placeholder='Password']"),
  dateInput = document.querySelector("[type='date']"),
  telInput = document.querySelector("[type='tel']"),
  specInput = document.getElementsByTagName("select")[0],
  conditionsInput = document.getElementById("conditions"),
  //
  //
  firstnameInvalidFeedback = document.getElementById(
    "firstname-invalid-feedback"
  ),
  lastnameInvalidFeedback = document.getElementById(
    "lastname-invalid-feedback"
  ),
  //
  //
  emailInvalidFeedback = document.getElementById("email-invalid-feedback"),
  passwordInvalidFeedback = document.getElementById(
    "password-invalid-feedback"
  ),
  dateInvalidFeedback = document.getElementById("date-invalid-feedback"),
  telInvalidFeedback = document.getElementById("tel-invalid-feedback"),
  specInvalidFeedback = document.getElementById("spec-invalid-feedback"),
  conditionsInvalidFeedback = document.getElementById(
    "conditions-invalid-feedback"
  );
function validateEmail(email) {
  const rex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$|^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return rex.test(email);
}
function validateTel(tel) {
  const rex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/i;
  return rex.test(tel);
}
function validatePassword(password) {
  const rex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/i;
  return rex.test(password);
}
function validateFirstname(firstname) {
  const rex = /[a-zA-Z]{2,}|[\u0621-\u064A]{2,}/i;
  return rex.test(firstname);
}
function validateLastname(lastname) {
  const rex = /[a-zA-Z]{2,}|[\u0621-\u064A]{2,}/i;
  return rex.test(lastname);
}

//////////////
function validation(
  componentInput,
  vlidateFunction,
  errorEmpty,
  errorInvalid,
  e
) {
  if (!componentInput.value) {
    componentInput.classList.remove("is-valid");
    componentInput.classList.remove("is-invalid");
    componentInput.classList.add("is-invalid");

    e.preventDefault();
    return [errorEmpty, true];
  } else {
    if (vlidateFunction(componentInput.value)) {
      componentInput.classList.remove("is-valid");
      componentInput.classList.remove("is-invalid");
      componentInput.classList.add("is-valid");
      return ["", false];
    } else {
      componentInput.classList.remove("is-valid");
      componentInput.classList.remove("is-invalid");
      componentInput.classList.add("is-invalid");
      e.preventDefault();
      return [errorInvalid, true];
    }
  }
}
////////
registerButton.addEventListener("click", function (e) {
  var emailRes = validation(
    emailInput,
    validateEmail,
    "you have to input your Email or Phone Number",
    "your Email or Phone Number is incorrect",
    e
  );
  emailInvalidFeedback.innerHTML = emailRes[0];
  var emailError = emailRes[1];

  var passwordRes = validation(
    passwordInput,
    validatePassword,
    "you have to input your password",
    "password should contains 8 characters at least with one letter,one symbol one number at least",
    e
  );
  passwordInvalidFeedback.innerHTML = passwordRes[0];
  var passwordError = passwordRes[1];

  ////
  var firstnameRes = validation(
    firstnameInput,
    validateFirstname,
    "you have to input Firstname",
    "firstname must contains two letters at least",
    e
  );
  firstnameInvalidFeedback.innerHTML = firstnameRes[0];
  var firstnameError = firstnameRes[1];

  ///
  var lastnameRes = validation(
    lastnameInput,
    validateLastname,
    "you have to input Lastname",
    "lastname must contains two letters at least",
    e
  );
  lastnameInvalidFeedback.innerHTML = lastnameRes[0];
  var lastnameError = lastnameRes[1];

  ///

  var telRes = validation(
    telInput,
    validateTel,
    "you should input your phone number",
    "you should input correct phone number",
    e
  );
  telInvalidFeedback.innerHTML = telRes[0];
  var telError = telRes[1];

  if (specInput.value === "") {
    specInput.classList.remove("is-valid");
    specInput.classList.remove("is-invalid");
    specInput.classList.add("is-invalid");
    var specError = true;
    specInvalidFeedback.innerHTML = "you should choose your major";
    e.preventDefault();
  } else {
    specInput.classList.remove("is-valid");
    specInput.classList.remove("is-invalid");
    specInput.classList.add("is-valid");
    var specError = false;
    specInvalidFeedback.innerHTML = "";
  }
  //////////
  var conditionsError;
  if (!conditionsInput.checked) {
    
    conditionsInvalidFeedback.innerHTML =
      "you should accept all conditions before sign up";
      conditionsError = true;
  } else {
    conditionsInvalidFeedback.innerHTML =
      "";
      conditionsError = false;

  }

  var details = {
    email: emailInput.value,
    password: passwordInput.value,
    firstname: firstnameInput.value,
    lastname: lastnameInput.value,
    date: dateInput.value,
    tel: telInput.value,
    spec: specInput.value,
    conditions:conditionsInput.checked
  };
  console.log(
      emailError,
      passwordError ,
      firstnameError ,
      lastnameError ,
      telError ,
      conditionsError ,
      specError
  );
  if (
    !emailError &&
    !passwordError &&
    !firstnameError &&
    !lastnameError &&
    !telError &&
    !specError &&
    !conditionsError
  ) {
    fetch("php/register-doctor.php", {
      method: "POST",
      mode: "same-origin",
      credentials: "same-origin",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(details),
    })
      .then((data) => data.json())
      .then((res) => {
        //const a = document.getElementById("server");
        //a.innerHTML = res["email"];
        if (res["res"]) {
          conditionsInvalidFeedback.innerHTML = res["res"];
          window.location.href = "login.html";
        
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) => (conditionsInvalidFeedback.innerHTML += err[1] + '<br>')
          );
        }
    });
  }
});
