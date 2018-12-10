
<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/shared/header.php'); ?>

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
                        <a class="dropdown-item" href="../index.php">Home</a>
                        <a class="dropdown-item" href="collection.php?id=all">Collection</a>
                        <a class="dropdown-item" href="collection_login.php">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <?php
    //id as int (instead of string)
    $id = (int) $_GET['id'];
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;
    $thisGameSet = find_game($id);
    $thisGame = mysqli_fetch_assoc($thisGameSet);


    $gameID = $thisGame['gameID'];
    $gameName = $thisGame['name'];
    $gamePrice = $thisGame['price'];
    $gameAgeRating = $thisGame['ageRating'];
    $gameGenre = $thisGame['genre'];
    $gameDescription = $thisGame['description'];
    $gameCopies = $thisGame['copies'];
    $gameURL = $thisGame['url'];
    $gamePicPath = $thisGame['path'];
    $gamePlatform = $thisGame['platform'];

    ?>


    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1><?php echo $gameName ?></h1>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row py-5">
        <div class="col-md-6">
            <?php echo '<img src="'.$thisGame["path"]. '" width="100px" class="productImage">' ?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <p class="white"><?php echo $gameDescription ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text">GetRatingFromAPI</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text">Available Copies: <?php echo $gameCopies ?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text"><?php echo $gameAgeRating ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="white-text"><?php echo $gamePlatform ?></p>
                </div>
            </div>



        </div>

    </div>





<?php require_once('../private/shared/footer.php'); ?>