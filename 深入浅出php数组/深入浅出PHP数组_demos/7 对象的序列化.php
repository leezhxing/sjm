<?php

//��������л�
class A {
    public $one = "�ٺ٣�";
    public function show_one() {
        echo $this->one;
    }
}
$a = new A;
$s = serialize($a);

$b = unserialize($s);
// ���ڿ���ʹ�ö���$b����ĺ��� show_one()
$a->show_one();