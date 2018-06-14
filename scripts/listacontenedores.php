<?php

function containerlist(){
    shell_exec("../bashscripts/VerContenedores.sh");
    
    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select * from containerlist;";
    $resultado=mysqli_query($conexion,$consulta);

    while ($line=mysqli_fetch_array($resultado)){
        $fecha=$line["fecha"];
        $id=$line["ContainerID"];
        $idmod=substr($id,0,12);
        $image=$line["Image"];
        $command=$line["Command"];
        $created=$line["Created"];
        $status=$line["Status"];
        $port=$line["Ports"];
        $name=$line["Names"];
        $ip=$line["Ip"];

        if($status == 'running'){

            $status = '<span style="color: green">'.$status.'</span>'; 

        }else {

            $status = '<span style="color: red">'.$status.'</span>'; 
        }
            
        echo "<tr>";
            echo "
                <td> 
                    <label class=\"custom-control custom-checkbox\">
                        <input name=\"id[]\" type=\"checkbox\" class=\"custom-control-input\" value=\"$id\">
                        <span class=\"custom-control-indicator\"></span>
                    </label>
                </td>
            ";
            echo "<td>$idmod</td>";
            echo "<td>$name</td>";
            echo "<td>$status</td>";
            echo "<td>$command</td>";
            echo "<td>$image</td>";
            echo "<td>$ip</td>";
            echo "<td>$port</td>";
        echo "</tr>";
        
    }

    mysqli_close($conexion);
    
}

?>