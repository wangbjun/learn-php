#!/bin/bash
#歌曲存放路径
dir='/home/jwang/Music/CloudMusic'
#歌曲名称列表,中间不要有空格
sounds=(
hello.mp3
泡沫.mp3
演员.mp3
默.mp3
Summertime.mp3
迴梦游仙.mp3
IAmYou.mp3
去大理.mp3
Apologize.mp3
多幸运.mp3
南山南.mp3
Beautiful.mp3
平凡之路.mp3
)
#产生随机数
function rand(){
    min=$1
    max=$(($2-$min+1))
    num=$(date +%s%N)
    return $(($num%$max+$min))
}
rand 0 ${#sounds[@]}-1
#执行播放命令
/usr/bin/play ${dir}/${sounds[$?]}
