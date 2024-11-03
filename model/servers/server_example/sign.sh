#!/bin/bash

echo CA crt;
read CA_crt;
echo CA key;
read CA_key;
echo request
read request;
echo cert name;
read crt_name; 

openssl x509 -req -days 365 -CA $CA_crt -CAkey $CA_key -extensions usr_cert -in $request -out $crt_name;
