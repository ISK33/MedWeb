var registerButton = document.getElementsByClassName("login-button-main")[0],
  emailInput = document.querySelector(
    "[placeholder='Email or phone number...']"
  ),
  passwordInput = document.querySelector("[placeholder='Password']"),
  emailInvalidFeedback = document.getElementById("email-invalid-feedback"),
  passwordInvalidFeedback = document.getElementById(
    "password-invalid-feedback"
  );
function validateEmail(email) {
  const rex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$|^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return rex.test(email);
}
function validatePassword(password) {
  const rex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/i;
  return rex.test(password);
}


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
      return [errorInvalid, true];
    }
  }
}
registerButton.addEventListener("click", function (e) {
  e.preventDefault();
  if(emailInput.value=="admin" && passwordInput.value=="123"){
    window.location.href = "articles/admin.php";
  }
  else{
  var emailRes = validation(
    emailInput,
    validateEmail,
    "you have to input your Email or Phone Number",
    "your Email or Phone Number is incorrect",
    e
  );
  emailInvalidFeedback.innerHTML = emailRes[0];
  emailError = emailRes[1];

  var passwordRes = validation(
    passwordInput,
    validatePassword,
    "you have to input your password",
    "password should contains 8 characters at least with one letter,one symbol one number at least",
    e
  );
  passwordInvalidFeedback.innerHTML = passwordRes[0];
  passwordError = passwordRes[1];
  var captchaError;

  var v = grecaptcha.getResponse();
  if(v.length == 0)
  {
    document.getElementById('recaptcha-feedback').innerHTML ="You can't leave Captcha Code empty";
      captchaError =false;
  }
  else
  {
      captchaError= true; 
  }
  details = {
    email: emailInput.value,
    password: passwordInput.value,
  };
  if (!emailError && !passwordError && captchaError ) {
    fetch("php/login.php", {
      method: "POST",
      mode: "same-origin",
      referrer: "https://javascript.info/anotherpage",
      credentials: "same-origin",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(details),
    })
      .then((data) => data.json())
      .then((res) => {
        if (res["res"]==="user") {
          passwordInvalidFeedback.innerHTML = res["res"];
          sessionStorage.setItem("log",res["id"]);
          sessionStorage.setItem("logAs",'user');
          window.location.href = "index.php";
          
      //     passwordInvalidFeedback.innerHTML = "done";
      //     window.location.href = "index.html";
        }else if(res["res"]==="doctor") {
          passwordInvalidFeedback.innerHTML = res["res"];
          sessionStorage.setItem("log",res["id"]);
          sessionStorage.setItem("logAs",'doctor');
          
          window.location.href = "questions/doctors-answers.php";
        }
         else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) => (passwordInvalidFeedback.innerHTML += err[1] + '<br>')
          );
        }
    });
  }
}
});
