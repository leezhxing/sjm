<?php
 
 //��ip�ַ���תΪlong����
 $ipstr="124.205.137.226";
$iplong = sprintf( "%u",ip2long($ipstr) );
 
 
 
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
$ipnum = 0;
for( $ipPos=$ipbegin ;  ($ipnum < $iplong) && ($ipPos <=$ipend)   ;  $ipPos=$ipPos+7 ){
	fseek($fd, $ipPos ); //��λ��ipPos
	$ipData1 = fread($fd, 4);  //��ʼIP��ַ��4���ֽ� 
	$ipnum = implode('', unpack('L', $ipData1)); 
	if($ipnum < 0) $ipnum += pow(2, 32); 
}

//������ǰ��λ��ipPos
fseek($fd, $ipPos -7*2 ); 

$ipData1 = fread($fd, 4);  //��ʼIP��ַ��4���ֽ�
$ipnum = implode('', unpack('L', $ipData1)); 
if($ipnum < 0) $ipnum += pow(2, 32);   
 
echo  ' ipnum= '.$ipnum ."\n";
 
$ipData2 = fread($fd, 3);  //3���ֽڵ�ƫ�Ƶ�ַ  
$ipPos = implode('', unpack('L', $ipData2.chr(0) ) );  

fseek($fd, $ipPos ); //��λ��ʵ�ʵ����ݼ�¼
$IP = fread($fd, 4); //��ȡ��4���ֽڵ�IP��ַ FF 00 00 01 


$ipAddr1='';  //���ҵ�ַ
$ipAddr2='';  //������ַ

$ipFlag = fread($fd, 1); //��ȡ1���ֽڵı�־λ

if($ipFlag == chr(1)) {
	$ipSeek = fread($fd, 3);   //����Ǳ�־1�����ȡ3���ֽڵ� ����ƫ��
	$ipSeek = implode('', unpack('L', $ipSeek.chr(0)));
	fseek($fd, $ipSeek);  //��λ�󣬼�����ȡ1���ֽڣ��ж��Ƿ� ��Ҫ�������¶���
	$ipFlag = fread($fd, 1);
}

if($ipFlag == chr(2)) {
	$AddrSeek = fread($fd, 3);  //����Ǳ�־2�����ȡ3���ֽڵ� ����ƫ��
	$ipFlag = fread($fd, 1);  //������ȡ1���ֽڣ��ж��Ƿ� ��Ҫ�������¶���
	if($ipFlag == chr(2)) {
		$AddrSeek2 = fread($fd, 3);
		$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
		fseek($fd, $AddrSeek2);
	} else {
		fseek($fd, -1, SEEK_CUR);
	}

	while(($char = fread($fd, 1)) != chr(0))
	$ipAddr2 .= $char;

	$AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));
	fseek($fd, $AddrSeek);

	while(($char = fread($fd, 1)) != chr(0))
	$ipAddr1 .= $char;
} else {
	fseek($fd, -1, SEEK_CUR);
	
	while(($char = fread($fd, 1)) != chr(0)){
		$ipAddr1 .= $char;
	}

	$ipFlag = fread($fd, 1);
	if($ipFlag == chr(2)) {
		$AddrSeek2 = fread($fd, 3);
		$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
		fseek($fd, $AddrSeek2);
	} else {
		fseek($fd, -1, SEEK_CUR);
	}
	while(($char = fread($fd, 1)) != chr(0))
	$ipAddr2 .= $char;
}
fclose($fd);

echo $ipaddr = "$ipAddr1 $ipAddr2";
 

//����� ��  
	



