<?php
use Luck\Prize;
use Luck\Luck;

include 'Prize.php';
include 'Luck.php';

$luck = new Luck();
$luck->addPrize(new Prize(3, '三等奖', '电脑', 60));
$luck->addPrize(new Prize(1, '一等奖', '手机', 5, 5));
$luck->addPrize(new Prize(2, '二等奖', '平板', 35, 35));
$i   = 1;
$res = $luck->luckMe();
var_dump($res);
