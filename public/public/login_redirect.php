<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/query_functions.php'); ?>
<?php require_once('../private/shared/header.php'); ?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="../js/jquery-1.12.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<?php 

//if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // if form has been posted process data

  // you dont need the addContact function you jsut need to put it in a new array
  // and it doesnt make sense in this context so jsut do it here
  // then used json_decode and json_decode to read/save your json in
  // saveContact()


  // always return true if you save the contact data ok or false if it fails
  //<form action="SEG_Lab_Project_bug-fixing/staff/secretary/secretary_platform.php" method="post">
//}
?>


<?php
if(checkAuthentication($_POST['ID'], $_POST['password'])){
	$result_set = checkAuthentication($_POST['ID'], $_POST['password']);
	echo $_POST['ID'];
	echo $_POST['password'];
	//$result_set = checkAuthentication($_POST['ID'], $_POST['password']);
	$privilege = mysqli_fetch_assoc($result_set)['privelegeLevel'];
	echo "after query";
	if($privilege == 'Secretary'){
		echo "secretary";
		header('Location: /SEG_Lab_Project-bug-fixing/public/staff/secretary/secretary_platform.php'); 
		exit(); 
	}
	else {
		echo "volunteer";
		header('Location: /SEG_Lab_Project-bug-fixing/public/staff/volunteer/volunteer_platform.php'); 
		exit();
	} 
} else {
	echo "incorrect information";
	header('Location: /SEG_Lab_Project-bug-fixing/public/login.php'); 
	exit();
	
}

?>