#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"
docker image ls -a | tail -n +2 > $temp/verimages.txt

$consulta "delete from imagelist"

while read line
do
	# IMAGEID="$(echo $line | awk '{print $3}')"
	# CREATED="$(echo $line | awk '{print $4" "$5" "$6}')"
	# SIZE="$(echo $line | awk '{print $7}')"

	id="$(echo $line | awk '{print $3}')"
	docker image inspect $id > $temp/inspectimage.txt

	IMAGEID="$(cat $temp/inspectimage.txt | grep \"Id\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | head -n +1 | sed 's/sha256://g')"
	REPOSITORY="$(echo $line | awk '{print $1}')"
	CREATED="$(cat $temp/inspectimage.txt | grep \"Created\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	SIZE="$(cat $temp/inspectimage.txt | grep \"Size\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g') Bytes"
	VERSION="$(echo $line | awk '{print $2}')"

	$consulta "insert into imagelist(fecha,ImageID,Repository,Created,Size,Version) values ('$fecha','$IMAGEID','$REPOSITORY','$CREATED','$SIZE','$VERSION')"

done < $temp/verimages.txt

