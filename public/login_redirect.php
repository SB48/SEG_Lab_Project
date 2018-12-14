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
if(checkAuthentication($_POST['ID'], $_POST['password'])){
	$result_set = checkAuthentication($_POST['ID'], $_POST['password']);
	$privilege = mysqli_fetch_assoc($result_set)['privelegeLevel'];
	if($privilege == 'Secretary'){
		header('Location: /SEG_Lab_Project-bug-fixing/public/staff/secretary/secretary_platform.php'); 
		exit(); 
	}
	else {
		header('Location: /SEG_Lab_Project-bug-fixing/public/staff/volunteer/volunteer_platform.php'); 
		exit();
	} 
} else {
	header('Location: /SEG_Lab_Project-bug-fixing/public/login.php'); 
	exit();
	
}

?>