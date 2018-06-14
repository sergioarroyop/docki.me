<?php

function servicelist(){
    shell_exec("../bashscripts/VerServicios.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select * from servicelist;";
    $resultado=mysqli_query($conexion,$consulta);

    while ($line=mysqli_fetch_array($resultado)){
        $fecha=$line["fecha"];
        $id=$line["ID"];
        $idmod= substr($id,0,12);
        $name=$line["Name"];
        $scheduling=$line["Mode"];
        $replica=$line["Replicas"];
        $image=$line["Image"];
        $ports=$line["Port"];
	$stack=$line["stack"];
            
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
            echo "<td>$replica</td>";
	    echo "<td>$stack</td>";
            echo "<td>$image</td>";
            echo "<td>$scheduling</td>";
            echo "<td>$ports</td>";
        echo "</tr>";
        
    }

    mysqli_close($conexion);
}

?>
