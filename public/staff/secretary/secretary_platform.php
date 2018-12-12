
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
                        <a class="dropdown-item" href="../../collection_login.php">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Secretary's Platform</h1>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row user-menu-container square">
        <div class="col-md-12 user-details">

            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>FIND MEMBER</h3>
                    <div class="dropdown">
                        <input onclick="myFunction()" class="dropbtn" type="submit" name="button"></input>
                        <div id="myDropdown" class="dropdown-content">
                            <input type="text" name="search" onkeyup="filterFunction()"placeholder="Search.." id="myInput" >
                            <?php
                            $allMember_set = find_all_members();
                            while ($eachMember = mysqli_fetch_assoc($allMember_set)) {
                                echo '<a href="../member.php?id='.$eachMember["memberID"].'";>'.$eachMember["fullName"].'</a>';
                            }
                            ?>
                        </div>

                    </div>
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

                    <script>
                        /* When the user clicks on the button,
                        toggle between hiding and showing the dropdown content */
                        function myFunction2() {
                            document.getElementById("myDropdown2").classList.toggle("show");
                        }

                        function filterFunction2() {
                            var input, filter, ul, li, a, i;
                            input = document.getElementById("myInput2");
                            filter = input.value.toUpperCase();
                            div = document.getElementById("myDropdown2");
                            a = div.getElementsByTagName("a");
                            for (i = 0; i < a.length; i++) {
                                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    a[i].style.display = "";
                                } else {
                                    a[i].style.display = "none";
                                }
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>ADD MEMEBER</h3>
                    <form class="pt-3" action="../collection_add_member.php" method="post">
                        <input type="submit" name="new_m" value="NEW" class="button-new"/>
                    </form>

                    <script>
                        /* When the user clicks on the button,
                        toggle between hiding and showing the dropdown content */
                        function myFunction() {
                            document.getElementById("myDropdown").classList.toggle("show");
                        }

                        function filterFunction() {
                            var input, filter, ul, li, a, i;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            div = document.getElementById("myDropdown");
                            a = div.getElementsByTagName("a");
                            for (i = 0; i < a.length; i++) {
                                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    a[i].style.display = "";
                                } else {
                                    a[i].style.display = "none";
                                }
                            }
                        }
                    </script>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>RULES & LIMITATIONS</h3>
                    <form class="pt-3" action="collection_changeRules.php" method="post">
                        <input type="submit" name="new_r" value="CHANGE" class="button-new"/>
                    </form>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>ADD GAME</h3>
                    <form class="pt-3" action="collection_add_game.php" method="post">
                        <input type="submit" name="new_m" value="NEW" class="button-new"/>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php require_once('../../../private/shared/footer.php'); ?>
