<?php
session_start();




include('config.php');

if (isset($_POST['send'])) {
	if (!empty($_POST['title']) && !empty($_POST['classification']) && !empty($_POST['question'])) {
		$title = $_POST['title'];
		$question = $_POST['question'];
		$classification = $_POST['classification'];
		date_default_timezone_set('Asia/Damascus');
$current_date=date("Y-m-d h:i");
		$user_check_query = "SELECT * FROM medical_record WHERE  user_id='$_SESSION[id]' LIMIT 1";
		$result = mysqli_query($link, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if (!$user) { // if user not  exists


			$query = "INSERT INTO medical_record (user_id )VALUES('$_SESSION[id]')";
			mysqli_query($link, $query);
		}
		$query = "INSERT INTO questions (title,classification,user_id,questions,created)
      		VALUES('$title','$classification','$_SESSION[id]','$question' ,'$current_date' )";

		$run = mysqli_query($link, $query);
		header("Location: see-the-question.php");
	}
}
