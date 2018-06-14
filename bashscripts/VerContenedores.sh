#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"

#DATABASE="$(cat ./SQLvar.sh | grep DATABASE | awk -F'=' '{print $2}' | sed 's/\"//g')"
#PASSWORD="$(cat ./SQLvar.sh | grep PASSWORD | awk -F'=' '{print $2}' | sed 's/\"//g')"
#USER="$(cat ./SQLvar.sh | grep USER | awk -F'=' '{print $2}' | sed 's/\"//g')"
#HOST="$(cat ./SQLvar.sh | grep HOST | awk -F'=' '{print $2}' | sed 's/\"//g')"

#consulta="mysql -h $HOST -u $USER -p$PASSWORD -D $DATABASE -e"

#temp="$(cat ./SQLvar.sh | grep temp | awk -F'=' '{print $2}' | sed 's/\"//g')"

temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"
docker container ls -a | tail -n +2 > $temp/vercontenedores.txt

$consulta "delete from containerlist"

while read line
do
	# CONTAINERID="$(echo $line | awk '{print $1}')"
        # IMAGE="$(cat $temp/inspectcontenedores.txt | grep \"Image\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | tail -n +2)"
	# COMMAND="$(echo $line | awk '{print $3" "$4}')"
	# CREATED="$(echo $line | awk '{print $5" "$6" "$7}')"
	# STATUS="$(echo $line | awk '{print $8" "$9" "$10}')"
	# PORTS="$(echo $line | awk '{print $11}')"
	# NAMES="$(echo $line | awk '{print $12}')"

	id="$(echo $line | awk '{print $1}')"
	docker inspect $id > $temp/inspectcontenedores.txt

	CONTAINERID="$(cat $temp/inspectcontenedores.txt | grep \"Id\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
	IMAGE="$(echo $line | awk '{print $2}')"
        COMMAND="$(cat $temp/inspectcontenedores.txt | grep \"Path\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
        CREATED="$(cat $temp/inspectcontenedores.txt | grep \"Created\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
        STATUS="$(cat $temp/inspectcontenedores.txt | grep \"Status\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g')"
        PORTS="$(cat $temp/inspectcontenedores.txt | grep \"HostPort\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | sed 's/{//g' | sed 's/}//g' | tail -n +2)"
        NAMES="$(cat $temp/inspectcontenedores.txt | grep \"Name\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | sed 's/\///g' | head -n +1)"
        # IP="$(cat $temp/inspectcontenedores.txt | grep \"IPAddress\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | head -n +1)"
      	# IP="$(cat $temp/inspectcontenedores.txt | grep \"HostIp\" | awk '{print $2}' | sed 's/,//g' | sed 's/\"//g' | tail -n +2)"
	IP="$(cat $temp/inspectcontenedores.txt | grep \"IPAddress\" | awk '{print $2}' | tail -n +2 | sed 's/,//g' | sed 's/\"//g')"

	$consulta "insert into containerlist(fecha,ContainerID,Image,Command,Created,Status,Ports,Names,Ip) values ('$fecha','$CONTAINERID','$IMAGE','$COMMAND','$CREATED','$STATUS','$PORTS','$NAMES','$IP')"

done < $temp/vercontenedores.txt

