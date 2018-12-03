
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
            <h1>Secretary's Platform</h1>
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
            <?php
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "myDB";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, firstname, lastname FROM MyGuests";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>


            <div class="dropdown">
                <form action="" method="post">
                <input onclick="myFunction()" class="dropbtn" type="submit" name="button">FIND</input>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" name="search" onkeyup="filterFunction()"placeholder="Search.." id="myInput" >
                    <a href="../member.php">Monica</a>
                    <a href="../member.php">Rachel</a>
                    <a href="../member.php">Ros</a>
                    <a href="../member.php">Chandler</a>
                    <a href="../member.php">Pheobe</a>
                    <a href="../member.php">Joey</a>
                </div>
                </form>
            </div>
            <?php

            $con=mysqli_connect('localhost', 'root', '');
            $con->select_db('Member');


            if(isset($_POST['button'])){    //trigger button click

                $search=$_POST['search'];

                $query= $con->query("select * from Member where firstName like '%{$search}%' || lastName like '%{$search}%' || fullName like '%{$search}%' ");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr><td>".$row['firstName']."</td><td></td><td>".$row['lastName']."</td><td></td><td>".$row['memberID']."</td></tr>";
                        $id = $row['memberID'];
                        echo "<a href='../member_$id.php'></a>";
                    }

                }else{
                    echo "No Member Found<br><br>";
                }

            }else{                          //while not in use of search  returns all the values
                $query=$con->query("select * from employees");

                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr><td>".$row['firstName']."</td><td></td><td>".$row['lastName']."</td><td></td><td>".$row['memberID']."</td></tr>";
                    $id = $row['memberID'];
                    echo "<a href='../member_$id.php'></a>"; }
            }

            $con->close();
            ?>
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
        <div class="col-md-12">
            <p class="white">GAMES</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <p class="white-text">find a game</p>
            <div class="dropdown">
                <form action="" method="post">
                    <input onclick="myFunction2()" class="dropbtn" type="submit" name="button2">FIND</input>
                <div id="myDropdown2" class="dropdown-content">
                    <input type="text" placeholder="Search.." name="search2" id="myInput2" onkeyup="filterFunction2()">
                    <a href="../../product.php">Game1</a>
                    <a href="../../product.php">Game2</a>
                    <a href="../../product.php">Game3</a>
                    <a href="../../product.php">Game4</a>
                    <a href="../../product.php">Game5</a>
                    <a href="../../product.php">Game6</a>
                </div>
                </form>
            </div>
            <?php

            $con=mysqli_connect('localhost', 'root', '');
            $con->select_db('Game');


            if(isset($_POST['button2'])){    //trigger button click

                $search=$_POST['search2'];

                $query= $con->query("select * from Game where name like '%{$search}%'");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr><td>".$row['name']."</td><td></td><td>".$row['platform']."</td><td></td><td>".$row['price']."</td></tr>";
                        $id = $row['gameID'];
                        echo "<a href='../member_$id.php'></a>";
                    }

                }else{
                    echo "No Game Found<br><br>";
                }

            }else{                          //while not in use of search  returns all the values
                $query=$con->query("select * from Game");

                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr><td>".$row['name']."</td><td></td><td>".$row['platform']."</td><td></td><td>".$row['price']."</td></tr>";
                    $id = $row['gameID'];
                    echo "<a href='../member_$id.php'></a>";}
            }

            $con->close();
            ?>
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
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <p class="white-text">add a new game</p>
            <a href="collection_add_game.php" class="button-new">NEW</a>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-md-12"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p class="white">MAKE CHANGES IN RULES AND LIMITATIONS</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <a href="collection_changeRules.php" class="button-new">CHANGES</a>
        </div>
        <div class="col-md-6"></div>
    </div>


<?php require_once(SHARED_PATH . '/footer.php'); ?>
