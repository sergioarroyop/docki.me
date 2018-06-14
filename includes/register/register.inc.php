<?php
ini_set('display_errors', 1);
include_once '../connections/db_connect.php';
include_once '../connections/psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error_msg .= '<p class="error">El email introducido no es valido</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {

        $error_msg .= '<p class="error">Contraseña no valida</p>';
    }
 
    $prep_stmt = "SELECT id FROM users WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            $error_msg .= '<p class="error">Ya existe un usuario con este email</p>';
                        $stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 

    $prep_stmt = "SELECT id FROM users WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {

                    $error_msg .= '<p class="error">Usuario con este ya existe</p>';
                        $stmt->close();
                }
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }
 
 
    if (empty($error_msg)) {
 
        
        $password = password_hash($password, PASSWORD_BCRYPT);
 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)")) {
            $insert_stmt->bind_param('sss', $username, $email, $password);

            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}
?>