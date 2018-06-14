<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start();
 
if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; 
 
    if (login($username, $password, $mysqli) == true) {
        header('Location: ../../app/dashboard');
    } else {
        header('Location: ../../index.php?error=UsuarioContraseñaIncorrectos');
    }
} else {
    header('Location: ../../index.php?error1=EspecificaUsuarioyContraseña');
}

?>
