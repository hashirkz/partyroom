#!/bin/bash

sqlite3 dev.db < __drop__.sql
sqlite3 dev.db < __init__.sql

sqlite3 dev.db ".mode csv" ".import ../data/users.csv users"
sqlite3 dev.db ".mode csv" ".import ../data/posts.csv posts"

sqlite3 dev.db ".tables"
echo "refreshed"
