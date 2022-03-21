<?php
include 'con_config.php';
require_once('recaptchalib.php');

// LOGIN USER
$publickey = "6LdxaLwaAAAAANb93yCoRBipwlUa4EJ809F3eP0C";
header('Content-Type:application/json');
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType === "application/json") {
    $content = file_get_contents("php://input");
    $decoded = json_decode($content, true);
    if (!is_array($decoded)) {
        echo $res = '{"res":"error"}';
    } else {



        if (empty($decoded['email']) || empty($decoded['password'])) {
            $errors['res'] = "please input your email & password";
            $res = json_encode($errors, true);
            echo $res;
        } else {

            $email1 = $decoded['email'];
            $password1 = md5($decoded['password']);

            $user_check_query = "SELECT * FROM users WHERE  email='$email1' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            $doctor_check_query = "SELECT * FROM doctors WHERE  email='$email1' LIMIT 1";
            $result = mysqli_query($db, $doctor_check_query);
            $doctor = mysqli_fetch_assoc($result);


            if ($user) { // if user exists

                $check_user = "SELECT * FROM users WHERE email='$email1' AND password='$password1'";

                $results = mysqli_query($db, $check_user);

                if (mysqli_num_rows($results) == 1) {
                    $_SESSION['id'] = $user['user_id'];
                    $_SESSION['email'] = $email1;
                    $_SESSION['success'] = "You are now logged in";
                    $_SESSION['type'] = "user";

                    echo '{"res":"user"}';
                } else {
                    $errors['res'] = "Wrong email/password combination";
                    $res = json_encode($errors, true);
                    echo $res;
                }
            } else if ($doctor) { // if doctor exists
                $check_doctor = "SELECT * FROM doctors WHERE email='$email1' AND password='$password1'";
                $results = mysqli_query($db, $check_doctor);

                if (mysqli_num_rows($results) == 1) {
                    $_SESSION['id'] = $doctor['doctor_id'];
                    $_SESSION['email'] = $email1;
                    $_SESSION['type'] = "doctor";

                    $_SESSION['success'] = "You are now logged in";
                    echo '{"res":"doctor"}';
                } else {
                    $errors['res'] = "Wrong email/password combination ";
                    $res = json_encode($errors, true);
                    echo $res;
                }
            } else {
                $errors['res'] = "Your email is not exist";
                $res = json_encode($errors, true);
                echo $res;
            }
        }
    }
}

    

//echo json_encode(array("status" => $res));