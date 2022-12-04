<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <section class='main'>
        <form action="login.php" method="post">
            <input type="text" name="login" id="" placeholder="Login">
            <input type="password" name="pass" id="" placeholder="Hasło">
            <input type="submit" value="Zaloguj">
        </form>
        <?php
        if(isset($_SESSION['error_login'])): 
        ?>
        <div class="error"><?php
            echo $_SESSION['error_login'];
            unset($_SESSION['error_login']);
        ?></div>
        <?php
        endif;
        ?>
    </section>
</body>
</html>