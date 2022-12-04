<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <section class='main'>
        <form action="" method="post">
            <input type="text" name="login" id="">
            <input type="password" name="pass" id="">
            <input type="submit" value="Zaloguj">
        </form>
    </section>
    <?php 
    if(isset($_POST['login'])) {
        //if(!is_null($_POST[''] || !is_null($_POST[] ))
    }
    
    ?>
</body>
</html>