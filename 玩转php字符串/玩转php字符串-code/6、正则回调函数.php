<?php 
// ���ı��е��������һ��.
$text = "��һ�����˽��ǣ� 04/01/2014\n";
$text.= "ʥ�����ǣ�  12/24/2013\n";
// �ص�����
 
echo preg_replace_callback("|(\d{2}/\d{2})/(\d{4})|",
            function($matches){
            	 	return ($matches[2]+1).'/'.$matches[1] ;
            },
$text);