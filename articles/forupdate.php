<?php
session_start();
$connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');

if (isset($_POST['updatebtn'])) {

    $id = $_POST['edit_id'];
    $page = $_POST['e_page'];
    $type = $_POST['e_type'];
    $date = $_POST['e_date'];
    $image = $_FILES['image']['name'];
    $title = $_POST['e_title'];
    $text = $_POST['e_text'];
    $description = $_POST['e_description'];

    // the data will be updated in DB 

    $query = "UPDATE articles SET page='$page', type='$type', date='$date', image='$image', title='$title', text='$text', description='$description' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../imgs/" . $_FILES["image"]["name"]);
        $_SESSION['success'] = "info updated";
        header('Location: admin.php');
    } else {
        $_SESSION['status'] = "Not updated";
        header('Location: admin.php');
    }
}



if (isset($_POST['updateadvbtn'])) {

    $id = $_POST['editadv_id'];
    $advice = $_POST['e_advice'];
    $advice2 = $_POST['e_advice2'];



    $query = "UPDATE addadvice SET advice='$advice',advice2='$advice2' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "info updated";
        header('Location: admin.php');
    } else {
        $_SESSION['status'] = "Not updated";
        header('Location: admin.php');
    }
}











?>
















}