<?php

function volumelist(){
    shell_exec("../bashscripts/VerVolumes.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select * from volumelist;";
    $resultado=mysqli_query($conexion,$consulta);

    while ($line=mysqli_fetch_array($resultado)){
        $fecha=$line["fecha"];
        $name=$line["Volumen"];
        $namemod=substr($name,0,12);
        $driver=$line["Driver"];
        $mountpoint=$line["MountPoint"];
        echo "<tr>";
            echo "
                <td> 
                    <label class=\"custom-control custom-checkbox\">
                        <input name=\"name[]\" type=\"checkbox\" class=\"custom-control-input\" value=\"$name\">
                        <span class=\"custom-control-indicator\"></span>
                    </label>
                </td>
            ";
            echo "<td>$namemod</td>";
            echo "<td>$driver</td>";
            echo "<td>$mountpoint</td>";
        echo "</tr>";
        
    }

    mysqli_close($conexion);
}

?>