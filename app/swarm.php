<?php
include_once '../includes/connections/db_connect.php';
include_once '../includes/connections/functions.php';
include_once '../scripts/listaswarm.php';

sec_session_start();
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Swarm | docki.me</title>
        <!-- CSS -->
        <!-- Font Awesome -->
        <link href="../src/css/general/fontawesome-all.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../src/css/general/bootstrap.min.css" rel="stylesheet">
        <!-- CSS extras -->
        <link href="../src/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="../src/js/general/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../src/js/general/popper.min.js"></script>
        <script type="text/javascript" src="../src/js/general/bootstrap.min.js"></script>
        <script type="text/javascript" src="../src/js/general/jqmeter.min.js"></script>
        <script type="text/javascript" src="../src/js/scripts.js"></script>
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
                        <a class="nav-link active" href="#">
                            <h3 class="title text-center">Swarm</h3>
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
                            <i class="far fa-clipboard"></i> Cluster information:
                        </div>
                        <table class="table mb-0">
                            <tbody>
                                <?php swarmlist() ?>
                            </tbody>
                        </table>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a style="text-decoration: none;" href="cluster_live"><button type="button" class="btn btn-block btn-info"><i class="fab fa-rebel"></i> Cluster Live <i class="fab fa-rebel"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ContentContainers" class="container-fluid mt-3">
                    <div id="node" class="card">
                        <div class="card-header">
                            <i class="far fa-hdd"></i> Nodes
                        </div>
						<div class="row no-gutters">
						<div class="col-12 table-div">
                        <table class="table mb-0">
                            <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>CPU</th>
                                        <th>Memory</th>
                                        <th>IP Address</th>
                                        <th>Status</th>
                                    </tr>
                                <?php nodeswarmlist() ?>
                            </tbody>
                        </table>
						</div>
						</div>
                    </div>
                </div>
            </div>
            <!-- default -->
        </div>
        <!-- SCRIPTS -->
        <?php else : header('Location: ../index.php'); endif; ?>
    </body>

    </html>
