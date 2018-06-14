<?php

function networklist(){
    shell_exec("../bashscripts/VerNetwork.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select * from networklist;";
    $resultado=mysqli_query($conexion,$consulta);

    while ($line=mysqli_fetch_array($resultado)){
        $fecha=$line["fecha"];
        $id=$line["NetworkID"];
        $idmod=substr($id,0,12);
        $name=$line["Name"];
        $subnet=$line["Subnet"];
        $gateway=$line["Gateway"];
        $driver=$line["Driver"];
        $scope=$line["Scope"];
            
        echo "<tr>";
            echo "<tr>";
            echo "
                <td> 
                    <label class=\"custom-control custom-checkbox\">
                        <input name=\"id[]\" type=\"checkbox\" class=\"custom-control-input\" value=\"$id\">
                        <span class=\"custom-control-indicator\"></span>
                    </label>
                </td>
            ";
            echo "<td>$name</td>";
            echo "<td>$scope</td>";
            echo "<td>$driver</td>";
            echo "<td>$subnet</td>";
            echo "<td>$gateway</td>";
        echo "</tr>";
        
    }

    mysqli_close($conexion);
}

?>