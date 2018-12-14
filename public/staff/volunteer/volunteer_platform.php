
<?php require_once('../../../private/initialize.php'); ?>
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
                        <a class="dropdown-item" href="../../index.php">Home</a>
                        <a class="dropdown-item" href="../../collection.php?id=all">Collection</a>
                        <a class="dropdown-item" href="../../collection_login.php">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Volunteer's Platform</h1>
        </div>
        <div class="col-md-3"></div>
    </div>



    <div class="row user-menu-container square">
        <div class="col-md-12 user-details">

            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <?php require_once('../findMember.php'); ?>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3></h3>
                    <h4></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>FIND GAME</h3>
                    <div class="dropdown">

                        <input onclick="myFunction2()" class="dropbtn" type="submit" name="button2"></input>
                        <div id="myDropdown2" class="dropdown-content">
                            <input type="text" placeholder="Search.." name="search2" id="myInput2" onkeyup="filterFunction2()">
                            <?php
                            $allGames_set = find_all_games();
                            while ($eachGame = mysqli_fetch_assoc($allGames_set)) {
                                echo ' <a href="../../product.php?id='.$eachGame["gameID"].'";>'.$eachGame["name"]." - ".$eachGame["platform"].'</a>';
                            }
                            ?>
                        </div>

                    </div>
                    <?php require_once('../gameScript.php'); ?>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3></h3>
                    <h4></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>ADD MEMBER</h3>
                    <form class="pt-3" action="../collection_add_member.php" method="post">
                        <input type="submit" name="new_m" value="NEW" class="button-new"/>
                    </form>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3></h3>
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>


    <div class="row py-3">
        <div class="col-md-12"></div>
    </div>


   <?php require_once(SHARED_PATH . '/footer.php'); ?>
