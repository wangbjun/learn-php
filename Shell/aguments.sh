#!/bin/bash
echo "Shell传递参数案例"
echo "执行的文件名字为: $0"
echo "传递的参数个数为: $#"
echo "第一个参数为: $1"
echo "第二个参数为: $2"
echo "所有参数以字符串显示为: ""$*"
echo "所有参数以字符串显示为: ""$@"
echo "--- \$* 演示 ---"
for i in "$*";do
	echo ${i}
done

echo "--- \@ 演示 ---"
for i in "$@";do
	echo ${i}
done

