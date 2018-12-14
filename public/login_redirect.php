<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/query_functions.php'); ?>
<?php require_once('../private/shared/header.php'); ?>




<?php
if(checkAuthentication($_POST['ID'], $_POST['password'])){
	$result_set = checkAuthentication($_POST['ID'], $_POST['password']);
	$privilege = mysqli_fetch_assoc($result_set)['privelegeLevel'];
	if($privilege == 'Secretary'){
		header('Location: /staff/secretary/secretary_platform.php'); 
		exit(); 
	}
	else {
		header('Location: /staff/volunteer/volunteer_platform.php'); 
		exit();
	} 
} else {
	header('Location: login.php'); 
	exit();
	
}

?>