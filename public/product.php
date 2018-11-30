
<?php require_once('../private/initialize.php'); ?>
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
                        <a class="dropdown-item" href="home_page.php">Home</a>
                        <a class="dropdown-item" href="collection.html.html">Collection</a>
                        <a class="dropdown-item" href="#">Dummy</a>
                        <a class="dropdown-item" href="login.html.html">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>PRODUCT NAME</h1>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row py-5">
        <div class="col-md-6">
            <img src="https://pixel.nymag.com/imgs/fashion/daily/2018/03/02/magazine/how-to-raise-a-boy/05-video-game-dad-lede.w700.h700.jpg" alt="Minecraft" width="500" height="600">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text">RATING FROM API</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text">STATUS: available (3)/out of stock</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text">AGE: 7+</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text">PLATFORM: Play Station 4</p>
                </div>
            </div>



        </div>

    </div>





    <?php require_once(SHARED_PATH . '/footer.php'); ?>

