#!/bin/bash

consulta="mysql -h 172.17.0.2 -u bashuser -pEfoFgs9#V?_BHEd -D swarmboard_db -e"
temp="/var/www/html/bashscripts/temp"
fecha="$(date +%H:%M:%S" "%D)"

$consulta "delete from workerservicelist"

docker service ls | awk '{print $1}' | tail -n +2 > $temp/IDservicerelation.txt

while read line
do

        docker service ps $line --filter desired-state=running | awk '{print $1}' | tail -n +2 > $temp/IDworkerrelation.txt

        while read line2
        do

                IDworker="$(docker inspect --format \"{{.NodeID}}\" $line2 | sed 's/\"//g')"
                $consulta "insert into workerservicelist (IDservice,IDnode) values ('$line','$IDworker')"

        done < $temp/IDworkerrelation.txt

done < $temp/IDservicerelation.txt
