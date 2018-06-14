#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"
docker volume ls | tail -n +2 > $temp/vervolumen.txt

$consulta "delete from volumelist"

while read line
do
	id="$(echo $line | awk '{print $2}')"
	docker volume inspect $id > $temp/inspectvolume.txt

	VOLUMEN="$(echo $line | awk '{print $2}')"
	DRIVER="$(echo $line | awk '{print $1}')"
	MOUNTPOINT="$(cat $temp/inspectvolume.txt | grep \"Mountpoint\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"

	$consulta "insert into volumelist(fecha,Driver,Volumen,MountPoint) values ('$fecha','$DRIVER','$VOLUMEN','$MOUNTPOINT')"

done < $temp/vervolumen.txt

