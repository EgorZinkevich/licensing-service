#!/bin/bash

read -p "Username: " username;

read -p "Password: " -s password;
echo "";

curl -v --digest -u $username:$password -X GET 0.0.0.0/model/servers/server_example/auth.php;
