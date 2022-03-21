<?php
include 'con_config.php';
header('Content-Type:application/json');
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType === "application/json") {
    $content = file_get_contents("php://input");
    $decoded = json_decode($content, true);
    if (!is_array($decoded)) {
        echo $res = '{"res":"error"}';
    } else {


        if (empty($decoded['firstname']) || empty($decoded['lastname']) || empty($decoded['email']) || empty($decoded['password']) || empty($decoded['date']) || empty($decoded['tel']) || empty($decoded['spec']) || empty($decoded['conditions'])) {
            $errors['res'] = "firstname & lastname & email & password & & date & telephone & Major & accept privacy are required";
            $res = json_encode($errors, true);
            echo $res;
        } else {
            $first_name = $decoded['firstname'];
            $last_name = $decoded['lastname'];
            $email = $decoded['email'];
            $password = md5($decoded['password']); //encrypt the password before saving in the database
            $date = $decoded['date'];
            $phone = $decoded['tel'];
            $spec = $decoded['spec'];

 date_default_timezone_set('Asia/Damascus');
$current_date=date("Y-m-d h:i");

            // first check the database to make sure
            // a user does not already exist with the same username and/or email
            $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            $doctor_check_query = "SELECT * FROM doctors WHERE  email='$email' LIMIT 1";
            $result1 = mysqli_query($db, $doctor_check_query);
            $doctor = mysqli_fetch_assoc($result1);
            if ($user) { // if user exists


                if ($user['email'] === $email) {
                    $errors['email'] = "email already exists as user";
                }
            }
            if ($doctor) { // if user exists


                if ($doctor['email'] === $email) {
                    $errors['email'] = "email already exists";
                }
            }
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {



                $query = "INSERT INTO doctors (first_name,last_name,email,password,major,phone,birth_date,created )
VALUES('$first_name','$last_name','$email','$password', '$spec','$phone','$date','$current_date')";
                mysqli_query($db, $query);
                echo '{"res":"done"}';

                $_SESSION['first_name'] = $first_name;
                $_SESSION['success'] = "You are now logged in";
            } else {
                $res = json_encode($errors, true);
                echo $res;
            }
        }
    }
}
