<?php
include_once '../includes/connections/db_connect.php';
include_once '../includes/connections/functions.php';
include_once '../includes/utils/buttons.php';
include_once '../scripts/listaservices.php';

sec_session_start();
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Services | docki.me</title>
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
                            <h3 class="title text-center">Services</h3>
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
				                <div class="row no-gutters">
					                <div class="col-6">
                                        <i class="fas fa-hdd"></i> Services
                                    </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <button id="refresh" class="btn btn-primary"><i class="fas fa-retweet"></i> Refresh</button>
                                </div>
                            </div>
                        </div> 
                            <form method="post" action="../includes/utils/buttons.php">                            
                                <div class="row no-gutters">
                                    <div class="col-12 ml-sm-0 table-div">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Replicas</th>
                                                    <th scope="col">Stacks</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Scheduling</th>
                                                    <th scope="col">Ports</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php servicelist() ?>               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="row p-2">
                                <div class="col-12 col-md-6 ml-2 mb-3 mt-3 mt-md-0 text-center">
                                    <button name="service" id="TableRefresh" type="submit" class="btn btn-danger" value="delete"><i class="far fa-trash-alt"></i> Delete</button>
                                </div>
                                <div class="col-12 col-md-5 mb-3 ">
                                    <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#createCont"><i class="fas fa-plus"></i> Create service</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="createCont" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-center"><i class="fas fa-edit"></i> Create Service</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="m-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="nameServ">Name</label>
                                                                <input name="name" type="nameServ" class="form-control" id="inameServ" placeholder="Service name">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="imgServ">Imagen</label>
                                                                <input name="image" type="text" class="form-control" id="imgServ" placeholder="Image name">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-12 col-md-2">
                                                                <label for="Scheduling">Scheduling</label>
                                                            </div>
                                                            <div class="form-group col-5 col-md-1 ml-3 ml-md-0 mr-2">
                                                                <label class="form-check-label" for="global">
                                                                    <input value="global" type="radio" class="form-check-input" name="scheduling" checked>Global
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-5 col-md-1">
                                                                <label class="form-check-label" for="replicated">
                                                                    <input type="radio" class="form-check-input" name="scheduling" id="replicated">Replicated
                                                                </label>
                                                            </div>
                                                            <div id="replicated2" style="display: none;" class="form-group col-12">
                                                                <label for="replicas">Replicas</label>
                                                                <input name="replicas" type="number" class="form-control" id="Numreplicas" min="0">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="networkServ">Network</label>
                                                                <input name="network" type="text" class="form-control" id="networkServ" placeholder="Network">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="portcServ">Cont. Port</label>
                                                                <input name="contport" type="text" class="form-control" id="portcServ" placeholder="Container Port">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="porthServ">Host Port</label>
                                                                <input name="hostport" type="text" class="form-control" id="porthServ" placeholder="Host Port">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="form-group col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                                <label for="volumeServ">Select Volume <i class="fas fa-arrow-right"></i></label>
                                                            </div>
                                                            <div class="form-group col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                                                <label class="custom-control custom-checkbox my-auto">
                                                        <input type="checkbox" class="custom-control-input" id="checkbind" onclick="bind()">
                                                        <span class="custom-control-indicator"></span> Bind
                                                        </label>
                                                            </div>
                                                            <div class="form-group col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                                <label class="custom-control custom-checkbox my-auto">
                                                        <input type="checkbox" class="custom-control-input" id="checkvol" onclick="vol()">
                                                        <span class="custom-control-indicator"></span> Volumen
                                                        </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="divbind" style="display: none;">
                                                            <div class="input-group col-12 col-md-12 mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">Host</div>
                                                                </div>
                                                                <input name="volume_bindhost" type="text" class="form-control" id="pathtohost" placeholder="Path/in/host">
                                                            </div>
                                                            <div class="input-group col-12 col-md-12 mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">Container</div>
                                                                </div>
                                                                <input name="volume_bindcontainer" type="text" class="form-control" id="pathtocont" placeholder="Path/in/cont">
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="divvol" style="display: none;">
                                                            <div class="input-group col-12 mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">Container</div>
                                                                </div>
                                                                <input name="volume_volumencontainer" type="text" class="form-control" id="pathtocont" placeholder="Path/in/cont">
                                                            </div>
                                                            <div class="input-group col-12 mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">Volume</div>
                                                                </div>
                                                                <input name="volume_volumenvolume" type="text" class="form-control" id="volume_name" placeholder="Volume name">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-row">
                                                            <div class="input-group col-6">
                                                                <label for="label">Labels <button id="newLabel" class="btn btn-success"><i class="fas fa-plus"></i></button></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="kvEntries">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-group col-12 d-flex justify-content-end mt-2">
                                                                <button type="button" class="btn mr-2" data-dismiss="modal">Close</button>
                                                                <button name="service" type="submit" class="btn btn-success" value="create">Create</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal -->
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
