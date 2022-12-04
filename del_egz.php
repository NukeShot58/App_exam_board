<?php
session_start();
?>
<?php
require_once('conn.php');
try{
    $conn = new mysqli($hostname, $username, $password, $dbname);
    $sql = "delete from egzamin where egzaminID=" . $_POST['id'].";";
    $conn->query($sql);
    $conn->close();
    header('Location: page.php');
    exit();
}catch(mysqli_sql_exception $e){
    header('Location: page.php');
    exit();
}
?>