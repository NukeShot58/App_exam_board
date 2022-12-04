<?php 
session_start();
?>
<?php

if(!isset($_POST['egzIl'])){
    if(empty($_POST['egzIl'])){
        $_SESSION['error_send'] = 'Podaj ilość egzaminów';
        header('Location: page.php');
        exit();
    }
    
}else{
    if(empty($_POST['egzIl'])){
        $_SESSION['error_send'] = 'Podaj ilość egzaminów';
        header('Location: page.php');
        exit();
    }elseif(intval($_POST['egzIl']) < 1){
        $_SESSION['error_send'] = 'Ilość egzaminów musi być większa od 0';
        header('Location: page.php');
        exit();
    }
}

require_once('conn.php');
try{
    $conn = new mysqli($hostname,$username,$password,$dbname);
    $sql = "insert into egzamin(kwalifikacja, typ) values('".$_POST['egzKwal']."','".$_POST['egzTp']."');";
    for ($i = 0; $i < intval($_POST['egzIl']);$i++){
        $conn->query($sql);
    }
    header('Location: page.php');
    $conn->close();
    exit();
}catch(mysqli_sql_exception $e){
    $_SESSION['error_send'] = $e;
    header('Location: page.php');
    exit();
}
?>
