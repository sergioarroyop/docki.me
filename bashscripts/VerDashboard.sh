#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"

docker node ls | tail -n +2 > $temp/listanodes.txt
$consulta "delete from nodelist"

while read line
do
	id="$(echo $line | awk '{print $1}')"
	docker node inspect $id > $temp/inspectnode.txt

	ID="$(cat $temp/inspectnode.txt | grep \"ID\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	HOSTNAME="$(cat $temp/inspectnode.txt | grep \"Hostname\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	OS="$(cat $temp/inspectnode.txt | grep \"OS\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	MEM="$(cat $temp/inspectnode.txt | grep \"MemoryBytes\" | awk '{print $2}')"
	CPU="$(cat $temp/inspectnode.txt | grep \"NanoCPUs\" | awk '{print $2}' | sed 's/,//g')"
	Status="$(cat $temp/inspectnode.txt | grep \"State\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	IP="$(cat $temp/inspectnode.txt | grep \"Addr\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | head -n +1)"
	DOCKER="$(cat $temp/inspectnode.txt | grep \"EngineVersion\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	ROLE="$(cat $temp/inspectnode.txt | grep \"Role\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"

	$consulta "insert into nodelist (fecha,ID,Hostname,OS,Mem,CPU,IP,Status,Docker,Role) values ('$fecha','$ID','$HOSTNAME','$OS','$MEM','$CPU','$IP','$Status','$DOCKER','$ROLE')"

done < $temp/listanodes.txt


