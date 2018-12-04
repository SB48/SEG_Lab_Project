
<?php require_once(PRIVATE_PATH . '/initialize.php'); ?>
<?php require_once(SHARED_PATH . '/header.php'); ?>

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
                        <a class="dropdown-item" href="#">Home</a>
                        <a class="dropdown-item" href="collection.php">Collection</a>
                        <a class="dropdown-item" href="collection_login.php">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row text-header">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Computer Gaming Society Collection</h1>
            <p>scroll to view more</p>
        </div>
        <div class="col-md-3"></div>
    </div>


    <div class="row py-5">
        <div class="col-md-12"></div>
    </div>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p class = "larger-text">Welcome to Computer Gaming Society's Collection.</p>
            <p class="smaller-text">click on the link below to browse the games you could borrow</p>
            <p></p>
            <p></p>
        </div>
        <div class="col-md-3"></div>
    </div>



    <div class="row white smaller-padding">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="collection.php" class="button">VIDEO GAMES</a>
        </div>
        <div class="col-md-4"></div>
    </div>

    <?php require_once(SHARED_PATH . '/footer.php'); ?>

