<!-- This controller is called in the admin.php. This will be handling
     the login verification and once successfully logged in will show the Checked out list as well as the add and view active books -->

<?php
    include "view/navigation.php";
    include "model/database.php";
    $checkedOut = getCheckout();
?>
<body class="background">
    <div class="container-fluid">
        <div class="main" style="margin: 0 auto; padding-top:25px;">
        <?php
            $adminPassword = "Bucket1971!";
            $adminUsername = "Charlie";
            $password = filter_input(INPUT_POST, 'password');
            $username = filter_input(INPUT_POST, 'username');
            
            if ($password == $adminPassword && $username == $adminUsername)
            {
                setcookie("username", $username, time()+1200);
                echo("<h2 style='display: flex; justify-content: center;'>Checked Out</h2>");
                foreach($checkedOut as $checkOut)
                {
                    $checkOutId = $checkOut['checkOutID'];        
                    echo ($checkOut['checkOutDT'] . "&emsp;" . $checkOut['checkOutBook'] . " >> " . $checkOut['checkOutCustomer'] . "<br>");
                }
                echo("<br><button class='btn buttonColor d-grid gap-2 col-3 mx-auto'><a class='atag' href='bookListing.php'>View Books</a></button><br>");
                echo("<button class='btn buttonColor d-grid gap-2 col-3 mx-auto'><a class='atag' href='add.php'>Add a Book</a></button>");
            }
            else
            {
                setcookie("username", "", time()-3600);
                echo("<h2>Invalid user name or password<br> Return to Login</h2>");
                echo("<button class='btn buttonColor d-grid gap-2 col-3 mx-auto'><a class='atag' href='admin.php'>Admin Login</a></button>");
            }
        ?>
        </div>
    </div>
</body>

