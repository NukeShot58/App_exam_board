<?php 
    session_start();
    if(!isset($_SESSION['login'])){
    header('Location: index.php');
    }
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
    <section class="header"><h2>Zalogowany jako: <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
    }
    ?></h2>
    <a href="logout.php">Wyloguj</a>    
</section>
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
            <?php
            require_once('conn.php');
            try{
                $conn = new mysqli($hostname, $username, $password, $dbname);
                $sql = "select * from egzamin;";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    echo '<table border=1><tr><th>id</th><th>dataGodz</th><th>sala</th><th>klasyfikacja</th><th>typ</th><th>Techniczny nauczyciel</th><th>Zewnętrzny nauczyciel</th><th>Usuń</th><th>Edytuj</th></tr>';
                    while($rekord = $result->fetch_array(MYSQLI_ASSOC)){
                        echo '<tr>';
                        foreach($rekord as $element){
                            echo '<td>' . $element . '</td>';
                        }
                        echo ('<td><form method="post" action="del_egz.php"><input type="hidden" name="id" value="' . $rekord['egzaminID'] . '"><input type="submit" value="Usuń"></form></td>');
                        echo ('</tr>');
                    }
                    echo '</table>';
                }
                $conn->close();
            }catch(mysqli_sql_exception $e){
                echo "<div class='error'>" . $e . "</div>";
                unset($e);
            }

            ?>
            
        </section>
    </section>
</body>
</html>