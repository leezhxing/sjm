<?php

#1 $GLOBALS ����

function test() {
    $foo = "local variable";
    echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
    echo '$foo in current scope: ' . $foo . "\n";
}

$foo = "global content";
test();

#������������ȫ�ֱ�����ͬ��$GLOBALS��PHP�����ǿ��õġ� 


print_r($_ENV);



function test2()
{
    print_r($_ENV);
}
$_ENV[]='test';
//test2();
