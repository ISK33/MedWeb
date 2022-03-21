<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Site</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid p-lg-0">
            <a class="navbar-brand" href="">
                <img class="img-fluid" src="img/logo.png" alt="MedWeb" />
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" role="button" class="nav-link font-family-Tajawal">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="questions/see-the-question.php" role="button" class="nav-link font-family-Tajawal">Questions and Answers</a>
                    </li>
                    <li class="nav-item">
                        <a href="" role="button" class="nav-link font-family-Tajawal">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a href="" role="button" class="nav-link font-family-Tajawal">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="" role="button" class="nav-link font-family-Tajawal">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a href="" role="button" class="nav-link font-family-Tajawal">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a href="" role="button" class="nav-link font-family-Tajawal">Contact</a>
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
                <div id="loginElement"></div>
                <script>
                    var loginElement = document.getElementById('loginElement');
                    //check if user has logged in to display user image and other options  
                    if (sessionStorage.getItem('log')) {
                        loginElement.innerHTML =
                            '<div id="userLogedIn" class="dropdown d-profile">' +
                            '<button class="bg-light border-0 btn btn-secondary dropdown-toggle" ' +
                            'type="button" id="dropdownMenuButton1" ' +
                            'data-bs-toggle="dropdown" ' +
                            'aria-expanded="false" ' +
                            'style="color: #4d4d4e">' +
                            '<img id="profile-icon" src="img/profile-icon.png" />' +
                            '</button>' +
                            '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">' +
                            '<li>' +
                            '<a id="profileLink" class="dropdown-item" href="">My profile</a>' +
                            '</li>' +
                            '<li><a class="dropdown-item" href="#">My appointments</a></li>' +
                            '<li>' +
                            '<a id="logout" class="dropdown-item" href="#">logout</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>';

                    } else {
                        //if user hasn't logged in route him login page 
                        loginElement.innerHTML = '<a href="login.html" style="background-color:#39ACBC; border-color:#39ACBC; margin-left:10px" class="btn btn-primary">Log In</a>';
                    }
                </script>
            </div>
        </div>
    </nav>
    </div>
    <!--Navbar End-->
    <?php
    session_start();
    ?>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">



            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
            </div>


            <div class="card-body">
                <?php
                //connect to DB to update the data in articles table using id 
                $connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');
                if (isset($_POST['edit_btn'])) {
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM articles WHERE id='$id'";
                    $query_run = mysqli_query($connection, $query);
                    foreach ($query_run as $row) {
                ?>

                        <form action="forupdate.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label>Page</label>
                                <input type="number" name="e_page" value="<?php echo $row['page'] ?>" class="form-control" placeholder="Enter number of Page">
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="e_type" value="<?php echo $row['type'] ?>" class="form-control" placeholder="Enter type">
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="e_date" value="<?php echo $row['date'] ?>" class="form-control" placeholder="Enter Date">
                            </div>


                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" value="<?php echo $row['image'] ?>" id="image" class="form-control" placeholder="Enter your Image">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="e_title" value="<?php echo $row['title'] ?>" class="form-control" placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" name="e_text" value="<?php echo $row['text'] ?>" class="form-control" placeholder="Enter Text">
                            </div>

                            <!--for disc-->
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="e_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Description">
                            </div>





                            <!--end disc-->




                            <!-- when we click this button we move to forupdate.php to update the data in DB-->
                            <a href="admin.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                        </form>


                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>



    <!------->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">



            <div class="card-header py-3">
                <!-- to update advices in addadvice table-->
                <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Advices </h6>
            </div>


            <div class="card-body">
                <?php
                $connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');
                if (isset($_POST['editadv_btn'])) {
                    $id = $_POST['editadv_id'];
                    $query = "SELECT * FROM addadvice WHERE id='$id'";
                    $query_run = mysqli_query($connection, $query);
                    foreach ($query_run as $row) {
                ?>

                        <form action="forupdate.php" method="POST">

                            <input type="hidden" name="editadv_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label>Advice</label>
                                <input type="text" name="e_advice" value="<?php echo $row['advice'] ?>" class="form-control" placeholder="Enter your adive">
                            </div>

                            <div class="form-group">
                                <label>Advice2</label>
                                <input type="text" name="e_advice2" value="<?php echo $row['advice2'] ?>" class="form-control" placeholder="Enter your adive2">
                            </div>



                            <a href="admin.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updateadvbtn" class="btn btn-primary">Update</button>
                        </form>


                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>










    <script src="js/index.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>