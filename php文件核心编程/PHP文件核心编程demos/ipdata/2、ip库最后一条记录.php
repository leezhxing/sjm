<?php
 
 #php -r "echo hex2bin('B2A9CEC4CAB5B4EFE4A8BAFEB5EAB6FEB5EA'); "


#php -r "echo hex2bin('C7ECC9D0B1B1B5C0C7ECD6DDCAD0'); "

$fd=fopen('qqwry.dat', 'rb');

$DataBegin = fread($fd, 4);  //��һ�������ľ���ƫ��
$DataEnd = fread($fd, 4) ;   //���һ�������ľ���ƫ��

$ipbegin = implode('', unpack('L', $DataBegin));
$ipend = implode('', unpack('L', $DataEnd));

fseek($fd, $ipend ); //��λ�����һ��ƫ�Ƶ�ַ

$ipData1 = fread($fd, 4);  //��ʼIP��ַ��4���ֽ� , ����Ϊ �� 00 FF FF FF ��
$ipnum = implode('', unpack('L', $ipData1));
if($ipnum < 0) $ipnum += pow(2, 32);  //4294967296����Ϊ����
//echo $ipnum."\n" ;
	
$ipData2 = fread($fd, 3);  //3���ֽڵ�ƫ�Ƶ�ַ  
$ipPos = implode('', unpack('L', $ipData2.chr(0) ) );  // ��  05  71 5E 00 �� ������4���ֽڣ������� L

fseek($fd, $ipPos ); //��λ��ʵ�ʵ����ݼ�¼
$IP = fread($fd, 4); //��ȡ��4���ֽڵ�IP��ַ

$ipFlag = fread($fd, 1); //��ȡ����ģʽ����Ϊ�����һ����¼�Ǵ������ݿ�İ汾��Ϣ�������ض���ģʽ�����Բ����ж� ipFlag

fseek($fd, -1, SEEK_CUR);   //�ļ�ָ��ӵ�ǰλ����ǰ�ƶ�һ���ֽ�

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


//����� ����������  2014��5��10��IP����

