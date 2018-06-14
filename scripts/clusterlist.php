<?php

function clusterlist(){
    
    shell_exec("../bashscripts/RelationContainerNode.sh");

    $conexion=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
    $consulta="select Hostname, Role, status, OS, ID, concat(round(Mem/ (1024 * 1024 * 1024)),'GB') as Memory, (CPU/1000000000) as CPUs from nodelist order by Role;";
    $resultado=mysqli_query($conexion,$consulta);

    $NodesNames=array();
    
    for ($i=1;$line=mysqli_fetch_array($resultado);$i++){
        
        $name=$line["Hostname"];
        $type=$line["Role"];
        $cpu=$line["CPUs"];
        $memory=$line["Memory"];
        $status=$line["status"];
        $OS=$line["OS"];
        $ID=$line["ID"];
        
            $NodesNames["Node $i"] = array (
                "Name" => ucwords($name),
                "Type" => ucwords($type),
                "CPU" => $cpu,
                "Memory" => $memory,
                "Status" => ucwords($status),
                "OS" => $OS,
                "ID" => $ID
            );
        
    }
    
    mysqli_free_result($resultado);
    
    foreach ($NodesNames as $Nodes){
        
        if ($Nodes["OS"]=="linux"){
            $OS_ICON = "<i class='fab fa-linux'></i>";
        }
        else {
            $OS_ICON = "<i class='fab fa-windows'></i>"; 
        }
        
        if ($Nodes["Status"]=="Ready"){
            $style=null;
        }
        else {
            $style="style=\"background-color:red\"";
        }
        
        echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 mt-3'>";
        echo "<div class='card ClusterLive'>";
        echo "<div class='card-header text-center'>";
        echo $Nodes['Name']." ".$OS_ICON."<br>";
        echo "</div>";
        echo "<div class='card-body text-center'>";
        echo $Nodes['Type']."<br>";
        echo "CPU: ".$Nodes['CPU']."<br>";
        echo "Mem: ".$Nodes['Memory']."<br>";
        echo "<span class='badge badge-pill badge-success' $style >".$Nodes['Status']."</span>";
        echo "<hr>";
        
            $NodeID=$Nodes['ID'];
        
            $consulta="select s.name from workerservicelist r, nodelist n, servicelist s where n.id=r.idnode and s.id=r.idservice and n.id='$NodeID' order by n.hostname and n.role;";
            $resultado=mysqli_query($conexion,$consulta);
        
            while ($line=mysqli_fetch_array($resultado)){
                
                $service=$line["name"];
                
                echo "<div class='container mt-3 border border-primary rounded containers'>$service</div>";
                
            }
        
            mysqli_free_result($resultado);
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }
    mysqli_close($conexion);
    
}

?>
