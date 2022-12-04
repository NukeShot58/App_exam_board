<?php 
    session_start();
    
?>
<?php
require_once('conn.php');
if(isset($_POST['pass']) and isset($_POST['login'])){
    if(empty($_POST['login']) or empty($_POST['pass'])){
        $_SESSION['error_login'] = "Podaj login i hasło";
        header('Location: index.php');
        exit();
    }
}else{
    $_SESSION['error_login'] = '???';
    header('Location: index.php');
    exit();
}

try{
    $conn = new mysqli($hostname, $username, $password, $dbname);
    $sql = "select haslo from users where login='".$_POST['login']."';";
    // "' and haslo='". password_hash($_POST['pass'],PASSWORD_DEFAULT)
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $rekord = $result->fetch_array(MYSQLI_ASSOC);
        if(!password_verify($_POST['pass'], $rekord['haslo'])){
            $_SESSION['error_login'] = 'Niepoprawne hasło';
            header('Location: index.php');
            exit();
        }
    }else{
        $_SESSION['error_login'] = 'Zły login';
        header('Location: index.php');
        exit();
    }
    $_SESSION['login'] = $_POST['login'];
    header('Location: page.php');
    $conn->close();
    exit();
}catch(mysqli_sql_exception $e){
    $_SESSION['error_login'] = $e;
    header('Location: index.php');
    $conn->close();
    exit();
}
?>