<?php
session_start();
$connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');

//connect to DB to delete some row using its id

if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM articles WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "deleted";
    header('Location: admin.php');
  }
  else
  {
    $_SESSION['status'] = "Not deleted";
    header('Location: admin.php');
  }
}



if(isset($_POST['deleteadvbtn']))
{
    $id = $_POST['deleteadv_id'];

    $query = "DELETE FROM addadvice WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "deleted";
    header('Location: admin.php');
  }
  else
  {
    $_SESSION['status'] = "Not deleted";
    header('Location: admin.php');
  }
}
?>