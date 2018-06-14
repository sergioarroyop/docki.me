<?php
include_once '../includes/connections/db_connect.php';
include_once '../includes/connections/functions.php';
include_once '../scripts/clusterlist.php';

sec_session_start();
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cluster Live | docki.me</title>
        <!-- CSS -->
        <!-- Font Awesome -->
        <link href="../src/css/general/fontawesome-all.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../src/css/general/bootstrap.min.css" rel="stylesheet">
        <!-- CSS extras -->
        <link href="../src/css/style.css" rel="stylesheet">
    </head>

    <body>
        <?php if (login_check($mysqli) == true) : ?>
        <div class="container-fluid d-flex nav-top p-0">
            <div class="row w-100 no-gutters">
                <div class="col-12 d-block d-md-none">
                    <?php
                        include '../includes/utils/navbar.php';
                    ?>
                </div>
                <div class="col-12 col-sm-6 p-0 d-none d-md-block">
                    <nav class="nav justify-content-between">
                        <a class="nav-link active" href="cluster_live">
                            <h3 class="title text-center">Cluster Live</h3>
                        </a>
                    </nav>
                </div>
                <div class="col-6 my-auto d-none d-md-block ">
                    <a href="../includes/logout"><button class="btn d-none btn-general d-sm-block float-right mr-5" type="button"> Logout <i class="fas fa-sign-out-alt"></i></button></a>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <?php
                    include '../includes/utils/sideNav.php';
                ?>
                <div id="ContentContainers" class="container-fluid mt-3">
                    <div class="card card-top">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <a href="swarm"><button class="btn buttonBack"><i class="fas fa-arrow-left"></i> Go Back</button></a>
                                </div>
                                <div class="col-12 col-sm-6 mt-2 my-auto text-center">
                                    <i class="fab fa-rebel"></i> Cluster Live <i class="fab fa-rebel"></i>
                                </div>
                                <div class="col-3">
                                </div>
                            </div>
                        </div>
                        <div id="ClusterLive" class="card-body pt-0">
                            <div class="row justify-content-center">
                                <?php
                                
                                clusterlist();
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- default -->
        </div>
        <!-- SCRIPTS -->
        <?php else : header('Location: ../index.php'); endif; ?>
        <script type="text/javascript" src="../src/js/general/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../src/js/general/popper.min.js"></script>
        <script type="text/javascript" src="../src/js/general/bootstrap.min.js"></script>
        <script type="text/javascript" src="../src/js/general/jqmeter.min.js"></script>
        <script type="text/javascript" src="../src/js/scripts.js"></script>
        <script type="text/javascript" src="../src/js/refresh.js"></script>        
    </body>

    </html>
