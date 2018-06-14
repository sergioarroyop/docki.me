<?php

    $containers = (isset($_POST['containers']) ? $_POST['containers'] : $containers=null);
    $volume = (isset($_POST['volume']) ? $_POST['volume'] : $volume=null);
    $image = (isset($_POST['image']) ? $_POST['image'] : $image=null);
	$stacks = (isset($_POST['stacks']) ? $_POST['stacks'] : $stack = null);
	$network = (isset($_POST['network']) ? $_POST['network'] : $network = null);
	$service = (isset($_POST['service']) ? $_POST['service'] : $service = null);

    if ($containers == 'run'){
        
        foreach ($_POST["id"] as $clave){
		shell_exec("docker container start $clave");
        }

        header("location:../../app/containers");

        
        // RunFunction();
        
    } elseif ($containers == 'stop'){

	foreach ($_POST["id"] as $clave){
            shell_exec("docker container stop $clave");
        }

        header("location:../../app/containers");

        // StopFunction();
        
    } elseif ($containers == 'kill') {
        
        include_once '../connections/db_connect.php';
        include_once '../connections/functions.php';
        
        //Comprobar si contenedor está corriendo
        
        foreach ($_POST["id"] as $clave){
            
            $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
            $consulta="select Status from containerlist where ContainerID='$clave';";
            $resultado=mysqli_query($conexion,$consulta);
            
            while ($line=mysqli_fetch_array($resultado)){
                $status=$line["Status"];
                if ($status == "running"){
                    header("location:../../app/containers?killerror=true");
                }
                else {
                    shell_exec("docker container rm $clave");
                    header("location:../../app/containers");
                }
            }
        }
            
        // CheckRunning();
        
        //if CheckRunning == true then KillFunction() else Mensaje error
        // KillFunction();
    } elseif ($containers == 'create') {
        
        $name=$_POST["name"];
        $image=$_POST["image"];
        $network=$_POST["network"];
        $contport=$_POST["contport"];
        $hostport=$_POST["hostport"];
        $volume_bindhost=$_POST["volume_bindhost"];
        $volume_bindcontainer=$_POST["volume_bindcontainer"];
        $volume_volumencontainer=$_POST["volume_volumencontainer"];
        $volume_volumenvolume=$_POST["volume_volumenvolume"];

	$key=$_POST["key"];
        $value=$_POST["value"];
        
        $label=null;
        
        foreach ($key as $clave => $valor){
            $label="$label --label $valor=$value[$clave] ";
        }
        
        $name=(empty($name))?$name=null:$name="--name $name";
        $image=(empty($image))?$image=null:$image="$image";
        $network=(empty($network))?$network=null:$network="--network $network";
        $contport=(empty($contport))?$contport=null:$contport="$contport";
        $hostport=(empty($hostport))?$hostport=null:$hostport="$hostport";
        $label=(empty($label))?$label=null:$label="$label";

	if ($hostport==null && $contport==null){
                $port=null;
        }
        else {
                $port="-p $hostport:$contport";
        }
        
        $volume_bindhost=(empty($volume_bindhost))?$volume_bindhost=null:$volume_bindhost="$volume_bindhost";
        $volume_bindcontainer=(empty($volume_bindcontainer))?$volume_bindcontainer=null:$volume_bindcontainer="$volume_bindcontainer";
        $volume_volumencontainer=(empty($volume_volumencontainer))?$volume_volumencontainer=null:$volume_volumencontainer="$volume_volumencontainer";
        $volume_volumenvolume=(empty($volume_volumenvolume))?$volume_volumenvolume=null:$volume_volumenvolume="$volume_volumenvolume";
        
        if (!empty($volume_bindhost) && !empty($volume_bindcontainer)){
            $volumebind="--mount type=bind,source=$volume_bindhost,target=$volume_bindcontainer";
        }
        else {
            $volumebind=null;
        }
        if (!empty($volume_volumencontainer) && !empty($volume_volumenvolume)){
            $volumevolumen="--mount source=$volume_volumenvolume,target=$volume_volumencontainer";
        }
        else {
            $volumevolumen=null;
        }
            
        // $=(empty($))?$=null:$="$";
        
        shell_exec("docker container run -d $name $network $volumebind $volumevolumen $port $label $image");
        
        header("location:../../app/containers");
        
    } elseif ($volume == 'remove') {
        
        foreach ($_POST["name"] as $clave){
            echo $clave;
            shell_exec("docker volume rm $clave");
        }

        header("location:../../app/misc");
        
    } elseif ($image == 'remove') {
        
        foreach ($_POST["id"] as $clave){
            shell_exec("docker image rm $clave");
        }

        header("location:../../app/misc");
        
    } elseif ($stacks == 'create') {
		
		if(empty($_POST['stacktext'])){	
			header('location: ../../app/createstacks?errorfile=emptytext');	
		}else{
		
		$stackcontent = $_POST['stacktext'];
        $stackfile = $_POST['namestack'];
        $stackname = $_POST['namestack'];
        $extension = "yml";
        $stackfileex = "$stackfile.$extension";

        //Create an open the file
        $stackfile = fopen("../../src/yamlfiles/$stackfileex", "w") or die ("There was an error creating the file.");
        //Write the file with the content requested from post
        fwrite($stackfile, $stackcontent);

        //Close the file
        fclose($stackfile);

        $stackfile=escapeshellarg($stackfile);
        $stackname=escapeshellarg($stackname);

        //chdir('../../src/yamlfiles');

        shell_exec("docker stack deploy -c ../../src/yamlfiles/$stackfileex $stackname");

        header('Location: ../../app/stacks');
		
		}
        
	} elseif ($stacks == 'update') {

        $stackupdate = $_POST['namestack'];
        $stacktextupd = $_POST['stacktextupd'];
        $extension = "yml";
        $stackupdatename = "$stackupdate.$extension";

        $stackfile = fopen("../../src/yamlfiles/$stackupdatename", "w") or die ("There was an error creating the file.");
        //Write the file with the content requested from post
        fwrite($stackfile, $stacktextupd);

        //Close the file
        fclose($stackfile);

        shell_exec("docker stack rm $stackupdate");

        shell_exec("docker stack deploy -c ../../src/yamlfiles/$stackupdatename $stackupdate");

        header('Location: ../../app/stacks');

    } elseif ($stacks == 'delete') {

        foreach ($_POST["name"] as $clave){

            shell_exec("docker stack rm $clave");

        }

        header('Location: ../../app/stacks');

    } elseif ($network == 'remove') {
        
        foreach ($_POST["id"] as $clave){
            shell_exec("docker network rm $clave");
        }
        
        header("Location: ../../app/misc");

    } elseif ($network == 'create') {
        
        $name=$_POST["name"];
        $drive=$_POST["drive"];
        $subnet=$_POST["subnet"];
        $gateway=$_POST["gateway"];

        $name=(empty($name))?$name=null:$name="$name";
        $drive=(empty($drive))?$drive=null:$drive="--driver $drive";
        $subnet=(empty($subnet))?$subnet=null:$subnet="--subnet $subnet";
        $gateway=(empty($gateway))?$gateway=null:$gateway="--gateway $gateway";

        shell_exec("docker network create $drive $subnet $gateway $name");
        
        header("Location: ../../app/misc");
        
    } elseif ($service == 'delete') {
        
        foreach ($_POST["id"] as $clave){
            shell_exec("docker service rm $clave");
        }
        
        header("Location: ../../app/services");
        
    } elseif ($service == 'create') {
        
        $name=$_POST["name"];
        $image=$_POST["image"];
        
        $scheduling=$_POST["scheduling"];
        if ($scheduling != "global"){
            $scheduling= "--replicas " . $_POST["replicas"];
        }
        else {
            $scheduling = null;
        }
        
        $network=$_POST["network"];
        $contport=$_POST["contport"];
        $hostport=$_POST["hostport"];
        $volume_bindhost=$_POST["volume_bindhost"];
        $volume_bindcontainer=$_POST["volume_bindcontainer"];
        $volume_volumencontainer=$_POST["volume_volumencontainer"];
        $volume_volumenvolume=$_POST["volume_volumenvolume"];
        
	$key=$_POST["key"];
        $value=$_POST["value"];
        
        $label=null;
        
        foreach ($key as $clave => $valor){
            $label="$label --label $valor=$value[$clave] ";
        }

        $name=(empty($name))?$name=null:$name="--name $name";
        $image=(empty($image))?$image=null:$image="$image";
        $network=(empty($network))?$network=null:$network="--network $network";
        $contport=(empty($contport))?$contport=null:$contport="$contport";
        $hostport=(empty($hostport))?$hostport=null:$hostport="$hostport";
        $label=(empty($label))?$label=null:$label="$label";

	if ($hostport==null && $contport==null){
        	$port=null;
	}
	else {
		$port="-p $hostport:$contport";
        }

        $volume_bindhost=(empty($volume_bindhost))?$volume_bindhost=null:$volume_bindhost="$volume_bindhost";
        $volume_bindcontainer=(empty($volume_bindcontainer))?$volume_bindcontainer=null:$volume_bindcontainer="$volume_bindcontainer";
        $volume_volumencontainer=(empty($volume_volumencontainer))?$volume_volumencontainer=null:$volume_volumencontainer="$volume_volumencontainer";
        $volume_volumenvolume=(empty($volume_volumenvolume))?$volume_volumenvolume=null:$volume_volumenvolume="$volume_volumenvolume";
        
        if (!empty($volume_bindhost) && !empty($volume_bindcontainer)){
            $volumebind="--mount type=bind,source=$volume_bindhost,target=$volume_bindcontainer";
        }
        else {
            $volumebind=null;
        }
        if (!empty($volume_volumencontainer) && !empty($volume_volumenvolume)){
            $volumevolumen="--mount source=$volume_volumenvolume,target=$volume_volumencontainer";
        }
        else {
            $volumevolumen=null;
        }
        
	// echo "docker service create -d $name $network $scheduling $volumebind $volumevolumen $port $label $image";

        shell_exec("docker service create -d $name $network $scheduling $volumebind $volumevolumen $port $label $image");
        
        header("location:../../app/services");
        
    }

?>
