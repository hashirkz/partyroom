#!/bin/bash

sqlite3 dev.db < __drop__.sql
sqlite3 dev.db < __init__.sql

if [[ "$1" = "-d" ]]; then 
    echo "using fake .csv data"
    sqlite3 dev.db ".mode csv" ".import ../data/users.csv users"
    sqlite3 dev.db ".mode csv" ".import ../data/posts.csv posts"
fi 

sqlite3 dev.db ".tables"
echo "refreshed"
