<?php
 
 #php -r "echo hex2bin('B2A9CEC4CAB5B4EFE4A8BAFEB5EAB6FEB5EA'); "


#php -r "echo hex2bin('C7ECC9D0B1B1B5C0C7ECD6DDCAD0'); "

$fd=fopen('qqwry.dat', 'rb');

$DataBegin = fread($fd, 4);  //��һ�������ľ���ƫ��
#$DataEnd = fread($fd, 4) ;   //���һ�������ľ���ƫ��

$ipbegin = implode('', unpack('L', $DataBegin));
#$ipend = implode('', unpack('L', $DataEnd));

fseek($fd, $ipbegin ); //��λ����һ������

$ipData1 = fread($fd, 4);  //��ʼIP��ַ��4���ֽ� , ����Ϊ �� 00 00 00 00 ��
$ipnum = implode('', unpack('L', $ipData1)); 
if($ipnum < 0) $ipnum += pow(2, 32);  //4294967296����Ϊ����
// echo $ipnum."\n" ;  �������0
 
	
$ipData2 = fread($fd, 3);  //3���ֽڵ�ƫ�Ƶ�ַ  
$ipPos = implode('', unpack('L', $ipData2.chr(0) ) );  // ��  08 00 00  00 �� ������4���ֽڣ������� L

fseek($fd, $ipPos ); //��λ��ʵ�ʵ����ݼ�¼
$IP = fread($fd, 4); //��ȡ��4���ֽڵ�IP��ַ FF FF FF 00

$����=''; 
//���´���ѭ����ȡ�ļ����ݣ����� 0 ��ֹͣ���õ� ���ҵ��ַ���
while(($char = fread($fd, 1)) != chr(0)){
	$���� .= $char;
}
echo $����."\n";
//echo $ipAddr;
/*
��¼��ȡ1���ֽڣ��жϿ���ʲôģʽ�� 
�����˴������ж�,��Ϊ���һ����¼�Ƚ����⣬���Ǵ�ŵĴ������ݿ�İ汾��Ϣ

*/
$����='';
while(($char = fread($fd, 1)) != chr(0)){
	$���� .= $char;
}
echo $����;

//����� �� IANA������ַ   CZ88.NET
	

