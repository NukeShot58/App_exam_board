<?php 
session_start();
require_once('conn.php');
try{
    $conn = new mysqli($hostname,$username,$password,$dbname);
    $sql = "insert into egzamin(kwalifikacja, typ) values("$_POST['egzKwal']","$_POST['egzTp']")"
}catch(mysqli_sql_exception $e){
    $_SESSION['error_send'] = $e;
    header('Location: page.php');
}
?>

