#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"
docker network ls | tail -n +2 > $temp/vernetwork.txt

$consulta "delete from networklist"

while read line
do
	# NETWORKID="$(echo $line | awk '{print $1}')"
	# NAME="$(echo $line | awk '{print $2}')"
	# SUBNET="$(docker network inspect $NAME | grep \"Subnet\" | awk '{print $2}')"
	# GATEWAY="$(docker network inspect $NAME | grep \"Gateway\" | awk '{print $2}')"
	# DRIVER="$(echo $line | awk '{print $3}')"
	# SCOPE="$(echo $line | awk '{print $4}')"

	id="$(echo $line | awk '{print $1}')"
	docker network inspect $id > $temp/inspectnetwork.txt

	NETWORKID="$(cat $temp/inspectnetwork.txt | grep \"Id\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	NAME="$(cat $temp/inspectnetwork.txt | grep \"Name\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | head -n +1)"
	SUBNET="$(cat $temp/inspectnetwork.txt | grep \"Subnet\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	GATEWAY="$(cat $temp/inspectnetwork.txt | grep \"Gateway\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	DRIVER="$(cat $temp/inspectnetwork.txt | grep \"Driver\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | head -n +1)"
	SCOPE="$(cat $temp/inspectnetwork.txt | grep \"Scope\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"

	$consulta "insert into networklist(fecha,NetworkID,Name,Subnet,Gateway,Driver,Scope) values ('$fecha','$NETWORKID','$NAME','$SUBNET','$GATEWAY','$DRIVER','$SCOPE')"

done < $temp/vernetwork.txt

