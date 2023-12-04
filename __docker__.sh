#!/bin/bash

echo "building partyroom"
docker build -t partyroom .

if [[ -z "$1" && -z "$2" ]]; then 
    docker tag partyroom "$1/partyroom:$2"
fi