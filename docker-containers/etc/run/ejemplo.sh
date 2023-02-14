#!/bin/bash
if [$1 == https://google];then
    echo "seguro"
else
    response = $(curl --write-out "%{http_code}\n" --silent --output /dev/null "$1")
    echo $1: $response
fi

while read line do
    echo $line;
done < lista.txt

function hello() {
    echo Hola $1
}

for USUARIO in ${@}; do
    saluar $USUARIO
done
x=3
while [[x -ge 1]]; do
    echo $x
    x= ${x-1}
done