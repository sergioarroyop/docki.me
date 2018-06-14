<?php

function stackslist(){
    shell_exec("../bashscripts/VerStacks.sh");
    
    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select * from stacklist;";
    $resultado=mysqli_query($conexion,$consulta);

    while ($line=mysqli_fetch_array($resultado)){
        $fecha=$line["fecha"];
        $name=$line["Name"];
        $services=$line["Services"];
            
echo <<<INITABLA
            
            <tr>
                <td> 
                    <label class="custom-control custom-checkbox">
                        <input name="name[]" type="checkbox" class="custom-control-input" value="$name">
                        <span class="custom-control-indicator"></span>
                    </label>
                </td>
                <td><a href="../app/editstacks?stack=$name">$name</a></td>
                <td>$services</td>
            </tr>

INITABLA;
        
    }

    mysqli_close($conexion);
    
}

function stackedit(){

    $name = $_GET['stack'];
    $ext = "yml";
    $stackfileex = "$name.$ext";

    $textarea = shell_exec("cat ../src/yamlfiles/$stackfileex");

echo <<<INITEXTAREA

        <textarea name="stacktextupd" type="text" id="stack-creation-editor">$textarea</textarea>

INITEXTAREA;

}

?>
