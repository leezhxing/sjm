<?php

$handle = fopen("write.txt", "w+");
fputs($handle, '��дд��');
rewind($handle);  //�����ļ�ָ���λ��
$content=fgets($handle);
var_dump($content);
 