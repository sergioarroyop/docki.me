<?php
ini_set('display_errors', 1);
include_once 'register.inc.php';
include_once '../connections/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <script type="text/JavaScript" src="../../src/js/general/sha512.js"></script> 
        <script type="text/JavaScript" src="../../src/js/general/forms.js"></script>
        <link rel="stylesheet" href="../../src/css/style.css" />
    </head>
    <body>

        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input type='text' 
                name='username' 
                id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="submit" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p><a href="../../index.php">login page</a>.</p>
    </body>
</html>