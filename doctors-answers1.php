<?php
session_start();

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>the doctors answer</title>
  <!--build:css css/main.css-->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />


  <!--endbuild-->
</head>
<style>
  body {
    font-size: 18px;
  }

  p {
    font-size: 18px;
  }
</style>

<body>

  <div class="container">
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand p-3" href="">
          <img class="" src="" style="width: 100px" alt="MedWeb" />
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a href="index.html" role="button" class="nav-link font-family-Tajawal">Medical policies</a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">Questions and Answers policy</a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">Doctors registration</a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">Connect with us</a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">About Medical</a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">Medical Staff</a>
            </li>
            <li class="nav-item">
              <a href="" role="button" class="nav-link font-family-Tajawal">Doctor</a>
            </li>
          </ul>
          <form class="d-flex ms-auto">
            <div class="input-group">
              <input class="form-control font-family-Tajawal" type="search" placeholder="Search in MedWeb..." aria-label="Search" dir="" />
              <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>

        </div>
      </div>
    </nav>
  </div>
  <!--Navbar End-->
  <br>

  <div class="row">
    <div class="continer-fluid">
      <img style="height:600px;width:100%" src="img/background.jpg">
    </div>
  </div>

  <?php

include('config.php');
  $query = "SELECT * FROM questions,medical_record  WHERE medical_record.user_id=questions.user_id AND answer IS NULL ORDER BY id  DESC";

  $resultm = mysqli_query($link, $query);

  while ($row = mysqli_fetch_assoc($resultm)) {
  ?>

    <!-- Start: 1 Row 3 Columns -->
    <!-- Start: 1 Row 3 Columns -->
    <div class="container">
        <div class="row" style="margin-top: 52px; margin-bottom: 52px; width:80% auto">
				      <p style="color: darkgray; font-size:18px;"> Medical Record</p>
				      <hr style="max-width:600px;">
				      <div style=" margin-bottom:7px;">
				        <svg xmlns="http://www.w3.org/2000/svg" style="color: #24a88e;" width="25" height="25" fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
				        <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
				        </svg> &nbsp;Length &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $row['tall']; ?>cm
            <br>
          </div>


          <div style=" margin-bottom:7px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: #24a88e;" width="25" height="25" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
              <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
            </svg>&nbsp;&nbsp;Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $row['weight']; ?>Kg
            <br>
          </div>


          <div style=" margin-bottom:7px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: #24a88e;" width="25" height="25" fill="currentColor" class="bi bi-droplet" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
              <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
            </svg>&nbsp;&nbsp;Blod Type&nbsp;&nbsp;&nbsp;
            <?php echo $row['bood_type']; ?>
            <br>
          </div>

          <div style=" margin-bottom:7px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:#24a88e;" width="25" height="25" fill="currentColor" class="bi bi-cup-straw" viewBox="0 0 16 16">
              <path d="M13.902.334a.5.5 0 0 1-.28.65l-2.254.902-.4 1.927c.376.095.715.215.972.367.228.135.56.396.56.82 0 .046-.004.09-.011.132l-.962 9.068a1.28 1.28 0 0 1-.524.93c-.488.34-1.494.87-3.01.87-1.516 0-2.522-.53-3.01-.87a1.28 1.28 0 0 1-.524-.93L3.51 5.132A.78.78 0 0 1 3.5 5c0-.424.332-.685.56-.82.262-.154.607-.276.99-.372C5.824 3.614 6.867 3.5 8 3.5c.712 0 1.389.045 1.985.127l.464-2.215a.5.5 0 0 1 .303-.356l2.5-1a.5.5 0 0 1 .65.278zM9.768 4.607A13.991 13.991 0 0 0 8 4.5c-1.076 0-2.033.11-2.707.278A3.284 3.284 0 0 0 4.645 5c.146.073.362.15.648.222C5.967 5.39 6.924 5.5 8 5.5c.571 0 1.109-.03 1.588-.085l.18-.808zm.292 1.756C9.445 6.45 8.742 6.5 8 6.5c-1.133 0-2.176-.114-2.95-.308a5.514 5.514 0 0 1-.435-.127l.838 8.03c.013.121.06.186.102.215.357.249 1.168.69 2.438.69 1.27 0 2.081-.441 2.438-.69.042-.029.09-.094.102-.215l.852-8.03a5.517 5.517 0 0 1-.435.127 8.88 8.88 0 0 1-.89.17zM4.467 4.884s.003.002.005.006l-.005-.006zm7.066 0-.005.006c.002-.004.005-.006.005-.006zM11.354 5a3.174 3.174 0 0 0-.604-.21l-.099.445.055-.013c.286-.072.502-.149.648-.222z" />
            </svg>&nbsp;&nbsp;Alcohol &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $row['Alcohol']; ?>
            <br>
          </div>

          <hr style="max-width:600px;">

          <div style=" margin-bottom:7px;">
            <img class="mr-2" src="img/social-state.svg" />
            &nbsp;&nbsp;Social Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $row['Social_status']; ?>
            <br>
          </div>

          <div style=" margin-bottom:7px;">
            <img src="img/ill-history.svg" />
            &nbsp;&nbsp;Genetic diseases &nbsp;&nbsp;&nbsp;
            <?php echo $row['family_history']; ?> <br>
          </div>
        </div>
      <?php
  
    
  
      ?>
      <div class="col-sm-12 col-lg-5">
     
          <div class="row" style="margin-top: 50px;;margin-right:  5px;margin-left: 5px;">
            <h6 style="font-size:18px; text-align:justify;margin-bottom:20px; "> <?php echo $row['title']; ?></h6>
            <hr>
            <h6 style="font-size:18px; text-align:justify;margin-bottom:20px; "> <?php echo $row['classification']; ?></h6>
            <hr>
            <h6 style="font-size:18px ; text-align:justify;margin-top:20px; margin-bottom:20px; "><?php echo $row['questions']; ?></h6>
            <hr>
            <form id="<?php echo $row['id']; ?>" onsubmit="return getId(this.id)">
              <label for="exampleFormControlTextarea1" class="form-label" style="margin-top: 10px; font-size:18px;">&nbsp; write your answer please</label>
              <textarea class="form-control" style="width: 100%; margin-top: 7px; background-color:rgb(256,256,256);font-size:18px;" id="answer1" name="answer1">
                    </textarea>
              <input class="btn btn-primary border-white" type="submit" name="answer" id="<?php echo $row['id']; ?>" style="margin-top: 10px;margin-bottom: 5px; background-color: #1bac8fbe	;color: rgb(11,11,11);font-size: 18px;">Send Your Answer</input>
              <hr>
            </form>
          </div>
        <?php

  }
  if (isset($_GET['id'])) {

          $answer = $_GET['answer1'];
          $addans = "UPDATE  questions SET answer
        	='$_GET[answer1] ', doctor_id  =' $_SESSION[id]'
            where id ='$_GET[id]';";
          $run = mysqli_query($link, $addans) or die($link->error);;
        }
        ?>

        <script type="text/javascript">
          function myFunction() {
            alert("The form was submitted");
          }
          document.getElementById("more").addEventListener("click", myFunction);

          function getId(clicked_id) {


            var answer1 = document.getElementById("answer1").value;
            var c = document.getElementById(clicked_id).children;


            window.location.href = "doctors-answers.php?id=" + clicked_id + "&answer1=" + c[1].value;
            return false;

          }
        </script>
      </div>


      </div>
    </div>

    <!-- End: 1 Row 3 Columns -->

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>