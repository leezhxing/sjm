<?php
#http://zengrong.net/post/1715.htm
//Ϊ����ֲ�Կ��ǣ�����ʹ��rb����ȡ�ļ�
$fh = fopen("top.png", "rb");
//����ȡǰ���8���ֽ�
$head = fread($fh, 8);
//echo $head."\n";
$pnginfo = unpack("Chead/C3string/C4number", $head);
print_r($pnginfo);
$type='';
for($i=1;$i<=3;$i++){
    $type.=chr($pnginfo['string'.$i]);
}
echo $type;

fclose($fh);