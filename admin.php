<!-- This form is to get the admin's login information and verifying
     it through the adminLogin.php -->

<?php
    include "view/navigation.php";
    include "model/database.php";
?>
<body class="background">
    <div class="container-fluid">
        <form class="row g-3" style="max-width:600px; margin: 0 auto; padding-top:25px;" method="post" action="adminLogin.php">
            <h2>Login</h2>
            <div>
                <label for="username">User Name:</label>
                <input type="text" class="textbox" id="txt_uname" name="username" placeholder="Username" />
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" class="textbox" id="txt_uname" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="hidden" name='login'>
                <input type="submit"  class="btn buttonColor d-grid gap-2 col-3 mx-auto" value="Login" name="login" id="login"/>
            </div>
        </form>
    </div>
</body>