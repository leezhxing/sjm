<?php
 
 #php -r "echo hex2bin('B2A9CEC4CAB5B4EFE4A8BAFEB5EAB6FEB5EA'); "


#php -r "echo hex2bin('C7ECC9D0B1B1B5C0C7ECD6DDCAD0'); "

$fd=fopen('qqwry.dat', 'rb');

$DataBegin = fread($fd, 4);  //��һ�������ľ���ƫ��
$DataEnd = fread($fd, 4) ;   //���һ�������ľ���ƫ��

$ipbegin = implode('', unpack('L', $DataBegin));
$ipend = implode('', unpack('L', $DataEnd));

$ipAllNum = ($ipend - $ipbegin) / 7 + 1;  //�ܵ�IP������¼��

echo $ipAllNum;