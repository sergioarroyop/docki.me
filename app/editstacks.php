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
        <!-- CodeMirror -->
        <link href="../src/js/general/codemirror/lib/codemirror.css" rel="stylesheet">
        <link href="../src/js/general/codemirror/addon/lint/lint.css" rel="stylesheet">
        <link href="../src/js/general/codemirror/theme/ambiance.css" rel="stylesheet">
        <link href="../src/js/general/codemirror/theme/paraiso-light.css" rel="stylesheet">
        <!-- CSS extras -->
        <link href="../src/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="../src/js/general/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../src/js/general/popper.min.js"></script>
        <script type="text/javascript" src="../src/js/general/bootstrap.min.js"></script>
        <script type="text/javascript" src="../src/js/general/jqmeter.min.js"></script>
        <script type="text/javascript" src="../src/js/general/codemirror/lib/codemirror.js"></script>
        <script type="text/javascript" src="../src/js/general/codemirror/mode/yaml/yaml.js"></script>
        <script type="text/javascript" src="../src/js/general/codemirror/addon/lint/lint.js"></script>
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
                <?php include '../includes/utils/sideNav.php'; ?>
                    <div id="ContentContainers" class="container-fluid mt-3 mb-3">
                        <div class="card card-top d-flex">
                            <div class="card-header">
                                <i class="fas fa-edit"></i> Edit stack
                            </div>
                           <form method="post" action="../includes/utils/buttons.php">
                            <div class="row p-2">
                                <div class="col-12">
                                   <div class="form-row">
                                       <div class="form-group col-12">
                                           <label for="namestack"></label>
                                           	<input class="form-control" type="text" <?php 
                                           			echo 'value="' . $_GET['stack'] . '"';
                                           		 ?> name="namestack">
                                           	
                                       </div>
                                   </div>
                                   <hr>
                                   <!--<div class="form-row">
                                       <div class="form-group col-12">
                                           <label for="network">File Upload</label>
                                           <input type="file" class="form-control-file" id="stackFile">
                                       </div>
                                   </div>-->
                                   <div class="form-row">
                                      <div class="form-group col-12">
                                         <label for="stacktextupd">Stack file</label>
                                        <?php stackedit(); ?>
                                      </div>
                                   </div>
                                   <hr>
                                   <div class="form-row">
                                       <div class="form-group col-12 d-flex justify-content-end mt-2">
                                           <button name="stacks" value="update" type="submit" class="btn btn-success">Update</button> 
                                       </div>
                                       <div class="col-12">
                                         <?php
                                            if(isset($_GET['errorfile'])){
                                             echo '<div class="alert alert-danger mb-1 mt-1 text-center" role="alert">Yaml vacío</div>';
                                            }
                                         ?>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- default -->
        </div>
        <!-- SCRIPTS -->
    <script>
      $(document).ready(function(){
        var code = $("#stack-creation-editor")[0];
        var editor = CodeMirror.fromTextArea(code, {
          lineNumbers: true,
          firstLineNumber: 1,
          fixedGutter: true,
          lineWrapping: true,
          tabindex: "2",
          gutter: true,
          mode: "yaml",
          lint: true,
          theme: "ambiance",
        });
      });
    </script>
        <?php else : header('Location: ../index.php'); endif; ?>
    </body>

    </html>
