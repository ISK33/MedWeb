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



        if ($decoded['imageProfileDisplay']) {
            if ($_SESSION['type'] === 'user') {
                $image = "SELECT photo FROM users WHERE  user_id=$_SESSION[id]";
                $result = mysqli_query($db, $image);
                $imageURL = mysqli_fetch_assoc($result);
                $result = array(
                    "res" => "done",
                    "imageURL" => $imageURL
                );
                echo json_encode($result);
            } else {
                $image = "SELECT photo FROM doctors WHERE  doctor_id='$_SESSION[id]'";
                $result = mysqli_query($db, $image);
                $imageURL = mysqli_fetch_assoc($result);
                $result = array(
                    "res" => "done",
                    "imageURL" => $imageURL
                );
                echo json_encode($result);
            }
        }
    }
}
