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


<div id="loginDiv">
	<div class="loginSmallDiv" id="loginSmallDiv">

		<form action="/SEG_Lab_Project-bug-fixing/public/login_redirect.php" method="post">
			<fieldset>
				<div class="loginInput ">
					<span class="loginInputIcon ">
						<span class=" glyphicon glyphicon-lock"></span>
					</span>
					<input type="ID" name="ID"  placeholder="ID" required /> <br />
				</div>
				<div class="loginInput ">
					<span class="loginInputIcon ">
						<span class=" glyphicon glyphicon-lock"></span>
					</span>
					<input type="password"  name="password" placeholder="password" required /> <br />
				</div>
				<div>
					<a href="#nowhere" class="notImplementLink">Forget Password</a>
					<a class="pull-right" href="register.html">Register</a>
				</div>
				<div  style="margin-top:20px">
					<input type="submit" name="secretary"  class="btn btn-block redButton" value="submit" onClick="" />
				</div>
				
			</fieldset>
		</form>



		
          
	</div>
</div>
</html>


  
