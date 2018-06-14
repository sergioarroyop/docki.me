#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"
docker stack ls | tail -n +2 > $temp/verstacks.txt

$consulta "delete from stacklist"

while read line
do
	NAME="$(echo $line | awk '{print $1}')"
	SERVICES="$(echo $line | awk '{print $2}')"

	$consulta "Insert into stacklist (fecha,Name,Services) values ('$fecha','$NAME','$SERVICES')"

done < $temp/verstacks.txt
