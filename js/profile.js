var profileIcon = document.getElementById("profile-icon");
//function
function readURL(input, ImageDisplay, navInput) {
  if (input.files) {
    var reader = new FileReader();
    reader.onload = function (e) {
      ImageDisplay.setAttribute("src", e.target.result);
      ImageDisplay.style.padding = 0;
      ImageDisplay.style.width = "80px";
      ImageDisplay.style.height = "80px";
      ImageDisplay.style.objectFit = "cover";
      navInput.setAttribute("src", e.target.result);
      navInput.style.padding = 0;
      navInput.style.borderRadius = "50%";
      navInput.style.objectFit = "cover";
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function passwordConfirm(value) {
  if (value !== newPasswordInput.value) {
    return false;
  } else {
    return true;
  }
}
//function for weight and length
function validateLength(value) {
  if (value >= 100 && value <= 300) return true;
  else return false;
}
function validateWeight(value) {
  if (value >= 30 && value <= 400) return true;
  else return false;
}
function selectValidation(componentInput, errorEmpty) {
  if (componentInput.value === "") {
    componentInput.classList.remove("is-valid");
    componentInput.classList.remove("is-invalid");
    componentInput.classList.add("is-invalid");
    return [errorEmpty, true];
  } else {
    componentInput.classList.remove("is-valid");
    componentInput.classList.remove("is-invalid");
    componentInput.classList.add("is-valid");
    return ["", false];
  }
}

function validateChronicDiseases(value) {
  if (value.length >= 3) {
    return true;
  } else {
    return false;
  }
}

function dateFormat(date) {
  var day = date.getDate();
  var month = date.getMonth() + 1;

  var year = date.getFullYear();
  if (day < 10) {
    day = "0" + day;
  }
  if (month < 10) {
    month = "0" + month;
  }
  return year + "-" + month + "-" + day;
}
function validateEmail(email) {
  const rex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$|^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return rex.test(email);
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
    return [errorEmpty, true];
  } else if (!vlidateFunction) {
    componentInput.classList.remove("is-valid");
    componentInput.classList.remove("is-invalid");
    componentInput.classList.add("is-valid");
    return ["", false];
  } else if (vlidateFunction(componentInput.value)) {
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
document.addEventListener("DOMContentLoaded", function () {
  var imageURL = sessionStorage.getItem("profileImage");
  console.log("aaaaaaaa", imageURL);
  if (imageURL !== "null") {
    url = `./upload/profilesImages/${imageURL}`;
  } else {
    url = "./img/profile-icon.png";
  }
  profileIcon.src = ("src", url);
  profileIcon.style.padding = 0;
  profileIcon.style.width = "45px";
  profileIcon.style.height = "45px";
  profileIcon.style.objectFit = "cover";
  profileIcon.style.borderRadius = "50%";
  profileIcon.style.padding = "1px";
  profileIcon.style.border = "1px solid #747475";
  ImageDisplay.src = ("src", url);
  ImageDisplay.style.padding = 0;
  ImageDisplay.style.width = "80px";
  ImageDisplay.style.height = "80px";
  ImageDisplay.style.objectFit = "cover";
  //
  details = {
    userInfo: "userInfo",
  };
  fetch("php/profile.php", {
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
      if (res["res"]) {
        console.log("resresres", res);
        firstnameInput.value = res["first_name"];
        lastnameInput.value = res["last_name"];
        emailInput.value = res["email"];
        genderInput.value = res["gendr"];
        countryInput.value = res["country"];
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
        result.map(
          (err) => (confirmPasswordInvalidFeedback.innerHTML += err[1] + "<br>")
        );
      }
    });
  //
  details = {
    medicalReocrd: "medicalReocrd",
  };
  fetch("php/profile.php", {
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
      if (res["res"]) {
        console.log("resresres", res);
        lengthInput.value = res["tall"];
        weightInput.value = res["weight"];
        bloodTypeInput.value = res["bood_type"];
        smokingInput.value = res["smooking"];
        alcoholInput.value = res["Alcohol"];
        //
        socialStatusInput.value = res["Social_status"];
        //
        yourChronicDiseasesInput.value = res["Chronic_diseases"];
        yourChronicDiseasesAdditionalInfoInput.value =
          res["Chronic_diseases_info"];
        //
        familyChronicDiseasesInput.value = res["family_history"];
        relativeRelationInput.value = res["relative_relation"];
        //
        allergyInput.value = res["allergy"];
        allergyAdditionalInfoInput.value = res["allergy_info"];
        //
        currentMedicationsInput.value = res["Medicines"];
        currentMedicationsAdditionalInfoInput.value = res["Medicines_info"];
        //
        surgeryNameInput.value = res["ml_surgery_name"];
        centerNameInput.value = res["ml_center_name"];
        testResultInput.value = res["ml_test_result"];
        testResultDateInput.value = res["ml_test_result_date"];
        //
        rpSurgeryNameInput.value = res["rp_surgery_name"];
        hospitalNameInput.value = res["rp_hospital_name"];
        doctorNameInput.value = res["rp_doctor_name"];
        surgeryDateInput.value = res["rp_surgery_date"];
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
        result.map((err) => console.log(err[1] + "<br>"));
      }
    });
  //
});
//logout
var logoutButton = document.getElementById("logout");
logoutButton.addEventListener("click", function (e) {
  sessionStorage.clear();
  window.location.href = "login.html";
});
//image input
var profileImageInput = document.getElementById("image-input"),
  ImageDisplay = document.getElementById("image-display"),
  profileIcon = document.getElementById("profile-icon");
profileImageInput.onchange = function (e) {
  readURL(profileImageInput, ImageDisplay, profileIcon);
  let files = profileImageInput.files;
  let formData = new FormData();
  formData.append("image", files[0]);

  fetch("php/user_pic.php", {
    method: "POST",
    mode: "same-origin",
    credentials: "same-origin",
    body: formData,
  })
    .then((data) => data.json())
    .then((res) => {
      if (res["res"]) {
        sessionStorage.setItem("profileImage", res["imageURL"]["photo"]);
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
      }
    });
};

//ImageDisplay.setAttribute("src",profileImage.value);

//Account
var accountButton = document.getElementById("accountSave"),
  firstnameInput = document.querySelector("[placeholder='Firstname']"),
  firstnameInvalidFeedback = document.getElementById(
    "firstname-invalid-feedback"
  );
(lastnameInput = document.querySelector("[placeholder='Lastname']")),
  (lastnameInvalidFeedback = document.getElementById(
    "lastname-invalid-feedback"
  )),
  (emailInvalidFeedback = document.getElementById("email-invalid-feedback")),
  (emailInput = document.querySelector("[placeholder='Email']")),
  (genderInput = document.getElementById("gender")),
  (genderInvalidFeedback = document.getElementById("gender-invalid-feedback")),
  (countryInput = document.getElementById("country")),
  (countryInvalidFeedback = document.getElementById(
    "country-invalid-feedback"
  ));
////////
accountButton.addEventListener("click", function (e) {
  e.preventDefault();
  // var emailRes = validation(
  //   emailInput,
  //   validateEmail,
  //   "you have to input your Email",
  //   "your Email or Phone Number is incorrect",
  //   e
  // );
  //emailInvalidFeedback.innerHTML = emailRes[0];
  //var emailError = emailRes[1];

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

  if (genderInput.value === "") {
    genderInput.classList.remove("is-valid");
    genderInput.classList.remove("is-invalid");
    genderInput.classList.add("is-invalid");
    var genderError = true;
    genderInvalidFeedback.innerHTML = "you should choose gender";
  } else {
    genderInput.classList.remove("is-valid");
    genderInput.classList.remove("is-invalid");
    genderInput.classList.add("is-valid");
    var genderError = false;
    genderInvalidFeedback.innerHTML = "";
  }
  if (countryInput.value === "") {
    countryInput.classList.remove("is-valid");
    countryInput.classList.remove("is-invalid");
    countryInput.classList.add("is-invalid");
    var countryError = true;
    countryInvalidFeedback.innerHTML = "you should choose country";
  } else {
    countryInput.classList.remove("is-valid");
    countryInput.classList.remove("is-invalid");
    countryInput.classList.add("is-valid");
    var countryError = false;
    countryInvalidFeedback.innerHTML = "";
  }
  if (
    //!emailError &&
    !firstnameError &&
    !lastnameError &&
    !genderError &&
    !countryError
  ) {
    var details = {
      email: emailInput.value,
      firstname: firstnameInput.value,
      lastname: lastnameInput.value,
      gender: genderInput.value,
      country: countryInput.value,
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          countryInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) => (countryInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});

//password

var oldPasswordInput = document.getElementById("oldpassword"),
  newPasswordInput = document.getElementById("newpassword"),
  confirmPasswordInput = document.getElementById("confirmpassword"),
  oldPasswordInvalidFeedback = document.getElementById(
    "oldPassword-invalid-feedback"
  ),
  newPasswordInvalidFeedback = document.getElementById(
    "newPassword-invalid-feedback"
  ),
  confirmPasswordInvalidFeedback = document.getElementById(
    "confirmPassword-invalid-feedback"
  ),
  passwordButton = document.getElementById("passwordSave");
passwordButton.addEventListener("click", function (e) {
  e.preventDefault();
  var oldPasswordRes = validation(
    oldPasswordInput,
    validatePassword,
    "you have to input your password",
    "password should contains 8 characters at least with one letter,one symbol one number at least",
    e
  );
  oldPasswordInvalidFeedback.innerHTML = oldPasswordRes[0];
  var oldPasswordError = oldPasswordRes[1];

  newPasswordRes = validation(
    newPasswordInput,
    validatePassword,
    "you have to input your new password",
    "password should contains 8 characters at least with one letter,one symbol one number at least",
    e
  );
  newPasswordInvalidFeedback.innerHTML = newPasswordRes[0];
  var newPasswordError = newPasswordRes[1];

  var confirmPasswordRes = validation(
      confirmPasswordInput,
      passwordConfirm,
      "you have to confirm your new password",
      "confirm password must match the new password"
    ),
    confirmPasswordError = confirmPasswordRes[1];
  confirmPasswordInvalidFeedback.innerHTML = confirmPasswordRes[0];

  var confirmPasswordRes = validation(
      confirmPasswordInput,
      passwordConfirm,
      "you have to confirm your new password",
      "confirm password must match the new password"
    ),
    confirmPasswordError = confirmPasswordRes[1];
  confirmPasswordInvalidFeedback.innerHTML = confirmPasswordRes[0];

  if (!newPasswordError && !oldPasswordError && !confirmPasswordError) {
    var details = {
      oldPassword: oldPasswordInput.value,
      newPassword: newPasswordInput.value,
      passwordButton: "passwordButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          confirmPasswordInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) =>
              (confirmPasswordInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});
//Medical Record
var lengthInput = document.getElementById("length"),
  lengthInvalidFeedback = document.getElementById("length-invalid-feedback"),
  weightInput = document.getElementById("weight"),
  weightInvalidFeedback = document.getElementById("weight-invalid-feedback"),
  bloodTypeInput = document.getElementById("blood-Type"),
  bloodTypeInvalidFeedback = document.getElementById(
    "blood-Type-invalid-feedback"
  ),
  smokingInput = document.getElementById("smoking"),
  smokingInvalidFeedback = document.getElementById("smoking-invalid-feedback"),
  alcoholInput = document.getElementById("alcohol"),
  alcoholInvalidFeedback = document.getElementById("alcohol-invalid-feedback"),
  generalMedicalInfoButton = document.getElementById(
    "general-medical-info-save"
  );

generalMedicalInfoButton.addEventListener("click", function (e) {
  e.preventDefault();
  var lengthRes = validation(
    lengthInput,
    validateLength,
    "you have to input your length",
    "you have to input your real length",
    e
  );
  lengthInvalidFeedback.innerHTML = lengthRes[0];
  var lengthError = lengthRes[1];

  var weightRes = validation(
    weightInput,
    validateWeight,
    "you have to input your weight",
    "you have to input your real weight",
    e
  );
  weightInvalidFeedback.innerHTML = weightRes[0];
  var weightError = weightRes[1];

  var bloodRes = selectValidation(bloodTypeInput, "you should choose gender");
  bloodTypeInvalidFeedback.innerHTML = bloodRes[0];
  var bloodError = bloodRes[1];

  var smokingRes = selectValidation(
    smokingInput,
    "you should choose smoking selection"
  );
  smokingInvalidFeedback.innerHTML = smokingRes[0];
  var smokingError = smokingRes[1];

  var alcoholRes = selectValidation(
    alcoholInput,
    "you should choose alcohol selection"
  );
  alcoholInvalidFeedback.innerHTML = alcoholRes[0];
  var alcoholError = alcoholRes[1];

  if (
    !lengthError &&
    !weightError &&
    !bloodError &&
    !smokingError &&
    !alcoholError
  ) {
    var details = {
      length: lengthInput.value,
      weight: weightInput.value,
      booodType: bloodTypeInput.value,
      smoking: smokingInput.value,
      alcohol: alcoholInput.value,
      generalMedicalInfoButton: "generalMedicalInfoButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          alcoholInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) => (alcoholInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});

//socialStatus
var socialStatusInput = document.getElementById("socialStatus"),
  socialStatusInvalidFeedback = document.getElementById(
    "social-status-invalid-feedback"
  ),
  socialStatusButton = document.getElementById("social-status-save");
socialStatusButton.addEventListener("click", function (e) {
  e.preventDefault();
  var socialStatusRes = selectValidation(
      socialStatusInput,
      "you should choose your social status"
    ),
    socialStatusError = socialStatusRes[1];
  socialStatusInvalidFeedback.innerHTML = socialStatusRes[0];
  if (!socialStatusError) {
    var details = {
      socialStatus: socialStatusInput.value,
      socialStatusButton: "socialStatusButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
          socialStatusInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) => (socialStatusInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});
//chronic disease
var yourChronicDiseasesInput = document.getElementById("your-chronic-diseases"),
  yourChronicDiseasesInvalidFeedback = document.getElementById(
    "your-chronic-diseases-invalid-feedback"
  ),
  yourChronicDiseasesAdditionalInfoInput = document.getElementById(
    "your-chronic-diseases-additional-info"
  ),
  yourChronicDiseasesAdditionalInfoInvalidFeedback = document.getElementById(
    "your-chronic-diseases-additional-info-invalid-feedback"
  ),
  yourChronicDiseasesButton = document.getElementById(
    "your-chronic-diseases-save"
  ),
  dontYourChronicDiseasesButton = document.getElementById(
    "dont-your-chronic-diseases-save"
  );

dontYourChronicDiseasesButton.addEventListener("click", function (e) {
  e.preventDefault();
  var details = {
    dontYourChronicDiseasesButton: "dontYourChronicDiseasesButton",
  };
  console.log("details", details);
  fetch("php/profile.php", {
    method: "POST",
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(details),
  });
  if (res["res"]) {
    yourChronicDiseasesInput.value = "None";
    yourChronicDiseasesAdditionalInfoInput.value = "";

    yourChronicDiseasesAdditionalInfoInvalidFeedback.innerHTML = res["res"];
  } else {
    result = [];
    for (var i in res) result.push([i, res[i]]);
    console.log(result);
    result.map(
      (err) =>
        (yourChronicDiseasesAdditionalInfoInvalidFeedback.innerHTML +=
          err[1] + "<br>")
    );
  }
});
yourChronicDiseasesButton.addEventListener("click", function (e) {
  e.preventDefault();
  var yourChronicDiseasesRes = validation(
    yourChronicDiseasesInput,
    validateChronicDiseases,
    "you should add your diseases",
    "three letters at least"
  );
  yourChronicDiseasesError = yourChronicDiseasesRes[1];
  yourChronicDiseasesInvalidFeedback.innerHTML = yourChronicDiseasesRes[0];
  if (!yourChronicDiseasesError) {
    var details = {
      ChronicDiseases: yourChronicDiseasesInput.value,
      ChronicDiseasesInfo: yourChronicDiseasesAdditionalInfoInput.value,
      yourChronicDiseasesButton: "yourChronicDiseasesButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          yourChronicDiseasesAdditionalInfoInvalidFeedback.innerHTML =
            res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) =>
              (yourChronicDiseasesAdditionalInfoInvalidFeedback.innerHTML +=
                err[1] + "<br>")
          );
        }
      });
  }
});
//family history of illness
var familyChronicDiseasesInput = document.getElementById(
    "family-chronic-diseases"
  ),
  familyChronicDiseasesInvalidFeedback = document.getElementById(
    "family-chronic-diseases-invalid-feedback"
  ),
  relativeRelationInput = document.getElementById("relative-relation"),
  relativeRelationInvalidFeedback = document.getElementById(
    "relative-relation-invalid-feedback"
  ),
  familyChronicDiseasesButton = document.getElementById(
    "family-chronic-diseases-save"
  ),
  dontFamilyChronicDiseasesButton = document.getElementById(
    "dont-family-chronic-diseases-save"
  );

dontFamilyChronicDiseasesButton.addEventListener("click", function (e) {
  e.preventDefault();
  var details = {
    dontFamilyChronicDiseasesButton: "dontFamilyChronicDiseasesButton",
  };
  console.log("details", details);
  fetch("php/profile.php", {
    method: "POST",
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(details),
  });
  if (res["res"]) {
    familyChronicDiseasesInput.value = "None";
    relativeRelationInput.value = "";

    relativeRelationInvalidFeedback.innerHTML = res["res"];
  } else {
    result = [];
    for (var i in res) result.push([i, res[i]]);
    console.log(result);
    result.map(
      (err) => (relativeRelationInvalidFeedback.innerHTML += err[1] + "<br>")
    );
  }
});

familyChronicDiseasesButton.addEventListener("click", function (e) {
  e.preventDefault();
  var familyChronicDiseasesRes = validation(
    familyChronicDiseasesInput,
    validateChronicDiseases,
    "you should add family diseases",
    "three letters at least"
  );
  familyChronicDiseasesError = familyChronicDiseasesRes[1];
  familyChronicDiseasesInvalidFeedback.innerHTML = familyChronicDiseasesRes[0];

  var relativeRelationRes = selectValidation(
    relativeRelationInput,
    "you should choose relative relation"
  );
  relativeRelationError = relativeRelationRes[1];
  relativeRelationInvalidFeedback.innerHTML = relativeRelationRes[0];

  if (!familyChronicDiseasesError && !relativeRelationError) {
    var details = {
      familyChronicDiseases: familyChronicDiseasesInput.value,
      relativeRelationInput: relativeRelationInput.value,
      familyChronicDiseasesButton: "familyChronicDiseasesButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          relativeRelationInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) =>
              (relativeRelationInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});
//Allergy
var allergyInput = document.getElementById("allergy"),
  allergyInvalidFeedback = document.getElementById("allergy-invalid-feedback"),
  allergyAdditionalInfoInput = document.getElementById(
    "allergy-additional-info"
  ),
  allergyAdditionalInfoInvalidFeedback = document.getElementById(
    "allergy-additional-info-invalid-feedback"
  ),
  allergyButton = document.getElementById("allergy-save"),
  dontAllergyButton = document.getElementById("dont-allergy-save");
dontAllergyButton.addEventListener("click", function (e) {
  e.preventDefault();
  var details = {
    dontAllergyButton: "dontAllergyButton",
  };
  console.log("details", details);
  fetch("php/profile.php", {
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
      if (res["res"]) {
        allergyInput.value = "None";
        allergyAdditionalInfoInput.value = "";

        allergyAdditionalInfoInvalidFeedback.innerHTML = res["res"];
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
        result.map(
          (err) =>
            (allergyAdditionalInfoInvalidFeedback.innerHTML += err[1] + "<br>")
        );
      }
    });
});

allergyButton.addEventListener("click", function (e) {
  e.preventDefault();
  var allergyRes = validation(
    allergyInput,
    validateChronicDiseases,
    "you should add your allergy",
    "three letters at least"
  );
  allergyError = allergyRes[1];
  allergyInvalidFeedback.innerHTML = allergyRes[0];

  if (!allergyError) {
    var details = {
      allergy: allergyInput.value,
      allergyAddInfo: allergyAdditionalInfoInput.value,
      allergyButton: "allergyButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          allergyAdditionalInfoInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) =>
              (allergyAdditionalInfoInvalidFeedback.innerHTML +=
                err[1] + "<br>")
          );
        }
      });
  }
});

//Current Medications
var currentMedicationsInput = document.getElementById("current-medications"),
  currentMedicationsInvalidFeedback = document.getElementById(
    "current-medications-invalid-feedback"
  ),
  currentMedicationsAdditionalInfoInput = document.getElementById(
    "current-medications-additional-info"
  ),
  currentMedicationsAdditionalInfoInvalidFeedback = document.getElementById(
    "current-medications-additional-info-invalid-feedback"
  ),
  currentMedicationsButton = document.getElementById(
    "current-medications-save"
  ),
  dontCurrentMedicationsButton = document.getElementById(
    "dont-current-medications-save"
  );
dontCurrentMedicationsButton.addEventListener("click", function (e) {
  e.preventDefault();
  var details = {
    dontCurrentMedicationsButton: "dontCurrentMedicationsButton",
  };
  console.log("details", details);
  fetch("php/profile.php", {
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
      if (res["res"]) {
        currentMedicationsInput.value = "None";
        currentMedicationsAdditionalInfoInput.value = "";

        currentMedicationsAdditionalInfoInvalidFeedback.innerHTML = res["res"];
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
        result.map(
          (err) =>
            (currentMedicationsAdditionalInfoInvalidFeedback.innerHTML +=
              err[1] + "<br>")
        );
      }
    });
});

currentMedicationsButton.addEventListener("click", function (e) {
  e.preventDefault();
  var currentMedicationsRes = validation(
    currentMedicationsInput,
    validateChronicDiseases,
    "you should add your current medications",
    "three letters at least"
  );
  currentMedicationsError = currentMedicationsRes[1];
  currentMedicationsInvalidFeedback.innerHTML = currentMedicationsRes[0];

  if (!currentMedicationsError) {
    var details = {
      currentMedications: currentMedicationsInput.value,
      currentMedicationsAddInfo: currentMedicationsAdditionalInfoInput.value,
      currentMedicationsButton: "currentMedicationsButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          currentMedicationsAdditionalInfoInvalidFeedback.innerHTML =
            res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) =>
              (currentMedicationsAdditionalInfoInvalidFeedback.innerHTML +=
                err[1] + "<br>")
          );
        }
      });
  }
});
//Medical labs
var surgeryNameInput = document.getElementById("surgery-name"),
  surgeryNameInvalidFeedback = document.getElementById(
    "surgery-name-invalid-feedback"
  ),
  centerNameInput = document.getElementById("center-name"),
  centerNameInvalidFeedback = document.getElementById(
    "center-name-invalid-feedback"
  ),
  testResultInput = document.getElementById("test-result"),
  testResultInvalidFeedback = document.getElementById(
    "test-result-invalid-feedback"
  ),
  testResultDateInput = document.getElementById("test-result-date"),
  testResultDateInvalidFeedback = document.getElementById(
    "test-result-date-invalid-feedback"
  ),
  medicalLabsButton = document.getElementById("medical-labs-save"),
  dontMedicalLabsButton = document.getElementById("dont-medical-labs-save");

var date = new Date();
maxDate = dateFormat(date);
var min = new Date();
min.setMonth(min.getMonth() - 2);
var minDate = dateFormat(min);

testResultDateInput.setAttribute("max", maxDate);
testResultDateInput.setAttribute("min", minDate);

dontMedicalLabsButton.addEventListener("click", function (e) {
  e.preventDefault();
  var details = {
    dontMedicalLabsButton: "dontMedicalLabsButton",
  };
  console.log("details", details);
  fetch("php/profile.php", {
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
      if (res["res"]) {
        surgeryNameInput.value = "None";
        centerNameInput.value = "None";
        testResultInput.value = "None";
        testResultDateInput.value = "0000-00-00";

        testResultDateInvalidFeedback.innerHTML = res["res"];
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
        result.map(
          (err) => (testResultDateInvalidFeedback.innerHTML += err[1] + "<br>")
        );
      }
    });
});
medicalLabsButton.addEventListener("click", function (e) {
  e.preventDefault();
  var surgeryNameRes = validation(
    surgeryNameInput,
    validateChronicDiseases,
    "you should add your surgery name",
    "three letters at least"
  );
  surgeryNameError = surgeryNameRes[1];
  surgeryNameInvalidFeedback.innerHTML = surgeryNameRes[0];

  var centerNameRes = validation(
    centerNameInput,
    validateChronicDiseases,
    "you should add your center name",
    "three letters at least"
  );
  centerNameError = centerNameRes[1];
  centerNameInvalidFeedback.innerHTML = centerNameRes[0];

  var testResultRes = validation(
    testResultInput,
    "",
    "you should add your test result",
    ""
  );
  testResultError = testResultRes[1];
  testResultInvalidFeedback.innerHTML = testResultRes[0];

  var testResultDateRes = validation(
    testResultDateInput,
    "",
    "you should add your test result date",
    ""
  );
  testResultDateError = testResultDateRes[1];
  testResultDateInvalidFeedback.innerHTML = testResultDateRes[0];

  if (
    !surgeryNameError &&
    !centerNameError &&
    !testResultError &&
    !testResultDateError
  ) {
    var details = {
      surgeryName: surgeryNameInput.value,
      centerName: centerNameInput.value,
      testResult: testResultInput.value,
      testResultDate: testResultDateInput.value,
      medicalLabsButton: "medicalLabsButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          testResultDateInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) =>
              (testResultDateInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});

//Remedial procedures
var rpSurgeryNameInput = document.getElementById("rp-surgery-name"),
  rpSurgeryNameInvalidFeedback = document.getElementById(
    "rp-surgery-name-invalid-feedback"
  ),
  hospitalNameInput = document.getElementById("hospital"),
  hospitalNameInvalidFeedback = document.getElementById(
    "hospital-invalid-feedback"
  ),
  doctorNameInput = document.getElementById("doctor-name"),
  doctorNameInvalidFeedback = document.getElementById(
    "doctor-name-invalid-feedback"
  ),
  surgeryDateInput = document.getElementById("surgery-date"),
  surgeryDateInvalidFeedback = document.getElementById(
    "surgery-date-invalid-feedback"
  ),
  remedialProcedureButton = document.getElementById("remedial-procedure-save"),
  dontRemedialProcedureButton = document.getElementById(
    "dont-remedial-procedure-save"
  );

var date = new Date();
maxDate = dateFormat(date);
surgeryDateInput.setAttribute("max", maxDate);

dontRemedialProcedureButton.addEventListener("click", function (e) {
  e.preventDefault();
  var details = {
    dontRemedialProcedureButton: "dontRemedialProcedureButton",
  };
  console.log("details", details);
  fetch("php/profile.php", {
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
      if (res["res"]) {
        rpSurgeryNameInput.value = "None";
        hospitalNameInput.value = "None";
        doctorNameInput.value = "None";
        surgeryDateInput.value = "0000-00-00";

        surgeryDateInvalidFeedback.innerHTML = res["res"];
      } else {
        result = [];
        for (var i in res) result.push([i, res[i]]);
        console.log(result);
        result.map(
          (err) => (surgeryDateInvalidFeedback.innerHTML += err[1] + "<br>")
        );
      }
    });
});
remedialProcedureButton.addEventListener("click", function (e) {
  e.preventDefault();
  var rpSurgeryNameRes = validation(
    rpSurgeryNameInput,
    validateChronicDiseases,
    "you should add surgery name",
    "three letters at least"
  );
  rpSurgeryNameError = rpSurgeryNameRes[1];
  rpSurgeryNameInvalidFeedback.innerHTML = rpSurgeryNameRes[0];

  var hospitalNameRes = validation(
    hospitalNameInput,
    validateChronicDiseases,
    "you should add your hospital or clinic name",
    "three letters at least"
  );
  hospitalNameError = hospitalNameRes[1];
  hospitalNameInvalidFeedback.innerHTML = hospitalNameRes[0];

  var doctorNameRes = validation(
    doctorNameInput,
    "",
    "you should add your docotor name",
    ""
  );
  doctorNameError = doctorNameRes[1];
  doctorNameInvalidFeedback.innerHTML = doctorNameRes[0];

  var surgeryDateRes = validation(
    surgeryDateInput,
    "",
    "you should add your surgery date",
    ""
  );
  surgeryDateError = surgeryDateRes[1];
  surgeryDateInvalidFeedback.innerHTML = surgeryDateRes[0];

  if (
    !rpSurgeryNameError &&
    !hospitalNameError &&
    !doctorNameError &&
    !surgeryDateError
  ) {
    var details = {
      rpsurgeryName: rpSurgeryNameInput.value,
      hospitalName: hospitalNameInput.value,
      doctorName: doctorNameInput.value,
      surgeryDate: surgeryDateInput.value,
      remedialProcedureButton: "remedialProcedureButton",
    };
    console.log("details", details);
    fetch("php/profile.php", {
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
        if (res["res"]) {
          surgeryDateInvalidFeedback.innerHTML = res["res"];
        } else {
          result = [];
          for (var i in res) result.push([i, res[i]]);
          console.log(result);
          result.map(
            (err) => (surgeryDateInvalidFeedback.innerHTML += err[1] + "<br>")
          );
        }
      });
  }
});
