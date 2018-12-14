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