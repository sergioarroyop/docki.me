<?php

function nodelist(){
    shell_exec("../bashscripts/VerDashboard.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select Role from nodelist order by Role asc;";
    $resultado=mysqli_query($conexion,$consulta);

    echo '<div class="card-header">';
    echo '<ul class="nav nav-tabs card-header-tabs pull-right" id="myTab" role="tablist">';
    
    for ($cont=1, $state="true", $controls="home", $link="active";$line=mysqli_fetch_array($resultado);$state="false", $controls="contact", $link=""){
        $role=$line["Role"];
        
        if ($role=="worker"){
            $role=$role . " " . $cont;
            $cont++;
        }
        
        echo '<li class="nav-item">';
        echo "<a class=\"nav-link $link\" id=\"$role-tab\" data-toggle=\"tab\" href=\"#$role\" role=\"tab\" aria-controls=\"$controls\" aria-selected=\"$state\">" . ucwords($role) . "</a>";
        echo '</li>';
    }
    
    echo '</ul>';
    echo '</div>';
    
    mysqli_free_result($resultado);
    
    $consulta="select * from nodelist order by Role asc;";
    $resultado=mysqli_query($conexion,$consulta);
    
    echo '<div class="card-body">';
    echo '<div class="tab-content" id="manager-tab">';
    
    for ($cont=1, $state="active";$line=mysqli_fetch_array($resultado);$state="fade"){
        $fecha=$line["fecha"];
        $id=$line["ID"];
        $hostname=$line["Hostname"];
        $os=$line["OS"];
        $ip=$line["IP"];
        $docker=$line["Docker"];
        $role=$line["Role"];
        
        if ($role=="worker"){
            $role=$role . " " . $cont;
            $cont++;
        }
        
        echo "<div class=\"tab-pane $state\" id=\"$role\" role=\"tabpanel\" aria-labelledby=\"contact-tab\">";
        echo '
            <div class="container-fluid">
                <h4 class="text-center">Server Information</h4>
                    <div class="row no-gutters">
                        <div class="col-12 col-md-5 ml-sm-0">
                            <ul class="list-group list-group-flush w-sm-75">
            ';
        echo "<li class=\"list-group-item\">Hostname: $hostname</li>";
        echo "<li class=\"list-group-item\">OS: $os</li>";
        echo "<li class=\"list-group-item\">IP Address: $ip</li>";
        echo "<li class=\"list-group-item\">Docker Version: $docker</li>";
                                                    
        echo '                                            
                    </ul>
                </div>
                <div class="col-12 col-md-7 mt-3 mt-md-0 justify-content-end">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            ';
        
        if ($role=="manager"){
            echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';
        }
        echo '
        
                </div>
            </div>
        </div>
    </div>
            ';                                                  
    }
    
    echo '</div>';
    echo '</div>';
    
}

?>