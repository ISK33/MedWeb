<!DOCTYPE html>
<html dir="ltr">

<head>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">

  <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>question</title>
  <!--build:css css/main.css-->
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
  <link rel="stylesheet" href="../css/main.css" />

  <script>
    if (!sessionStorage.getItem("log")) {
      window.location.href = "../login.html"
    }
  </script>

  <!--endbuild-->
  <style>
    body {
      font-size: 18px;
    }

    p {
      font-size: 18px;
    }

    .classification {
      -webkit-text-size-adjust: 100%;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      line-height: 1.42857143;
      display: inline-block;
      overflow-wrap: break-word;
      box-sizing: border-box;

      background-color: #fff7e9;
      color: #ffad1f;
      font-family: FrutigerLTArabic-55Roman;
    }
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
              <a href="doctors-answers.php" role="button" class="nav-link font-family-Tajawal">Qustions </a>
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
              <button class="bg-light border-0 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color: #4d4d4e">
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

  <div class="row g-0">
    <div class="col-12 bc-bg" style="
          background-image: url(../img/bc.jpg);
          height: 400px;
        ">

    </div>
  </div>
  <!--breakcrump End

  <!--Masseges Start-->


  <div style="margin-top: 10px;margin-right: -47px;margin-left: -48px;padding: 33px; ">
    <div class="container" style="background-color:#d4e2ee;">
      <div class="row border p-3 pb-3">
        <div class="col">
          <p>
            Would you like to answer the questions
            <br>
            <a class="btn btn-primary" type="button" style=" width: 100%;background-color: rgb(146,205,218);color: rgb(7,6,6);margin-top:35px;" href="doctors-answers.php">Answer the questions</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--Masseges End-->
  <!-- php code bring questions from db and show it here-->
  <?php
include('config.php');
  $query = "SELECT * FROM questions ORDER BY id  DESC; ";
  $result = mysqli_query($link, $query);

  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <!--here where we display the quastions and the answers-->
    <div class="container" style="margin-bottom: 10px;">
      <div class="row border p-3 pb-3" style="border-radius: 5px; ">
        <div class="col-md-10 col-lg-12 col-lg-offset-1" style="width:100%;">
          <form action="see-the-question.php" method="POST" style="margin-top: 10px;margin-bottom: 10px;">
            <p>&nbsp;<i class="bi bi-chat-right-text-fill"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color:rgb(146,205,218);" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"></path>
              </svg> &nbsp; <?php echo $row['title']; ?>
            </p><br>
            <p class="classification" style="margin-top: -30px; "><?php echo $row['classification']; ?></p>
            <p style="text-align: justify; width:100%;"> <b>THE QUASTION:</b> <?php echo $row['questions']; ?> </p>
            <p style="text-align: justify; width:100%;"> <b>THE Answer:</b> <?php echo $row['answer']; ?> </p>

          </form>
        </div>
      </div>
    </div>
  <?php
  }
  ?>

  <!--End questions-->
  <!--Footer Start-->
  <div style="
        background-color: #5cb8ba;
        background-image: url('img/footer-bg.png');
      ">
    <div class="container top-footer">
      <div class="row mb-3 pt-4 pb-5">
        <div class="col-sm-6 col-lg-4 mt-5 first-ul">
          <h1>Contact Us</h1>
          <ul class="list-unstyled">
            <li class="mb-4 mt-4">
              <i class="fas fa-envelope"></i>
              <a>info@MedWeb.com</a>
              <a>hello@MedWeb.com</a>
            </li>
            <li class="mb-4">
              <i class="fas fa-mobile-alt"></i>
              <a>Call: +07 554 332 322</a>
              <a>Call: +236 256 256 365</a>
            </li>
            <li class="mb-4">
              <i class="fas fa-map-marker-alt"></i>
              <a>Call: +07 554 332 322</a>
              <a>Call: +236 256 256 365</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-12 col-lg-2 mt-5">
          <h1>Quick Links</h1>
          <ul class="list-unstyled">
            <li class="mb-4 mt-4"><a href="">About us</a></li>
            <li class="mb-4"><a href="">Blog</a></li>
            <li class="mb-4"><a href="">Our Expertise</a></li>
            <li class="mb-4"><a href="">Faq</a></li>
            <li class="mb-4"><a href="">Doctors</a></li>
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

  <div class="row footer">
    <div class="col-12 col-sm-5 text-center text-sm-end">
      <a href="">
        <img class="me-3" alt="facebook share icon" src="../img//facebook-icon.svg">
      </a>
      <a href="">
        <img class="me-3" alt="linkedin share icon" src="../img/linkedin-icon.svg">
      </a>
      <a href="">
        <img class="me-3" alt="twitter share icon" src="../img/twitter-icon.svg">
      </a>
      <a href="">
        <img class="me-3" alt="youtube share icon" src="../img/youtube-icon.svg">
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
        Copyright @2021 Design &amp; Developed by MedWeb
      </p>
    </div>
  </div>


  <!--build:js js/main.js-->
  <!-- <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <!--endbuild-->


</body>

</html>