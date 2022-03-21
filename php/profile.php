<?php
include 'con_config.php';
header('Content-Type:application/json');
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType === "application/json") {
    $content = file_get_contents("php://input");
    $decoded = json_decode($content, true);
    if (!is_array($decoded)) {
        $errors['res'] = "Error";
        $res = json_encode($errors, true);
        echo $res;
    } else {
        if (isset($decoded["email"])) {
            $first_name = $decoded['firstname'];
            $last_name = $decoded['lastname'];
            //$email = $decoded['email'];
            $country = $decoded['country'];
            $gender = $decoded['gender'];
            if ($_SESSION['type'] === 'user') {
                $query = ("UPDATE users SET first_name = '$first_name', last_name = '$last_name', 
          gendr = '$gender', country = '$country'
          WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            } else if ($_SESSION['type'] === 'doctor') {
                $query = ("UPDATE doctors SET first_name = '$first_name', last_name = '$last_name', 
                gendr = '$gender', country = '$country'
                WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            }
            mysqli_query($db, $query);
            echo '{"res":"done"}';
        } else if (isset($decoded["socialStatusButton"])) {
            $socialStatus = $decoded['socialStatus'];
            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists


                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET social_status = '$socialStatus' 
          WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["currentMedicationsButton"])) {
            $currentMedications = $decoded['currentMedications'];
            $currentMedicationsAddInfo = $decoded['currentMedicationsAddInfo'];

            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists
                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET Medicines = '$currentMedications' ,Medicines_info ='$currentMedicationsAddInfo'
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else  if (isset($decoded["generalMedicalInfoButton"])) {
            $tall = $decoded['length'];
            $weight = $decoded['weight'];
            $bood_type = $decoded['booodType'];
            $smooking = $decoded['smoking'];
            $Alcohol = $decoded['alcohol'];
            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists


                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET tall = '$tall', weight = '$weight', bood_type = '$bood_type',
         smooking = '$smooking', Alcohol = '$Alcohol'
          WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else  if (isset($decoded["familyChronicDiseasesButton"])) {
            $familyChronicDiseases = $decoded['familyChronicDiseases'];
            $relativeRelationInput = $decoded['relativeRelationInput'];

            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists


                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET family_history = '$familyChronicDiseases' ,
            relative_relation = '$relativeRelationInput'
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["yourChronicDiseasesButton"])) {
            $ChronicDiseases = $decoded['ChronicDiseases'];
            $ChronicDiseasesInfo = $decoded['ChronicDiseasesInfo'];

            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists


                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET Chronic_diseases = '$ChronicDiseases' ,Chronic_diseases_info ='$ChronicDiseasesInfo'
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["allergyButton"])) {
            $allergy = $decoded['allergy'];
            $allergyAddInfo = $decoded['allergyAddInfo'];

            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists


                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET allergy = '$allergy' ,allergy_info ='$allergyAddInfo'
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["passwordButton"])) {
            $oldPassword = md5($decoded['oldPassword']);
            $newPassword = md5($decoded['newPassword']);
            //check old password
            if ($_SESSION['type'] === 'user') {
                $password_check_query = "SELECT * FROM users WHERE  user_id = '$_SESSION[id]' AND  password='$oldPassword' LIMIT 1";
            } else if ($_SESSION['type'] === 'doctor') {
                $password_check_query = "SELECT * FROM doctors WHERE  doctor_id = '$_SESSION[id]' AND  password='$oldPassword' LIMIT 1";
            }
            $result1 = mysqli_query($db, $password_check_query);
            $password = mysqli_fetch_assoc($result1);
            if ($password) { // updated password
                if ($_SESSION['type'] === 'user') {
                    $query = ("UPDATE users SET password = '$newPassword' 
                    WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
                } else if ($_SESSION['type'] === 'doctor') {
                    $query = ("UPDATE doctors SET password = '$newPassword' 
                    WHERE doctor_id = '$_SESSION[id]'") or die(mysqli_connect_error());
                }
                mysqli_query($db, $query);
                echo '{"res":"updated"}';
            } else {
                echo '{"res":"Wrong password"}';
            }
        } else if (isset($decoded["medicalReocrd"])) {
            if ($_SESSION['type'] === "user") {
                $query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
                $result = mysqli_query($db, $query);
                $medicalReocrd = mysqli_fetch_assoc($result);
                $medicalReocrd["res"] = "done";
                echo json_encode($medicalReocrd);
            }
        } else if (isset($decoded["userInfo"])) {
            if ($_SESSION['type'] === "user") {
                $query = "SELECT * FROM users WHERE  user_id='$_SESSION[id]' LIMIT 1";
                $result = mysqli_query($db, $query);
                $user_info = mysqli_fetch_assoc($result);
                $user_info["res"] = "done";
                echo json_encode($user_info);
            } else {
                $query = "SELECT * FROM doctors WHERE  doctor_id='$_SESSION[id]' LIMIT 1";
                $result = mysqli_query($db, $query);
                $doctor_info = mysqli_fetch_assoc($result);
                $doctor_info["res"] = "done";
                echo json_encode($doctor_info);
            }
        } else if (isset($decoded["dontCurrentMedicationsButton"])) {
            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists
                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET Medicines = 'None' ,Medicines_info =''
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else  if (isset($decoded["dontFamilyChronicDiseasesButton"])) {
            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists
                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET family_history = 'None' ,
            relative_relation = '$relativeRelationInput'
              WHERE lauser_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["dontYourChronicDiseasesButton"])) {
            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists
                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET Chronic_diseases = 'None' ,Chronic_diseases_info =''
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["dontAllergyButton"])) {
            $user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if (!$user) { // if user not  exists
                $query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
                mysqli_query($db, $query);
            }

            // Finally, register user if there are no errors in the form

            $query = ("UPDATE medical_record SET allergy = 'None' ,allergy_info =''
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"updated"}';
        } else if (isset($decoded["medicalLabsButton"])) {
            $centerName = $decoded['centerName'];
            $testResult = $decoded['testResult'];
            $surgeryName = $decoded['surgeryName'];
            $testResultDate = $decoded['testResultDate'];
            $testResultDate = date('Y-m-d', strtotime($testResultDate));

            $query = ("UPDATE medical_record SET ml_surgery_name = '$surgeryName', ml_center_name = '$centerName', 
      ml_test_result = '$testResult',ml_test_result_date= '$testResultDate'
      WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"done"}';
            ///
        } else if (isset($decoded["dontMedicalLabsButton"])) {
            $query = ("UPDATE medical_record SET ml_surgery_name = 'None', ml_center_name = 'None', 
  ml_test_result = 'None', ml_test_result_date= 'None'
  WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"done"}';
            ///

        } else if (isset($decoded["remedialProcedureButton"])) {
            $rpsurgeryName = $decoded['rpsurgeryName'];
            $hospitalName = $decoded['hospitalName'];
            $doctorName = $decoded['doctorName'];
            $surgeryDate = $decoded['surgeryDate'];
            $surgeryDate = date('Y-m-d', strtotime($surgeryDate));
            $query = ("UPDATE medical_record SET rp_surgery_name = '$rpsurgeryName', rp_hospital_name = '$hospitalName', 
      rp_doctor_name = '$doctorName',rp_surgery_date= '$surgeryDate'
      WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"done"}';
        } else if (isset($decoded["dontRemedialProcedureButton"])) {
            $query = ("UPDATE medical_record SET rp_surgery_name = 'None', rp_hospital_name = 'None', 
      rp_doctor_name = 'None',rp_surgery_date= 'None'
      WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error());
            mysqli_query($db, $query);
            echo '{"res":"done"}';
        } else {
            $res = json_encode($errors, true);
            echo $res;
        }
    }
}
