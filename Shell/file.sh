#!/usr/bin/env bash
file="/var/www/demo/Shell/hello.sh"
if [ -r ${file} ]; then
    echo "file is readable"; else
    echo "file is not readable"
fi

if [ -d ${file} ]; then
    echo "file is directory"; else
    echo "file is not directory"
fi

if [ -x ${file} ]; then
    echo "file is executable"
fi

if [ -w ${file} ]; then
    echo "file is writable"
fi