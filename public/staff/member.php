
<?php require_once('../../private/initialize.php'); ?>
<?php require_once('../../private/shared/header.php'); ?>

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
                        <a class="dropdown-item" href="../home_page.php">Home</a>
                        <a class="dropdown-item" href="../collection.php">Collection</a>
                        <a class="dropdown-item" href="#">Dummy</a>
                        <a class="dropdown-item" href="../login.html">Log In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    //id as int (instead of string)
    $id = (int) $_GET['id'];
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

    $memberNameSet = find_member_name($id);
    $memberName = mysqli_fetch_assoc($memberNameSet)['firstName'];

    $numberOfVideosPossibleSet = find_how_many_games_can_rent();
    $numberOfVideosPossible = mysqli_fetch_assoc($numberOfVideosPossibleSet)['ruleVal'];

    $isBannedSet = find_is_banned($id);
    $isBanned = mysqli_fetch_assoc($isBannedSet)['normalBan'];

    $violationsPossibleSet = find_violations_possible();
    $violationsPossible = mysqli_fetch_assoc($violationsPossibleSet)['ruleVal'];

    $gamesCurrentlyRented = find_how_many_games_are_rented($id);

    $violationsInGracePeriod = find_violations_in_grace_period($id);

    $findAmountDueSet = find_amount_due($id);
    $findAmountDue = mysqli_fetch_assoc($findAmountDueSet)['amountDue'];

    //$currentRentalsSet = find_current_rentals($id);
    //if (isset($currentRentalsSet)) {echo "current rental ok ";}

    ?>



    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1><?php echo $memberName ?></h1>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="white">CURRENTLY RENTING:</p>
        </div>
        <div class="col-md-6">
            <p class="white-text-center"><?php echo $gamesCurrentlyRented ?> out of <?php echo $numberOfVideosPossible ?> possible</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="white">IS BANNED:</p>
        </div>
        <div class="col-md-6">
            <p class="white-text-center"><?php echo $isBanned?></p>
<!--         we need to somehow get until when the member is banned   - until 20/12/2018-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="white">VIOLATIONS SINCE LAST YEAR:</p>
        </div>
        <div class="col-md-6">
            <?php update_nullification(); ?>
            <p class="white-text-center"><?php echo $violationsInGracePeriod ?> out of <?php echo $violationsPossible ?> possible</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="white">TO PAY:</p>
        </div>
        <div class="col-md-6">
            <p class="white-text-center"><?php echo $findAmountDue ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <button class="button-new">PAY BACK</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p class="white">pick a game to rent (from available)</p>
        </div>
        <div class="col-md-6">
            <div class="dropdown padding">
                <!--                can rent only if not banned and renting less than the limit-->
                <?php
                $status = "";
                if(($gamesCurrentlyRented >= $numberOfVideosPossible) || $isBanned || ($findAmountDue > 0)) {
                    $status = "disabled";} ?>
                <button onclick="myFunction()" class="dropbtn" <?php echo $status; ?> >FIND</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <a href="#about">Monica</a>
                    <a href="#base">Rachel</a>
                    <a href="#blog">Ros</a>
                    <a href="#contact">Chandler</a>
                    <a href="#custom">Pheobe</a>
                    <a href="#support">Joey</a>
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
    </div>
    <div class="row">
        <div class="col-md-3">
            <p class="white">CURRENTLY RENTING:</p>
        </div>
        <div class="col-md-9">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="customers">
                <tr>
                    <th>no</th>
                    <th>name</th>
                    <th>due</th>
                    <th>extend</th>
                    <th>faulty</th>
                    <th>return</th>
                </tr>
                <?php $no = 0 ?>
                <?php while($currentRentals = mysqli_fetch_assoc($currentRentalsSet)) {?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $currentRentals['name']; ?></td>
                    <td><?php echo $currentRentals['returnDate']; ?></td>
                    <td><input type="button" name="extend" class=button-new" value="EXTEND"/></td>
                    <?php if(array_key_exists('extend',$_POST)){
                        extension($currentRentals['rentalID'], $currentRentals['memberID']);}
                    ?>
                    <td><input type="button" name="late" class=button-new" value="LATE"/></td>
                    <?php if(array_key_exists('faulty',$_POST)){
                        late($currentRentals['memberID']);}
                    ?>
                    <td><input type="button" name="faulty" class=button-new" value="RETURN FAULTY"/></td>
                    <?php if(array_key_exists('faulty',$_POST)){
                        damagedReturn($currentRentals['rentalID']);}
                    ?>
                    <td><input type="button" name="return" class=button-new" value="RETURN OK"/></td>
                    <?php if(array_key_exists('return',$_POST)){
                        normalReturn($currentRentals['rentalID']);}
                    ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <input type="button" name="test" id="test" value="RUN" /><br/>

    <?php

    function testfun()
    {
        echo "Your test function on button click is working";
    }
    if(array_key_exists('test',$_POST)){
        testfun();
    }
    ?>


    <?php mysqli_free_result() ?>



    <?php require_once('../../private/shared/footer.php'); ?>

