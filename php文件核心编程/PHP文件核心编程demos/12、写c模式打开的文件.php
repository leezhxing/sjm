<?php
//����ģʽ������������е��ļ���
$handle = fopen("write.txt", "c");
fputs($handle, "1");
fseek($handle, 3);
fputs($handle, '2');
 