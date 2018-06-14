#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"
docker service ls | tail -n +2 > $temp/verservicios.txt

$consulta "delete from servicelist"

while read line
do
	ID="$(echo $line | awk '{print $1}')"
	NAME="$(echo $line | awk '{print $2}')"
	MODE="$(echo $line | awk '{print $3}')"
	REPLICAS="$(echo $line | awk '{print $4}')"
	IMAGE="$(echo $line | awk '{print $5}')"
	PORTS="$(echo $line | awk '{print $6}' | sed 's/,//g')"
	STACK="$(docker service inspect $ID | grep com.docker.stack.namespace | awk '{print $2}' | head -n +1 | sed 's/\"//g' | sed 's/,//g')"

	$consulta "Insert into servicelist (fecha,ID,Name,Mode,Replicas,Image,Port,stack) values ('$fecha','$ID','$NAME','$MODE','$REPLICAS','$IMAGE','$PORTS','$STACK')"

done < $temp/verservicios.txt
