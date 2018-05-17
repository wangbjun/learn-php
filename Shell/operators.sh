#!/bin/bash
a=10
b=10
c=15
echo `expr ${a} + ${b}`
echo `expr ${a} - ${b}`
echo `expr ${a} \* ${b}`
echo `expr ${a} / ${b}`
echo `expr ${a} % ${b}`
if [ ${a} == ${b} ]; then
	echo "a == b"
fi

if [ ${a} != ${b} ]; then
	echo "a != b"
fi

if [ ${a} -eq ${b} ]; then
    echo "a == b"; else
    echo "a != b";
fi

if [ ${a} -ge ${b} ]; then
    echo "a >= b";
fi

if [ ${a} -gt ${b} -o ${b} -gt ${c} ]; then
    echo "a > b || b > c"; else
    echo "a < b || b < c";
fi