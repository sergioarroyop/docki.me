<?php

function swarmlist(){
    shell_exec("../bashscripts/VerDashboard.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select count(ID) as Nodes, concat(round(sum(Mem/ (1024 * 1024 * 1024))),'GB') as Memory, sum(CPU/1000000000) as CPUs from nodelist;";
    $resultado=mysqli_query($conexion,$consulta);
        
    for ($cont=1, $state="active";$line=mysqli_fetch_array($resultado);$state="fade"){

        $nodos=$line["Nodes"];
        $Memory=$line["Memory"];
        $CPU=$line["CPUs"];    
    }

    echo    '<tr>
                <td>Nodes</td>';
    echo        '<td>'.$nodos.'</td>
            </tr>
            <tr>';
    echo   '</tr>
           <tr>
               <td>Total Swarm Memory</td>';
    echo        '<td>'.$Memory.'</td>
           </tr>
           <tr>
               <td>Total Swarm CPU</td>';
    echo        '<td>'.$CPU.'</td>
           </tr>';

    mysqli_free_result($resultado);

    mysqli_close($conexion);

}

function nodeswarmlist(){
    shell_exec("../bashscripts/VerDashboard.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select  Hostname, Role, concat(round(Mem/ (1024 * 1024 * 1024)),'GB') as Memory, (CPU/1000000000) as CPUs, IP, Status from nodelist order by Hostname;";
    $resultado=mysqli_query($conexion,$consulta);
        
    for ($cont=1, $state="active";$line=mysqli_fetch_array($resultado);$state="fade"){

        $hostname=$line["Hostname"];
        $role=$line["Role"];
        $Memory=$line["Memory"];
        $CPU=$line["CPUs"];
        $IP=$line["IP"];
        $Status=$line["Status"];

        if($Status == 'ready'){

            $Status = '<span style="color: green">'.$Status.'</span>'; 

        }else {

            $Status = '<span style="color: red">'.$Status.'</span>'; 
        }

        echo    '<tr>
                    <td>'.$hostname.'</td>     
                    <td>'.$role.'</td>
                    <td>'.$CPU.'</td>
                    <td>'.$Memory.'</td>
                    <td>'.$IP.'</td>
                    <td>'.$Status.'</td>
                </tr>';
    }

    mysqli_free_result($resultado);

    mysqli_close($conexion);

}

?>