<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Medical Site</title>
  <link rel="shortcut icon" type="../image/x-icon" href="img/logo.png" />
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />

  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>

  </style>

</head>

<body>

  <div class="container">

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid p-lg-0">
        <a class="navbar-brand" href="../index.php">
          <img class="img-fluid" src="../img/logo.png" alt="MedWeb" />
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="../index.php" role="button" class="nav-link font-family-Tajawal">Home</a>
            </li>
            <li class="nav-item">
              <a href="../questions/see-the-question.php" role="button" class="nav-link font-family-Tajawal">Qustions </a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">Pages</a>
            </li>
            <li class="nav-item">
              <a href="../index.php" role="button" class="nav-link font-family-Tajawal">Articles</a>
            </li>

          </ul>
          <form class="d-flex ms-auto">

            <div class="dropdown d-profile">
              <button class="bg-light border-0 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false" style="color: #4d4d4e">
                <img id="profile-icon" src="../img/profile-icon.png" />
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item" href="../profile.html">My profile</a>
                </li>
                <li><a class="dropdown-item" href="#">My appointments</a></li>
                <li>
                  <a id="logout" class="dropdown-item" href="#">logout</a>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </nav>
  </div>
  <!--Navbar End-->
  <!--breakcrump Start-->

  <!--breakcrump Start-->

  <div class="row g-0">
    <div class="col-12 bc-bg" style="
      background-image: url(img/bc.jpg);
      height: 400px;
    ">
      <h6 class="text-center" style="margin-top:60px;font-size:50px;font-family: sans-serif;font-style:italic;color:#8abdb6"> MedWeb's Articles & News</h6></br></br>

    </div>
  </div>

  <?php
include('config.php');
  $id = $_GET['id']; // increase the view 1 when we visit this article's page
  $query = "UPDATE articles SET views= views + 1 WHERE id='$id'";
  $query_run = mysqli_query($link, $query);

  if ($query_run) {
    $_SESSION['success'] = "info updated";
  } else {
    $_SESSION['status'] = "Not updated";
  }
  ?>

  </br></br>
  <div class="container">
    <div class="row">

      </br>
      <?php


      $id = $_GET['id'];


      $query = "SELECT * FROM articles WHERE id='$id'";
      $query_run = mysqli_query($link, $query);


      ?>
      <!-- return the article using its id from DB and show it-->
      <div style="border:0.1px solid #d6d8da;border-radius: 5px;" class="col-lg-8"></br></br>

        <?php
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
        ?>

            <p style="font-size:30px"><?php echo $row['title']; ?></p></br></br>

            <?php echo '<img src="imgs/' . $row['image'] . '" width="100%;" height="300px;">' ?></br></br>

            <p><?php echo $row['description']; ?></p>





        <?php
          }
        } else {
          echo "NO RECORDS";
        }
        ?>

      </div>





      <?php
      $query = "SELECT * FROM addadvice";
      $query_run = mysqli_query($link, $query);
      ?>
      <div class="col-lg-4">

        <?php
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {

        ?>
            <!-- return advices from addadvice table -->
            <div style="background-color:#18a8aa" class="jumbotron">
              <h6 style="font-size:10px;color:#fff;margin-top:-50px" class="display-4">Ramadan Tips</h6>
              <p style="font-size:15px;color:#fff" class="lead"><?php echo $row['advice']; ?></p>
            </div>
        <?php

          }
        } else {
          echo "NO RECORDS";
        }
        ?>

      </div>

























































    </div>
  </div></br></br></br>
 
  <!--Footer Start-->
  <div style="
            background-color: #5CB8BA;
            background-image: url('img/footer-bg.png');
           
        ">
    <div class="container top-footer">
      <div class="row mb-3 pt-4 pb-5">
        <div class="col-sm-6 col-lg-4 mt-5 first-ul">
          <h1>Contact Us</h1>
          <ul class="list-unstyled">
            <li class="mb-4 mt-4">

              <i class="fas fa-envelope"></i>
              <a>skndaratiah@gmail.com</a>
             
            </li>

          </ul>
        </div>
        <div class="col-sm-12 col-lg-2 mt-5">
          <h1>ًWeb Devlopers</h1>
          <ul class="list-unstyled">

            <li class="mb-4"><a href="">Iskandar Atieh</a></li>

          </ul>
        </div>
        <div class="col-sm-12 col-lg-3 mt-5">
          <h1>Our Services</h1>
          <ul class="list-unstyled">
            <li class="mb-4 mt-4"><a href="">Dental Care</a></li>
            <li class="mb-4"><a href="">Cardiology</a></li>
            <li class="mb-4"><a href="">Hijama Therapy</a></li>
            <li class="mb-4"><a href="">Massage Therapy</a></li>
            <li class="mb-4"><a href="">Ambluance Sevices</a></li>
            <li class="mb-4"><a href="">Medicine</a></li>

          </ul>
        </div>

        <div class="col-sm-6 col-lg-3 mt-5 feedback-form">
          <h1 class="mb-4">Feedback</h1>
          <input type="text" class="" placeholder="Name">
          <input type="text" class="" placeholder="Phone">
          <textarea placeholder="Message"></textarea>
          <button class="btn submit-button">Submit</button>

        </div>


      </div>
    </div>
  </div>

  <div class="row g-0 footer">
    <div class="col-12 col-sm-5 text-center text-sm-end">
      <a href="">
        <img class="me-3" alt="facebook share icon" src="img//facebook-icon.svg" />
      </a>
      <a href="">
        <img class="me-3" alt="linkedin share icon" src="img/linkedin-icon.svg" />
      </a>
      <a href="">
        <img class="me-3" alt="twitter share icon" src="img/twitter-icon.svg" />
      </a>
      <a href="">
        <img class="me-3" alt="youtube share icon" src="img/youtube-icon.svg" />
      </a>
    </div>
    <div class="col-12 col-sm-7">
      <p class="mb-2 mb-sm-0 text-center text-sm-start">
        All medical information on the website aims to increase health
        awareness
      </p>
    </div>
    <div class="row">
      <p class="text-sm-end mt-3" style="text-align: center !important">
        Copyright @2021 Design & Developed by MedWeb
      </p>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>