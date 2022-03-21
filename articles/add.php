<?php
session_start();

//connect to the database medweb and add the info to articles table
$connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');
if (isset($_POST['saveinfo'])) {
    $page = $_POST['page'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $image = $_FILES['image']['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $description = $_POST['description'];




    if (file_exists("imgs/" . $_FILES["image"]["name"])) {

        $store = $_FILES["image"]["name"];
        $_SESSION['status'] = "image already exsits '.$store.'";
        header('Location: admin.php');
    } else {



        $query = "INSERT INTO articles (page,type,date,image,title,text,description) VALUES ('$page','$type','$date','$image','$title','$text','$description')";
        $query_run = mysqli_query($connection, $query);


        if ($query_run) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../imgs/" . $_FILES["image"]["name"]);
            $_SESSION['success'] = "info added";
            header('Location: admin.php');
        } else {
            $_SESSION['status'] = "info Not added";
            header('Location: admin.php');
        }
    }
}

//add advices to addadvice table 
if (isset($_POST['saveadvice'])) {
    $advice = $_POST['advice'];
    $advice2 = $_POST['advice2'];




    $query = "INSERT INTO addadvice (advice,advice2) VALUES ('$advice','$advice2')";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {

        $_SESSION['success'] = "info added";
        header('Location: admin.php');
    } else {
        $_SESSION['status'] = "info Not added";
        header('Location: admin.php');
    }
}






?>