<?php

//�ַ�������
 

/**
 * ���ܡ������ַ���
 *
 * @global string $db_hash
 * @global array $pwServer
 * @param $string �������ַ���
 * @param $action ������ENCODE|DECODE
 * @return string
 */
function StrCode($string, $action = 'ENCODE') {
	$action != 'ENCODE' && $string = base64_decode($string);
	$code = '';
	$key = substr(md5($GLOBALS['pwServer']['HTTP_USER_AGENT'] . $GLOBALS['db_hash']), 8, 18);
	$keyLen = strlen($key);
	$strLen = strlen($string);
	for ($i = 0; $i < $strLen; $i++) {
		$k = $i % $keyLen;
		$code .= $string[$i] ^ $key[$k];
	}
	return ($action != 'DECODE' ? base64_encode($code) : $code);
}