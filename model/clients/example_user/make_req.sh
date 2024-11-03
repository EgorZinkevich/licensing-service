echo private key;
read private_key;

openssl req -new -key $private_key -out req.csr

echo server;
read server;

curl -X POST -F "file=@req.csr" 0.0.0.0/model/servers/$server;
