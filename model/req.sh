#!/bin/bash

if [ $# -lt 4 ]
then
  echo Недостаточно аргументов;
  exit;
fi

openssl x509 -req -days 365 -CA $1 -CAkey $2 -extensions usr_cert -in $3 -out $4
