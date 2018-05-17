#!/bin/bash
if [ $1 ] && [ -d "$1" ];then
    cd $1
else
    echo "This script need a work directory, "$1" is not a valid directory"
    exit
fi
DB_HOST="localhost"
DB_USER="root"
DB_PASS="123456"

databases=(
	"af_account"
	"af_crm"
	"af_log"
	"af_pgs"
	"af_base"
	"af_finance"
	"af_message"
	"af_pili"
	"af_community"
	"af_goods"
	"af_order"
	"af_room"
)

for database in ${databases[@]};do
	echo "Mysql restore:${database}"
	if $(mysql -h${DB_HOST} -u${DB_USER} -p${DB_PASS} ${database} < ${database}.sql);then
		echo "Restore successfully!"
	else
		echo "Fail restore..."
	fi	
		echo "Restore Finished"

done