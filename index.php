<?php
include_once 'includes/connections/db_connect.php';
include_once 'includes/connections/functions.php';
 
sec_session_start();

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="icon" href="./src/img/cargo-ship.png" type="image/gif" sizes="32x32">
        <title>docki.me</title>
        <!-- CSS -->
        <!-- Font Awesome -->
        <link href="src/css/general/fontawesome-all.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="src/css/general/bootstrap.min.css" rel="stylesheet">
        <link href="src/css/style.css" rel="stylesheet">
        <!--JS-->
        <script type="text/javascript" src="src/js/general/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="src/js/general/popper.min.js"></script>
        <script type="text/javascript" src="src/js/general/bootstrap.min.js"></script>
        <script type="text/javascript" src="src/js/general/forms.js"></script>
        <script type="text/javascript" src="src/js/general/sha512.js"></script>
    </head>

    <body>
        <div class="container pt-5 mt-5">
            <div clas="row">
                <div class="col-12 col-md-6 mx-auto">
                    <div class="card card-login p-4">
                        <h3 class="text-center">docki.me</h3>
                        <form action="includes/connections/process_login.php" method="post" name="login_form">
                            <div class="form-group">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                    </div>
                                    <input class="form-control" type="text" name="username" placeholder="Usuario" />
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                    </div>
                                    <input id="PassInput" class="form-control" type="password" name="password" placeholder="Contraseña" />
                                </div>
                                <?php
                                            if (isset($_GET['error'])) {
                                                echo '<div class="alert alert-danger mb-1 mt-1" role="alert"><strong>Ops :( -</strong> Usuario o contraseña incorrectos.</div>';
                                            }
                                        
                                            if (isset($_GET['error1'])) {
                                                echo '<div class="alert alert-danger mb-1 mt-1" role="alert"><strong>Ops :( -</strong> Especifica usuario y contraseña.</div>';
                                            }
                                        
                                            if (isset($_GET['error2'])) {
                                                echo '<div class="alert alert-danger mb-1 mt-1" role="alert"><strong>Ops :( -</strong> Error de inicio de sesión.</div>';
                                            }
                                        ?>
                                    <button id="logInBtn" class="btn btn-general mt-1 btn-block" type="submit" value="Login" onclick="formhash(this.form, this.form.password);">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
