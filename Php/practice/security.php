<?php
$str = 'wangbenjun';
$salt = substr(md5(uniqid()), 0, 12); //随机字符串

//MD5加密
echo md5($str.$salt)."\n";

//crypt加密
echo crypt($str, $salt)."\n";

//sha1加密
echo sha1($str)."\n";

//urlencode
echo urlencode("http://www.baidu.com/? name='王本俊'")."\n";
echo rawurlencode("http://www.baidu.com/? name='王本俊'")."\n";

//base64
echo base64_encode($str)."\n";
echo base64_decode("d2FuZ2Jlbmp1bg==")."\n";

//password_hash
echo password_hash($str, PASSWORD_DEFAULT)."\n";
echo password_verify($str, '$2y$10$jwMG2pACe1DAimdMd5YM5OOawqjERRVkQb49SNkv20pFqaXM3j3xS')."\n";
$res = password_get_info('$2y$10$jwMG2pACe1DAimdMd5YM5OOawqjERRVkQb49SNkv20pFqaXM3j3xS');
var_dump($res);
