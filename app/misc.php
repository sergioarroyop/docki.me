<?php
include_once '../includes/connections/db_connect.php';
include_once '../includes/connections/functions.php';
include_once '../scripts/listaimagenes.php';
include_once '../scripts/listavolumenes.php';
include_once '../scripts/listanetworks.php';

sec_session_start();
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Miscellaneous | docki.me</title>
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
                            <h3 class="title text-center">Miscellaneous</h3>
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
                            <ul class="nav nav-tabs card-header-tabs pull-right" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="true"><i class="far fa-file-image"></i> Images</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="volumes-tab" data-toggle="tab" href="#volumes" role="tab" aria-controls="volumes" aria-selected="false"><i class="fas fa-database"></i> Volumes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="networks-tab" data-toggle="tab" href="#networks" role="tab" aria-controls="networks" aria-selected="false"><i class="fas fa-sitemap"></i> Networks</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="images" role="tabpanel" aria-labelledby="images-tab">
                                    <div class="container-fluid">
                                       
                                       <form method="post" action="../includes/utils/buttons.php">
                                       
                                        <h4 class="text-center">Images</h4>
                                        <div class="row no-gutters table-div">
                                            <div class="col-12 ml-sm-0">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Created</th>
                                                            <th scope="col">Version</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        <?php imagelist() ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12 col-md-6 ml-2 mb-3 mt-3 mt-md-0 text-center">
                                                <button name="image" type="submit" class="btn btn-danger" value="remove"><i class="far fa-trash-alt"></i> Remove</button>
                                            </div>
                                            <div class="col-12 col-md-5 mb-3 ">
                                                <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#buildImg"><i class="fas fa-edit"></i> Build new Image</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="buildImg" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-center">Image Builder</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="m-0">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="nameImg">Name</label>
                                                                            <input type="nameImg" class="form-control" id="nameImg" placeholder="Image name">
                                                                            <small>The name must be specified in one of the following formats: <strong>imagename:tag</strong>, <strong>repository/imagename:tag</strong> or <strong>registryfqdn:port/repository/imagename:tag</strong> . If not the default <strong>:latest</strong> will be applied.</small>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-12">
                                                                            <label for="builder">Builder</label>
                                                                            <textarea class="form-control" rows="13" id="builder">Define Dockerfile</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class=""modal-footer">
                                                                        <div class="form-group col-12 d-flex justify-content-end mt-2">
                                                                            <button type="button" class="btn mr-2" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success">Build</button>
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
                                <div class="tab-pane fade" id="volumes" role="tabpanel" aria-labelledby="volumes-tab">
                                    <div class="container-fluid">
                                       
                                       <form method="post" action="../includes/utils/buttons.php">
                                       
                                        <h4 class="text-center">Volumes</h4>
                                        <div class="row no-gutters table-div">
                                            <div class="col-12 ml-sm-0">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Driver</th>
                                                            <th scope="col">Mount point</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php volumelist() ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12 col-md-6 ml-2 mb-3 mt-3 mt-md-0 text-center">
                                                <button name="volume" type="submit" class="btn btn-danger" value="remove"><i class="far fa-trash-alt"></i> Remove</button>
                                            </div>
                                            <div class="col-12 col-md-5 mb-3 ">
                                                <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#addVolume"><i class="fas fa-plus"></i> Add Volume</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="addVolume" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-center">Create Volume</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!--<form class="m-0">-->
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-10">
                                                                            <label for="nameVolume">Name</label>
                                                                            <input type="nameVolume" class="form-control" id="nameVolume" placeholder="Volume Name">
                                                                        </div>
                                                                        <div class="form-group col-5 col-sm-2">
                                                                            <label for="driverVol">Driver:</label>
                                                                            <select class="form-control" id="driverVol">
                                                                              <option>local</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="form-row">
                                                                        <label for="mountpoint">Driver Point:</label>
                                                                        <div class="input-group col-12 col-md-12 mb-2">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Mount point</div>
                                                                            </div>
                                                                            <input type="text" class="form-control" id="mountpoint" placeholder="mountpoint">
                                                                        </div>
                                                                        <div class="input-group col-12 col-md-12 mb-2">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Host</div>
                                                                            </div>
                                                                            <input type="text" class="form-control" id="pathtocont" placeholder="path/on/host">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="form-group col-12 d-flex justify-content-end mt-2">
                                                                            <button type="button" class="btn mr-2" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-success">Create</button>
                                                                        </div>
                                                                    </div>
                                                                <!--</form>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Modal -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="networks" role="tabpanel" aria-labelledby="networks-tab">
                                    <div class="container-fluid">
                                       
                                       <form method="post" action="../includes/utils/buttons.php">
                                       
                                        <h4 class="text-center">Networks</h4>
                                        <div class="row no-gutters table-div">
                                            <div class="col-12 ml-sm-0">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Scope</th>
                                                            <th scope="col">Driver</th>
                                                            <th scope="col">Subnet</th>
                                                            <th scope="col">Gateway</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php networklist() ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12 col-md-6 ml-2 mb-3 mt-3 mt-md-0 text-center">
                                                <button name="network" type="submit" class="btn btn-danger" value="remove"><i class="far fa-trash-alt"></i> Remove</button>
                                            </div>
                                            <div class="col-12 col-md-5 mb-3 ">
                                                <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#addNetwork"><i class="fas fa-plus"></i> Add Network</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="addNetwork" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-center">Create Network</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="m-0">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-10">
                                                                            <label for="netName">Name</label>
                                                                            <input type="nameVolume" name="name" class="form-control" id="netName" placeholder="Network name">
                                                                        </div>
                                                                        <div class="form-group col-5 col-sm-2">
                                                                            <label for="driverVol">Driver:</label>
                                                                            <select name="drive" class="form-control" id="driverVol">
                                                                                <option>bridge</option>
                                                                                <option>host</option>
                                                                                <option>macvlan</option>
                                                                                <option>null</option>
                                                                                <option>overlay</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="form-row">
                                                                        <label>Network Config:</label>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-6">
                                                                            <label for="subnet">Subnet:</label>
                                                                            <input type="nameVolume" name="subnet" class="form-control" id="subnet" placeholder="192.168.0.0/16">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="gateway">Gateway:</label>
                                                                            <input type="nameVolume" name="gateway" class="form-control" id="gateway" placeholder="192.168.0.1/16">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="form-group col-12 d-flex justify-content-end mt-2">
                                                                           <button type="button" class="btn btn-default mr-2" data-dismiss="modal">Close</button>
									                                       <button type="submit" name="network" value="create" class="btn btn-success">Create</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Modal -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                </div>
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
