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
    <title>Document</title>
</head>
<body>
    <section class="header"></section>
    <section class="main">
        <section class="form">
        <h2>Dodaj egzaminy</h2>
        <form action="send_data.php" method="post">
            <Label>Ilość egzaminów:</Label>
            <input type="number" name="egzIl" id="">
            <Label>Typ egzaminu:</Label>
            <select name="egzTp" id="">
                <option value="w">w</option>
                <option value="wk">wk</option>
                <option value="d">d</option>
                <option value="dk">dk</option>
            </select>
            <select name="egzKwal" id="">
                <option value="inf.03">inf.03</option>
                <option value="inf.02">inf.02</option>
            </select>
            <input type="submit" value="Add">
        </form>
        <?php
        if(isset($_SESSION['error_send'])):
        ?>
        <div class='error'><?php
        echo($_SESSION['error_send']);
        unset($_SESSION['error_send']);
        ?></div>
        <?php
        endif;
        ?>
        </section>
        <section class="form">
            <h2>Edytuj egzaminy</h2>
            
        </section>
    </section>
</body>
</html>