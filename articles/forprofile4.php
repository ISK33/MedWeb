<?php
session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Medical Site</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />

  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="./css/bootstrap.min.css">
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
            <div class="input-group">
             
            </div>
          </form>
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
    </nav>
  </div>
  <!--Navbar End-->

  <!--breakcrump Start-->

  <div class="row">
    <?php
    $connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');
    //connect to DB to select all the articles Descending Order by the number of views and return 7 rows in every page
    $query = "SELECT * FROM articles ORDER BY views DESC LIMIT 7 OFFSET 14";
    $query_run = mysqli_query($connection, $query);
    ?>
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
    $query = "SELECT * FROM articles ORDER BY views DESC LIMIT 7 OFFSET 21";
    $query_run = mysqli_query($connection, $link);
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
                  <p class="card-text"><?php echo $row['text']; ?></p>
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
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Early ultrasound diagnosis of thyroid cancer</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Facial acne medication</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Learn ways to prevent Alzheimer's</a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">How the ketogenic diet works to slow down the growth of cancer cells</a>
      </div>

      <div>
        <div style="width:400px;margin-top:40px" class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">An ultrasound scan is the best way to obtain an image and detailed information about the thyroid gland, as an early ultrasound of thyroid cancer diagnoses the following:
            </br></br>
            The size of any lump or swelling, and showing whether it is solid or fluid-filled, and it is most likely that the solid nodes are cancerous tumors.</br></br>
            Show whether the nodule has any characteristics of a cancerous mass or it is a benign lump.</br></br>
            Disclosure of the number and size of nodes.</br></br>
            Ultrasound imaging often makes it easier to biopsy these masses and take a sample to examine the tissue.</br></br>
            In addition, the use of ultrasound imaging contributes to early detection of the presence of tumors, which facilitates treatment. In the past, doctors used to treat thyroid cancer with total thyroidectomy. But with ultrasound, it helped to reveal the affected part of the gland and make a partial excision of the gland, not a total excision.</br></br>

            It is worth noting that within the ultrasound examination, the neck is examined in detail to look for any abnormalities in the lymph nodes, which are more common in the case of thyroid cancer.</div>


          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">There are many types of medicines and antibiotics that can be used to treat facial pills, and it is recommended to start them after consulting a doctor in cases of treating painful and inflamed red facial pimples.
            </br></br>
            Medicines are also used in treating severe cases of facial acne, such as treating large pimples on the face, or treating pimples under the skin, which can appear in other parts of the body, such as the neck and back.</br></br>

            Pharmaceutical options for treating facial acne include:
            </br></br>
            Topical or oral antibiotics, such as clindamycin, erythromycin, or doxycycline.</br></br>
            Retinoid creams with vitamin A, such as tretinoin and adapalene.</br></br>
            Azelaic acid.</br></br>
            Isotretinoin after consulting a doctor because it may cause dangerous side effects.</br></br>
            Medical face scrubs.</div>


          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Much of the fear prevails among the elderly about developing Alzheimer's or dementia, especially if there is a family history.
            </br></br>
            There are two types of Alzheimer's disease: early and late Alzheimer's. Late Alzheimer's is characterized by the onset of symptoms after the age of 60, and it is the most common type of Alzheimer's. While early Alzheimer's symptoms appear between the ages of thirty and sixty, which is a rare type of Alzheimer's.
            </br></br>
            Indeed, many changes occur in the brain several years before the first symptoms of Alzheimer's disease appear, and knowing these changes and limiting them may prevent or delay memory loss and dementia.
            </br></br>
            Although no conclusive evidence has been established for preventing early and late Alzheimer's, scientists have identified a number of strategies that may help prevent Alzheimer's in the elderly. Some are based on taking medications to treat Alzheimer's and its early symptoms, and others are based on following a certain lifestyle.
            </br></br>
            In this article, we will answer the question: How do I protect myself from Alzheimer's? Where we will address the most important symptoms of the onset of Alzheimer's disease, nutritional prevention of Alzheimer's disease, and the most important exercises for preventing Alzheimer's.</div>



          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">There are many theories that support the role of the keto diet in slowing cancer cells, the most important of which are:
            </br></br>
            Cancer cells feed on sugar; They grow and connect with each other by breaking down glucose (a simple sugar), which is a form of carbohydrate. Following the ketogenic diet leads to depriving these cells of nutrition due to their inability to use ketones as food.</br></br>
            Cancer develops and resists treatment as a result of multiple mutations in the cell, in which there is either a genetic predisposition to the occurrence of that mutation, or it can be acquired by oxidative stress that produces unstable free radicals. Eating a diet rich in antioxidants, such as the keto diet, restricts these harmful free radicals and increases the antioxidant capacity to protect the body.</br></br>
            On the other hand, depriving the body of fruits and vegetables, which are also rich in antioxidants, can nullify this effect.</div>
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
  <script src="../js/index.js"></script>




  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>