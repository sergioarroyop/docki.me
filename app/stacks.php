<?php
include_once '../includes/connections/db_connect.php';
include_once '../includes/connections/functions.php';
include_once '../includes/utils/buttons.php';
include_once '../scripts/listastacks.php';

sec_session_start();
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stacks | docki.me</title>
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
                        <a class="nav-link active" href="#">
                            <h3 class="title text-center">Stacks</h3>
                        </a>
                    </nav>
                </div>
                <div class="col-6 my-auto d-none d-md-block ">
                    <a href="../includes/logout.php"><button class="btn d-none btn-general d-sm-block float-right mr-5" type="button"> Logout <i class="fas fa-sign-out-alt"></i></button></a>
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
				                <div class="row no-gutters pb-3">
                                    <div class="col-6">
                                        <i class="fas fa-cubes"></i> Stacks
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button id="refresh" class="btn btn-primary"><i class="fas fa-retweet"></i> Refresh</button>
                                    </div>
                                </div>
                                <form method="post" action="../includes/utils/buttons.php">
                                    <div class="row no-gutters">
                                        <div class="col-12 table-div">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="w-25 pl-2"></th>
                                                        <th>Name</th>
                                                        <th>Services</th>
                                                    </tr>
                                                    <?php
                                                        stackslist();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-12 col-md-6 ml-2 mb-3 mt-3 mt-md-0 text-center">
                                            <button id="TableRefresh" name="stacks" type="submit" class="btn btn-danger text-white" value="delete"><i class="far fa-trash-alt text-white"></i> Delete</button>
                                        </div>
                                        <div class="col-12 col-md-5 mb-3 ">
                                            <a class="btn btn-block btn-info" href="createstacks"><i class="fas fa-plus"></i> Create stack</a>
                                        </div>
                                    </div>
			                    </form>
                            </div>
                        </div>
                    </div>
            <!-- default -->
        </div>
        <!-- SCRIPTS -->
	<script type="text/javascript" src="../src/js/general/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../src/js/general/popper.min.js"></script>
        <script type="text/javascript" src="../src/js/general/bootstrap.min.js"></script>
        <script type="text/javascript" src="../src/js/general/jqmeter.min.js"></script>
        <script type="text/javascript" src="../src/js/scripts.js"></script>
	<script type="text/javascript" src="../src/js/refresh.js"></script>
        <?php else : header('Location: ../index.php'); endif; ?>
    </body>

    </html>
