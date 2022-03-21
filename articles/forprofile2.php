<?php
session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">

  <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Log In</title>
  <!--build:css css/main.css-->
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
  <link rel="stylesheet" href="../css/main.css" />

 

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    .carousel-text {
      position: relative;
      height: 150px;
      top: 8px;
      width: 400px;
      left: -150px;
      background-color: #22222296;
      padding: 7px 25px;
      border-radius: 20px;
      font-size: 12px;
    }

    a:hover,
    a:active,
    a:focus {
      text-decoration: none;
    }

    .jumbotron {

      background-image: url('img/ramadan.jpg');
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
              <a href="../questions/see-the-question.php" role="button" class="nav-link font-family-Tajawal">Questions and Answers</a>
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

  <div class="row g-0">
    <div class="col-12 bc-bg" style="
      background-image: url(img/bc.jpg);
      height: 400px;
    ">
      <h6 class="text-center" style="margin-top:60px;font-size:50px;font-family: sans-serif;font-style:italic;color:#8abdb6"> MedWeb's Articles & News</h6></br></br>

    </div>
  </div>

  <div class="container bg-white">

  </br></br>
  <div class="row">
    <?php
   include('config.php');

    //connect to DB to select all the articles Descending Order by the number of views and return 7 rows in every page
    $query = "SELECT * FROM articles ORDER BY views DESC LIMIT 7 OFFSET 7";
    $query_run = mysqli_query($link, $query);
    ?>
    <div class="col-lg-8 text-center">

      <?php
      if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
      ?>

          <!-- show the articles in cards -->

          <div class="card mb-3" style="max-width: 900px;height:300px">
            <div class="row no-gutters">
              <div class="col-md-6">
                <!-- retun the image of the article-->
                <?php echo '<img src="imgs/' . $row['image'] . '" width="400px !important;" height="260px;" class="card-img">' ?>

                <svg style="margin-left:40px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                  <path d="M8 6.236l-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                </svg>
                &nbsp;&nbsp;&nbsp;
                <svg style="margin-left:40px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                  <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                </svg><!-- retun number of views of the article-->
                <span style="margin-left:40px;background-color: #ea1161;border-radius: 2px;color:#fff"><?php echo $row['views']; ?>&nbsp;views</span>
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <!-- retun the type of this article of the article-->
                  <p style="color:#17a2b8" class="card-title">&nbsp;&nbsp;&nbsp;<?php echo $row['type']; ?></p>
                  <h5 style="color:#17a2b8" class="card-title"><?php echo $row['title']; ?></h5>
                  <p class="card-text"><?php echo $row['text']; ?></p><!-- retun the date of publish-->
                  <p class="card-text"><small class="text-muted"><?php echo $row['date']; ?></small></p>
                </div>
                <form action="fordisc.php" method="post">
                  <input type="hidden" name="more_id" class="the_id" value="<?php echo $row['id']; ?>">
                  <button type="button" name="morebtn" id="<?php echo $row['id']; ?>" onclick="getId(this.id)" class="btn btn-info"> MORE</button>
                </form><!-- when we click this button it will implement a function which is defined in javascript -->
              </div>
            </div>
          </div>

      <?php

        }
      } else {
        echo "NO RECORDS";
      }
      ?>



      <!--JS code to implement a function to transfer this article id to the next page and return the info by it-->
      <script type="text/javascript">
        document.getElementById("more").addEventListener("click", myFunction);

        function getId(clicked_id) {
          window.location.href = "fordisc.php?id=" + clicked_id;

        }
      </script>














    </div>
    <div style="margin-top:70px;width:400px" class="col-lg-3">


      <div style="width:400px" class="jumbotron">
        <h6 style="font-size:35px;color:#fff" class="display-4">Ramadan kareem</h6>
        <p style="font-size:20px;color:#fff" class="lead">Program to gain weight in Ramadan</p>

        <a style="margin-top:30px;width:300px" class="btn btn-info btn-lg" href="for slide1.php" role="button">Learn more</a>
      </div>










      <!-- show some Thoughts in illnesses, ramadan advices, health....-->



      <div style="width:400px;margin-top:120px" class="list-group text-center" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">4D ultrasound for the fetus</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Causes of alopecia in children</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Use drawing to fight anxiety and stress</a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Benefits of vitamin B3 for nerves</a>
      </div>

      <div>
        <div style="width:400px;margin-top:40px" class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">3D and 4D ultrasound are just as safe on the fetus as 2D scans, because the images are made up of sections of 2D images that have been converted into an image. However, experts do not recommend a 3D or 4D scan only to obtain a souvenir image or recording, as this means exposing more to ultrasound than is medically necessary.
            </br></br>
            And some special ultrasound can last from 45 minutes to an hour, which may be longer than the recommended safety limits. Therefore, a quadruple ultrasound should be avoided for a long time, as it ends immediately after reassurance on all parts of the fetus’s body.
            </br></br>
            Likewise, any type of ultrasound examination should only be performed by a specialist who can perform it correctly and follow the right steps, and he should be aware of the information that needs to be disclosed.</div>


          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">The cause of alopecia areata is not known yet, but scientists link alopecia to a defect in the child's immune system, where immune T cells attack hair follicles by mistake, causing hair to fall directly off the surface of the skin.
            </br></br>
            Other studies link alopecia to the child's psychological state, as depression and anxiety cause hair loss and alopecia in children.
            </br></br>
            Alopecia is considered one of the disorders of hair loss that includes a wide range of diseases with different clinical signs, and it is important to distinguish between alopecia and other diseases to ensure appropriate treatment in a timely manner, as alopecia may cause low self-esteem in the child, which leads to the child with depression And social isolation.
            </br></br>
            Infants sometimes suffer from the appearance of bald spots on the scalp since birth or shortly after birth, and in most cases these spots form at the back of the head or on the sides, where alopecia in children in this case is considered normal, given the long time the infant spends in sleep .
            </br></br>
            And after the child grows and develops his ability to sit, permanent hair will begin to grow naturally.</div>


          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">All people draw or scribble during stressful moments, perhaps while on a worrying phone call, or waiting for an important date. Although people don't realize it, they do use a simple form of Art Therapy.
            </br></br>
            The term art therapy refers to any use of art for a therapeutic purpose, including the relief of anxiety (Anxiety). The theory behind art therapy suggests that drawing, coloring, and sculpting can help people control their negative emotions, or express painful or difficult emotions that they may find difficult to express with words.</div>



          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">The reference studies have praised many of the benefits of vitamin B complex for nerves, especially associated with vitamin B3. Vitamin B3 is known by the scientific name niacin, and is derived from two compounds, nicotinamide and nicotinic acid, each of which plays a vital role in the central nervous system.
            </br></br>
            Nicotinamide speeds up the process of neurogenesis and differentiation in embryos, as well as preserves the life and health of these cells in a person’s life, by preventing stress reactions that put pressure on cells and cause their destruction.
            </br></br>
            Moreover, various studies and studies in mice have demonstrated a relationship between neurodegenerative diseases and brain death, and between vitamin B3 deficiency.
            </br></br>
            Likewise, it has been found that getting the body's need from vitamin B3 helps prevent Alzheimer's. However, research is ongoing to prove the role of vitamin B3 in reversing neurodegeneration in Alzheimer's, Parkinson's disease, and Huntington's disease.</div>
        </div>
      </div>


    </div>
  </div>
  </div>





  <!--silde show-->
  <!-- show some articles about different objects-->

  <div style="margin-top:20px" class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img style="height:400px" src="img/page1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="carousel-text">
              <a href="for slide1.php">
                <h5 style="color:#17a2b8;font-size:17px">Program to gain weight in Ramadan</h5>
              </a>
              <p style="font-size:15px">It is customary to take advantage of Ramadan fasting to lose weight, just as it is assumed in normal circumstances that the weight of the person ...</p>

            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img style="height:450px" src="img/page2n.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="carousel-text">
              <a href="forslide2.php">
                <h5 style="color:#17a2b8;font-size:17px">Early and advanced symptoms of multiple sclerosis</h5>
              </a>
              <p style="font-size:15px"> The symptoms of multiple sclerosis cannot be predicted for every individual, as they may differ from one...</p>

            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img style="height:450px" src="img/page3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="carousel-text">
              <a href="forslide3.php">
                <h5 style="color:#17a2b8;font-size:17px">Misconceptions and diseases misdiagnosed as autism</h5>
              </a>
              <p style="font-size:15px">Autism (in English: Autism) is a complex developmental disorder that affects a person's ability to interact... </p>

            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img style="height:400px" src="../img/page4.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="carousel-text">
              <a href="forslide4.php">
                <h5 style="color:#17a2b8;font-size:17px">Symptoms of severe vitamin D deficiency in women</h5>
              </a>
              <p style="font-size:15px">Women suffer from vitamin D deficiency more than men for many reasons, and vitamin D, or as some call...</p>

            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img style="height:400px" src="img/page5.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="carousel-text">
              <a href="forslide5.php">
                <h5 style="color:#17a2b8;font-size:17px">Syringe Tab Block‌ After‌ ‌ Childbirth‌ Caesarean section</h5>
              </a>
              <p style="font-size:15px">The first days after childbirth are among the most memorable days in a mother's life, but the matter may be reversed due to....</p>

            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>













  </div>
  </br></br></br>


  <!-- to tranfer between website pages-->
  <nav style="margin-left:80px" dir="ltr" aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="../index.php">1</a></li>
      <li class="page-item"><a class="page-link" href="forprofile2.php">2</a></li>
      <li class="page-item"><a class="page-link" href="forprofile3.php">3</a></li>
      <li class="page-item"><a class="page-link" href="forprofile4.php">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  </br></br></br>







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
       
            <li class="mb-4"><a href="">Iskandar  Atieh</a></li>

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