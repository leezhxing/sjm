<?php
 
 
$fd=fopen('qqwry.dat', 'rb');

$DataBegin = fread($fd, 4);  //��һ�������ľ���ƫ��
$DataEnd = fread($fd, 4) ;   //���һ�������ľ���ƫ��

$ipbegin = implode('', unpack('L', $DataBegin));
( $ipbegin < 0 ) && $ipbegin += pow(2, 32); 

$ipend = implode('', unpack('L', $DataEnd));
( $ipend < 0 ) && $ipend += pow(2, 32); 

 echo "ipbegin = $ipbegin \n";
 echo "ipend = $ipend \n";
/*

$ipbegin <=  $ipnum <  $ipend

�������ȡ $ipbegin

*/
for( $ipPos=$ipbegin ;  $ipPos <=$ipend  ;  $ipPos=$ipPos+7 ){
	fseek($fd, $ipPos ); //��λ��ipPos
	$ipData1 = fread($fd, 4);  //��ʼIP��ַ��4���ֽ� 
	$ipnum = implode('', unpack('L', $ipData1)); 
	if($ipnum < 0) $ipnum += pow(2, 32); 
	echo "ipPos = $ipPos ", "ipnum = $ipnum  " , long2ip($ipnum)  ,"  \n";
}

