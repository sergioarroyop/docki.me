<?php

function imagelist(){
    shell_exec("../bashscripts/VerImagenes.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select fecha, ImageID, Repository, Created, concat(round(Size/ (1024 * 1024 )),'MB') as Size, Version from imagelist;";
    $resultado=mysqli_query($conexion,$consulta);

    while ($line=mysqli_fetch_array($resultado)){
        $fecha=$line["fecha"];
        $id=$line["ImageID"];
        $idmod=substr($line["ImageID"],0,12);
        $repository=$line["Repository"];
        $created=$line["Created"];
        $size=$line["Size"];
        $version=$line["Version"];
            
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
            echo "<td>$repository</td>";
            echo "<td>$size</td>";
            echo "<td>$created</td>";
            echo "<td>$version</td>";
        echo "</tr>";
        
    }

    mysqli_close($conexion);
}

?>