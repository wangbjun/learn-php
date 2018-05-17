#!/bin/bash
#Author absolutely.xu@gmail.com

MAXIMUM_NUM=5              #最大备份文件数
FOLDERNAME="backup"  #数据库备份文件的主目录
DB_HOSTNAME="localhost"              #mysql所在主机的主机名
DB_USERNAME="root"                   #mysql登录用户名
DB_PASSWORD="123456"                 #mysql登录密码
DATABASES=(
            "af_account"
            "af_base"
            "af_community"
            "af_crm"
            "af_finance"
            "af_goods"
            "af_log"
            "af_message"
            "af_order"
            "af_pgs"
            "af_pili"
            "af_room"
)

echo "Bash Database Backup Tool"
CURRENT_DATE=$(date +%F)              #定义当前日期为变量
BACKUP_FOLDER="${FOLDERNAME}_${CURRENT_DATE}" #存放数据库备份文件的目录
mkdir ${BACKUP_FOLDER} #创建数据库备份文件目录

#统计需要被备份的数据库
echo "[+] ${#DATABASES[@]} databases will be backup..."

#循环这个数据库名称列表然后逐个备份这些数据库
for DATABASE in ${DATABASES[@]};do
    echo "[+] Mysql-Dumping: ${DATABASE}"
    echo -n "   Began:  ";echo $(date)
    if $(mysqldump -h ${DB_HOSTNAME} -u${DB_USERNAME} -p${DB_PASSWORD} ${DATABASE} > "${BACKUP_FOLDER}/${DATABASE}.sql");then
        echo "  Dumped successfully!"
    else
        echo "  Failed dumping this database!"
    fi
        echo -n "   Finished: ";echo $(date)
done
echo
echo "[+] Packaging and compressing the backup folder..."
tar -cv ${BACKUP_FOLDER} | bzip2 > ${BACKUP_FOLDER}.tar.bz2 && rm -rf ${BACKUP_FOLDER}
BACKUP_FILES_MADE=$(ls -l ${FOLDERNAME}*.tar.bz2 | wc -l)
BACKUP_FILES_MADE=$(( $BACKUP_FILES_MADE - 0 )) 
#把已经完成的备份文件数的结果转换成整数数字

echo
echo "[+] There are ${BACKUP_FILES_MADE} backup files actually."
#判断如果已经完成的备份文件数比最大备份文件数要大，那么用已经备份的文件数减去最大备份文件数,打印要删除旧的备份文件
if [ ${BACKUP_FILES_MADE} -gt ${MAXIMUM_NUM} ];then
    REMOVE_FILES=$(( $BACKUP_FILES_MADE - $MAXIMUM_NUM ))
echo "[+] Remove ${REMOVE_FILES} old backup files."
#统计所有备份文件，把最新备份的文件存放在一个临时文件里，然后删除旧的文件，循环出临时文件的备份文件从临时目录里移到当前目录
    ALL_BACKUP_FILES=($(ls -t ${FOLDERNAME}*.tar.bz2))
    SAFE_BACKUP_FILES=("${ALL_BACKUP_FILES[@]:0:${MAXIMUM_NUM}}")
echo "[+] Save the newest backup files and removing old files..."
    FOLDER_SAFETY="_safety"
if [ ! -d ${FOLDER_SAFETY} ]
then mkdir ${FOLDER_SAFETY}
                                                                                                                    
fi
for FILE in ${SAFE_BACKUP_FILES[@]};do
    mv -i  ${FILE}  ${FOLDER_SAFETY}
done
    rm -rf ${FOLDERNAME}*.tar.bz2
    mv  -i ${FOLDER_SAFETY}/* ./
    rm -rf ${FOLDER_SAFETY}
fi