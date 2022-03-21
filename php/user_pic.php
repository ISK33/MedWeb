<?php
include 'con_config.php';
header('Content-Type:application/json');
//check if image has already sent by $_FILES
if($_FILES['image']){  
$imageName = $_FILES['image']['name'];
  $target_dir = "../upload/profilesImages/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  //to get the image type
  $image_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_valid = array("jpg","jpeg","png","gif");
  //each image is saved depending on user's email hash
  $hashedEmail = md5($_SESSION['email']);
  $newImageName = $hashedEmail.".".$image_type;
  //to check if the image is compatible with allowed image extensions
  if( in_array($image_type,$extensions_valid) ){
      if($_SESSION['type']==='user'){
    $query = ("UPDATE users SET photo = '$newImageName' 
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error()); 
    mysqli_query($db,$query);
    //delete images which have the same name but different extensions 
    $file_pattern = $target_dir.$hashedEmail.'.*';
    array_map( "unlink", glob( $file_pattern ) );
      }else{
    $query = ("UPDATE doctors SET photo = '$newImageName' 
              WHERE user_id = '$_SESSION[id]'") or die(mysqli_connect_error()); 
    mysqli_query($db,$query);
    $file_pattern = $target_dir.$hashedEmail.'.*';
    array_map( "unlink", glob( $file_pattern ) );
}
   //upload image file to target direction
move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$newImageName);
     echo '{res:"done"}';
   }

}
