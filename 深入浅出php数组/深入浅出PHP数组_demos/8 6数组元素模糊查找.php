<?php

 $array=[
	12312.3123,
	'abc123123',
	4444444444,
	'123abcdef'=>'abcdefghijk',
	'abc9999999',
 ];

$fl_array = preg_grep("/^abc.+$/", $array);
print_r($fl_array);











// �������а�����������Ԫ��
//$fl_array = preg_grep("/^(\d+)?\.\d+$/", $array);