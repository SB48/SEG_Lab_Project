
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
                        <a class="dropdown-item" href="../index.php">Home</a>
                        <a class="dropdown-item" href="../collection.php">Collection</a>
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
    $memberName = mysqli_fetch_assoc($memberNameSet)['fullName'];

    $numberOfVideosPossibleSet = find_how_many_games_can_rent();
    $numberOfVideosPossible = mysqli_fetch_assoc($numberOfVideosPossibleSet)['ruleVal'];

    $isBannedSetN = find_is_normal_banned($id);
    $isBannedNormal = mysqli_fetch_assoc($isBannedSetN)['normalBan'];

    $isBannedSetD = find_is_demage_banned($id);
    $isBannedDamage = mysqli_fetch_assoc($isBannedSetD)['damageBan'];

    $violationsPossibleSet = find_violations_possible();
    $violationsPossible = mysqli_fetch_assoc($violationsPossibleSet)['ruleVal'];

    $gamesCurrentlyRentedSet = find_how_many_games_are_rented($id);
    $gamesCurrentlyRented =  mysqli_fetch_assoc($gamesCurrentlyRentedSet)['num'];

    $violationsInGracePeriodSet = find_violations_in_grace_period($id);
    $violationsInGracePeriod = mysqli_fetch_assoc($violationsInGracePeriodSet)['num'];

    $findAmountDueSet = find_amount_due($id);
    $findAmountDue = mysqli_fetch_assoc($findAmountDueSet)['amountDue'];

    $currentRentalsSet = find_current_rentals($id);
    $currentRentals = mysqli_fetch_assoc($currentRentalsSet)['num'];

    $rentalTableSet = find_all_current_rentals($id);

  ?>
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">

    <div class="row white">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1><?php echo $memberName; ?></h1>
        </div>
        <div class="col-md-3"></div>
    </div>


    <div class="row user-menu-container square">
        <div class="col-md-12 user-details">

            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>VIOLATIONS</h3>
                    <h4><?php echo $violationsInGracePeriod ?>/<?php echo $violationsPossible ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>AMOUNT DUE</h3>
                    <h4><?php echo $findAmountDue ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>CURRENTLY RENTING</h3>
                    <h4><?php echo $gamesCurrentlyRented ?>/<?php echo $numberOfVideosPossible ?></h4>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>RENT A GAME</h3>

                    <div class="dropdown padding pt-2">
                        <!--                can rent only if not banned and renting less than the limit-->
                        <?php
                        $status = "";
                        if(($gamesCurrentlyRented >= $numberOfVideosPossible) || $isBanned || ($findAmountDue > 0)) {
                            $status = "disabled";} ?>
                        <input onclick="myFunction()" class="dropbtn" type="submit" name="button">
                        <div id="myDropdown" class="dropdown-content">
                            <input type="text" placeholder="Search.." name="search" id="myInput" onkeyup="filterFunction()">
                            <?php
                            $allGames_set = find_all_games();
                            while ($eachGame = mysqli_fetch_assoc($allGames_set)) {
                                echo ' <a href="../product.php?id='.$eachGame["gameID"].'";>'.$eachGame["name"]." - ".$eachGame["platform"].'</a>';
                            }
                            ?>
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
                <div class="col-md-4 user-pad text-center">
                    <h3></h3>
                    <h4><?php if($isBannedDamage = true || $isBannedNormal = true ){
                        echo "BANNED";
                    }else{
                        echo "NOT BANNED";
                        }
                    ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>PAY BACK THE FINE</h3>
                    <td><form action="member.php?id=<?php echo $id; ?>" method="post">
                            <input type="submit" name="pay_back" value="PAY BACK" class="button-new"/>
                        </form>
                    </td>
                    <?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["pay_back"]))
                    {
                        payback($id);
                    }?>
                </div>
            </div>
        </div>
    </div>




    <div class="row pt-5">
        <div class="col-md-12">
            <table id="customers">
                <tr>
                    <th><h3>no</h3></th>
                    <th><h3>name</h3></th>
                    <th><h3>due</h3></th>
                    <th><h3>extend</h3></th>
                    <th><h3>late</h3></th>
                    <th><h3>return faulty</h3></th>
                    <th><h3>return ok</h3></th>
                </tr>
                <?php
                    $no = 0;
                    while ($rental = mysqli_fetch_assoc($rentalTableSet)) { ?>
                <tr>
                    <td><h3><?php echo $no = $no + 1; ?></h3></td>
                    <td><h3><?php echo $rental['gameID']; ?></h3></td>
                    <td><h3><?php echo $rental['returnDate']; ?></h3></td>
                    <?php $extend = "extend".$rental['rentalID'] ?>
                    <td><form action="member.php?id=<?php echo $rental['memberID']; ?>" method="post">
                            <input type="submit" name=<?php echo $extend ?> value="EXTEND" class="button-new"/>
                        </form>
                    </td>
                    <?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$extend]))
                    {
                        extension($rental['rentalID'], $rental['memberID']);
                    }?>
                    <?php $late = "late".$rental['rentalID'] ?>
                    <td><form action="member.php?id=<?php echo $rental['memberID']; ?>" method="post">
                            <input type="submit" name=<?php echo $late ?> value="LATE" class="button-new"/>
                        </form>
                    </td>
                    <?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$late]))
                    {
                        late($rental['memberID']);
                    } ?>
                    <?php $faulty = "faulty".$rental['rentalID'] ?>
                    <td><form action="member.php?id=<?php echo $rental['memberID']; ?>" method="post">
                            <input type="submit" name=<?php echo $faulty ?> value="RETURN FAULTY" class="button-new"/>
                        </form>
                    </td>
                    <?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$faulty]))
                    {
                        //damagedReturn($rental['memberID'], findAmountDue, $rental['gameID']);
                        closeTheRental($rental['rentalID']);
                    } ?>
                    <?php $ok  = "faulty".$rental['rentalID'] ?>
                    <td><form action="member.php?id=<?php echo $rental['memberID']; ?>" method="post">
                            <input type="submit" name=<?php echo $ok ?> value="RETURN OK" class="button-new"/>
                        </form>
                    </td>
                    <?php if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$ok]))
                    {
                        //incrementCopies($rental['gameID']);
                        closeTheRental($rental['rentalID']);
                    } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>



    <?php mysqli_free_result() ?>



    <?php require_once('../../private/shared/footer.php'); ?>
</div>



