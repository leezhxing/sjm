<?php
 
 #php -r "echo hex2bin('B2A9CEC4CAB5B4EFE4A8BAFEB5EAB6FEB5EA'); "


#php -r "echo hex2bin('C7ECC9D0B1B1B5C0C7ECD6DDCAD0'); "

$fd=fopen('qqwry.dat', 'rb');

$DataBegin = fread($fd, 4);  //��һ�������ľ���ƫ��
#$DataEnd = fread($fd, 4) ;   //���һ�������ľ���ƫ��

$ipbegin = implode('', unpack('L', $DataBegin));
#$ipend = implode('', unpack('L', $DataEnd));

fseek($fd, $ipbegin+ 7*1 ); //��λ���ڶ�������

$ipData1 = fread($fd, 4);  //��ʼIP��ַ��4���ֽ� , ����Ϊ �� 00 00 00 01  ��


$ipnum = implode('', unpack('L', $ipData1)); 
if($ipnum < 0) $ipnum += pow(2, 32);  //4294967296����Ϊ����
// echo $ipnum."\n" ; //�������0
echo long2ip($ipnum);exit;
 
$ipData2 = fread($fd, 3);  //3���ֽڵ�ƫ�Ƶ�ַ  
$ipPos = implode('', unpack('L', $ipData2.chr(0) ) );  // ��  23 00 00  00 �� ������4���ֽڣ������� L

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
 

//����� �� IANA������ַ   CZ88.NET
	

