<?php require_once('../../private/initialize.php'); ?>
<?php require_once(SHARED_PATH . '/header.php'); ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["firstName"]) && isset($_POST["lastName"])) {
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $dob = $_POST['dob'];
        $result = insert_member($firstname, $lastname, $dob);
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">
    <link href="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CGS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../index.php">Home</a>
                        <a class="dropdown-item" href="../collection.php?id=all">Collection</a>
                        <a class="dropdown-item" href="../collection_login.php">LogIn</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Add Member</h1>
        </div>
        <div class="col-md-3">
            <div class="center">
            </div>
        </div>
    </div>


 <div class="container">
    <div class="row">
        <div class="col-4">
        <form action="collection_add_member.php" method="post">
            <div id="loginDiv">
                <div class="loginSmallDiv" style="padding-left: 0; !important;" id="loginSmallDiv">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                        </div>
                        <input type="text" name="firstName" id="firstName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                        </div>
                        <input type="text" name="lastName" id="lastName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Birthday</span>
                        </div>
                        <input type="date" name="dob" id="dob" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <button type="submit" value="Submit" class="btn btn-danger" style="float: right;">Submit</button>


                </div>
            </div>
        </form>

        </div>
    </div>

    </div>

    <div class="row py-5">
        <div class="col-md-12"></div>
    </div>
    <div class="row py-5">
        <div class="col-md-12"></div>
    </div>
    <div class="row py-5">
        <div class="col-md-12"></div>
	</div>

        <?php require_once(SHARED_PATH . '/footer.php'); ?>
