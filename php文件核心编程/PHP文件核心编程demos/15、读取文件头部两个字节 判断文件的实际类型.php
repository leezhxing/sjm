<?php
 
function checkFileType($fileName){
        $file     = fopen($fileName, "rb");
        $bin      = fread($file, 2); //ֻ��2�ֽ�
        fclose($file);
        $strInfo  = unpack("C2chars", $bin);// CΪ�޷��������������ѵ��Ķ���c��Ϊ�з�����������������������жϲ�����
        $typeCode = intval($strInfo['chars1'].$strInfo['chars2']);
        $fileType = '';
        return ($typeCode == 255216 /*jpg*/ || $typeCode == 7173 /*gif*/ || $typeCode == 13780 /*png*/);  
}