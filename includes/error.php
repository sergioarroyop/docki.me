<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    header('Location: ../index.php?error2=ErrorInicioSesion');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Swarmboard</title>
        <!-- CSS -->
        <!-- Font Awesome -->
        <link href="/src/css/general/css/fontawesome-all.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="/src/css/general/bootstrap.min.css" rel="stylesheet">
        <link href="/src/css/style.css" rel="stylesheet">
    </head>
    <body>
    </body>
</html>