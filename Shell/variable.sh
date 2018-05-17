#!/bin/bash
my_name="JWang"
my_name="Jun"
#字符串拼接和php差不多
info="My address is ${my_name}!!!!"
echo "My name is $my_name"
echo $info
#打印/etc目录下文件
#for file in `ls /etc`;do
#	echo $file
#done

for skill in Java,Js,Php,C++;do
	echo "I am good at $skill Coding"
done
#字符串长度
string="abcdefg"
echo ${#string}
#字符串分割
echo ${string:1:4}
#查找字符串
string="runoob is a great company"
echo `expr index "$string" is`
echo "-------------Shell数组---------------"
array_name=(1,2 3 4 5 6)
echo ${array_name[@]}
