<?php
//�ļ������ȴ��ڣ����� fopen() ����ʧ�ܲ����� FALSE��������һ�� E_WARNING ����Ĵ�����Ϣ
$handle = fopen("write.txt", "x");
var_dump($handle);
 