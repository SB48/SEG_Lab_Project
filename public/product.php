
<?php require_once('../private/initialize.php'); ?>
<?php require_once('../private/shared/header.php'); ?>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

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
                        <a class="dropdown-item" href="index.php">Home</a>
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

    <div class="row user-menu-container square">
        <div class="col-md-12 user-details">

            <div class="row overview">
                <div class="col-md-4 user-pad text-center">

                    <h4 class="pt-2"><?php echo '<img src="'.$thisGame["path"]. '" width="100px" class="productImage">' ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>GENRE</h3>
                    <h4><?php echo $gameGenre ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>AGE GROUP</h3>
                    <h4><?php echo $gameAgeRating ?></h4>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>COPIES AVAILABLE</h3>
                    <h4><?php echo $gameCopies ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>PLATFORM</h3>
                    <h4><?php echo $gamePlatform ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
<!--                    <h3>RATING</h3>-->
<!--                    <script>$( "#rating" ).load( "https://www.metacritic.com/game/playstation-4/earth-defense-force-5 #section #product_scores" );</script>-->
                    <iframe id="rating" sandbox="allow-forms allow-same-origin allow-scripts" src="https://www.metacritic.com/game/playstation-4/earth-defense-force-5"></iframe>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-12 user-pad text-center">
                    <h3>SUMMARY</h3>
                    <h4 class="pt-4"><?php echo $gameDescription ?></h4>
                </div>

            </div>
        </div>
    </div>



</div>







<?php require_once('../private/shared/footer.php'); ?>