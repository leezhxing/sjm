<?php
/*ȥ��utf8ǩ�� */
 
/* ����һ����ȡ�ļ�ǰ�����ַ���Ȼ���жϴ���  */
function removebom($filename){
	$contents=file_get_contents($filename);
	$charset[1] = substr($contents, 0, 1);
	$charset[2] = substr($contents, 1, 1);
	$charset[3] = substr($contents, 2, 1);
	if (ord($charset[1]) == 239 && ord($charset[2]) == 187 &&ord($charset[3]) == 191) {
		$rest = substr($contents, 3);
		file_put_contents ($filename, $rest);
	}
}

/* �����������������16���Ʋ����滻 */
 
$contents=file_get_contents('u.txt');
$contents=preg_replace('/\xef\xbb\xbf/','',$contents);
file_put_contents('u.txt', $contents);
 

/* ����������ȡ�ļ���ֱ���ļ�ָ�붨λ������ǰ�����ֽ� */
$fp=fopen('u.txt','rw');
fseek($fp,3);
$contents='';
while (($buffer = fgets($fp, 4096)) !== false) {
    $contents.=$buffer;
}
file_put_contents('u.txt',$contents);


/* ���������������ı�ǣ�Ȼ�����ַ����滻�� */
function remove_utf8_bom($text){
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}

