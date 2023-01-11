#! /bin/bash

if [[ $1 -ne ""  ]]; then
    PORT=$1
else
    PORT=8000
fi

php -S localhost:$PORT -t public