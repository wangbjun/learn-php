#!/usr/bin/env bash
num1=100
num2=500
if test ${num1} -eq ${num2}; then
    echo "eq"; else
    echo "ne";
fi



function demo()
{
    res=`expr $1 + $2`
    return ${res}
}

#读取输入
while true
do
    demo 1 2
    read num2
    case ${num2} in
    100)
        echo "100"
        ;;
    200)
        echo "200"
        ;;
    300)
        echo "300"
        ;;
    888)
        break
        ;;
    *)
        echo "not found"
        ;;
    esac
done