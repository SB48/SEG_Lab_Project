<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/shared/header.php'); ?>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CGS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../../index.php">Home</a>
                        <a class="dropdown-item" href="../../collection.php?id=all">Collection</a>
                        <a class="dropdown-item" href="../../login.html">LogIn</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Chenge the Rules</h1>
        </div>
        <div class="col-md-3">
            <div class="center">
</div></div>
    </div>



    <div class="row">

        <include src="changeRules.html"></include>
  
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

    <?php require_once('../../../private/shared/footer.php'); ?>
