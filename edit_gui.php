<?php 
    session_start();
    if(!isset($_SESSION['login']) || !isset($_POST['id'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="form"><?php
require_once('conn.php');
try{
    $conn = new mysqli($hostname, $username, $password, $dbname);
    //////////////////////
    $sql = "select * from egzamin where egzaminID=" . $_POST['id'].";";
    $sql2 = "select * from sale;";
    $sql3 = "select *";
    $sql4 = "";
    ///////////////////////
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    ///////////////////////
    $rekord = $result->fetch_array(MYSQLI_ASSOC);
    echo '<form method="post" action="edit.php"><table border=1><tr><th>id</th><th>dataGodz</th><th>sala</th><th>klasyfikacja</th><th>typ</th><th>Techniczny nauczyciel</th><th>Zewnętrzny nauczyciel</th><th>Potwierdź</th></tr>';
    $i = -1;
    foreach($rekord as $element){
        if($element != ''){
        echo '<td>' . $element . '</td>';
        }else{
            switch($i){
                case 0:
                    echo '<td><input name="dateTime" type="datetime-local"> </td>';
                    break;
                case 1:
                    echo '<td>';
                    echo '<select name="sala">' ;
                    while($rekord2 = $result2->fetch_array(MYSQLI_ASSOC)){
                        echo '<option value='.$rekord2['id'].'>'. $rekord2['sala'].'</option>';
                    }
                    echo '</select>';
                    echo '</td>';
                    break;
                    case 2:
                        echo '<td>';
                        echo '<select name="techNau">' ;
                        while($rekord3 = $result3->fetch_array(MYSQLI_ASSOC)){
                            echo '<option value='.$rekord3['id'].'>'. $rekord3['sala'].'</option>';
                        }
                        echo '</select>';
                        echo '</td>';
                        break;
            }
        }
        $i++;
    }
    echo '</tr></table></form>';
    $conn->close();
}catch(mysqli_sql_exception $e){
    $conn->close();
    echo($e);
}
?></section>

</body>
</html>
