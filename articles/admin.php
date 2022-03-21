<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    td {

      max-width: 100px;
      max-height: 100px;
      box-sizing: border-box;

      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
  </style>
  <title>Medical Site</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <!-- admin panel to add all the information to the database and show it in the tables in admin's panel-->
  <div class="container-fluid">
    <div row="col-lg-12">
      <h1 style="margin-top:30px" class="text-info text-center">Admin Panel</h1>

      <button style="margin-top:30px;margin-left:42%;margin-bottom:30px" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
        Add info for your website
      </button>
      <!--  a model to add the articles by the admin and upload it to the DB -->

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">


            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add your Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <form action="add.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
                  <label>Page</label>
                  <input type="number" name="page" class="form-control" placeholder="Enter number of Page">
                </div>

                <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="type" class="form-control" placeholder="Enter type">
                </div>

                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="date" class="form-control" placeholder="Enter Date">
                </div>


                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" id="image" class="form-control" placeholder="Enter your Image">
                </div>

                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>

                <div class="form-group">
                  <label>Text</label>
                  <input type="text" name="text" class="form-control" placeholder="Enter Text">
                </div>

                <!--for disc-->
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="description" class="form-control" placeholder="Enter Description">
                </div>




                <!--end disc-->
              </div>
              <div class="modal-footer">
                <!-- when we click saveinfo it will be upload to DB-->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="saveinfo" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>



      <!-- Return   the data from DB and show it in admin's panel-->
      <div class="table-responsive">
        <?php

        $connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');
        $query = "SELECT * FROM articles";
        $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-bordered" id="dataTable" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>page</th>
              <th>type</th>
              <th>date</th>
              <th>image</th>
              <th>Title</th>
              <th>Text</th>
              <th>Description</th>

              <th>edit</th>
              <th>delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <td width="10px"><?php echo $row['id']; ?> </td>
                  <td width="10px"><?php echo $row['page']; ?> </td>
                  <td width="10px"><?php echo $row['type']; ?> </td>
                  <td width="10px"><?php echo $row['date']; ?> </td>
                  <td height="10px"><?php echo '<img src="imgs/' . $row['image'] . '" width="200px;" height="100px;">' ?> </td>
                  <td height="10px"><?php echo $row['title']; ?> </td>
                  <td><?php echo $row['text']; ?> </td>
                  <td height="10px"><?php echo $row['description']; ?> </td>

                  <td width="10px">
                    <form action="foredit.php" method="post">
                      <!--when we click edit to update the data in the DB so we move to foredit.php to edit the data-->
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> EDIT </button>
                    </form>
                  </td>
                  <td width="10px">
                    <form action="fordelete.php" method="post">
                      <!-- when we click delete we move to fordelete.php to delete the row using id-->
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="deletebtn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "NO RECORDS";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!--advice-->

      <!--model to add advices to addadvice table-->
      <button style="margin-top:30px;margin-left:42%;margin-bottom:30px" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2">
        Add info for your advices
      </button>


      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">


            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabe2">Add your Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <form action="add.php" method="POST">
              <div class="modal-body">

                <div class="form-group">
                  <label>advice</label>
                  <input type="text" name="advice" class="form-control" placeholder="Enter your advice">
                </div>
                <div class="form-group">
                  <label>advice2</label>
                  <input type="text" name="advice2" class="form-control" placeholder="Enter your advice2">
                </div>

              </div>
              <div class="modal-footer">
                <!--when we click it we upload the advices into the DB-->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="saveadvice" class="btn btn-primary">Save changes2</button>
              </div>
            </form>
          </div>
        </div>
      </div>



      <div class="table-responsive">
        <?php
        //return the advices from DB and show it in admin's panel
        $connection = mysqli_connect('localhost', 'id16673673_mws', 'Mws123456789@', 'id16673673_medweb');
        $query = "SELECT * FROM addadvice";
        $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-bordered" id="dataTable" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>advice</th>
              <th>advice2</th>

            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <td><?php echo $row['id']; ?> </td>
                  <td><?php echo $row['advice']; ?> </td>
                  <td><?php echo $row['advice2']; ?> </td>

                  <td>
                    <form action="foredit.php" method="post">
                      <!--to update data in DB-->
                      <input type="hidden" name="editadv_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="editadv_btn" class="btn btn-success"> EDIT </button>
                    </form>
                  </td>
                  <td>
                    <form action="fordelete.php" method="post">
                      <!--to delete data in DB-->
                      <input type="hidden" name="deleteadv_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="deleteadvbtn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "NO RECORDS";
            }
            ?>
          </tbody>
        </table>
      </div>




      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>