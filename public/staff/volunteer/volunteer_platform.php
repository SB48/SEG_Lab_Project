
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
                        <a class="dropdown-item" href="../../home_page.php">Home</a>
                        <a class="dropdown-item" href="../../collection.php">Collection</a>
                        <a class="dropdown-item" href="#">Dummy</a>
                        <a class="dropdown-item" href="../../login.html">Log In</a>
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



    <div class="row">
        <div class="col-md-12">
            <p class="white">MEMBERS</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <p class="white-text">find a member</p>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">FIND</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <a href="../member.php">Monica</a>
                    <a href="../member.php">Rachel</a>
                    <a href="../member.php">Ros</a>
                    <a href="../member.php">Chandler</a>
                    <a href="../member.php">Pheobe</a>
                    <a href="../member.php">Joey</a>
                </div>
            </div>

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
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <p class="white-text">add a new member</p>
            <a href="../collection_add_member.php" class="button-new">NEW</a>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-md-12"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <p class="white">GAMES</p>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <div class="dropdown">
                <button onclick="myFunction2()" class="dropbtn">FIND GAME</button>
                <div id="myDropdown2" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput2" onkeyup="filterFunction2()">
                    <a href="../../product.php">Game1</a>
                    <a href="../../product.php">Game2</a>
                    <a href="../../product.php">Game3</a>
                    <a href="../../product.php">Game4</a>
                    <a href="../../product.php">Game5</a>
                    <a href="../../product.php">Game6</a>
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
        <div class="col-md-5"></div>
    </div>

    <div class="row py-3">
        <div class="col-md-12"></div>
    </div>


    <?php require_once(SHARED_PATH . '/footer.php'); ?>
