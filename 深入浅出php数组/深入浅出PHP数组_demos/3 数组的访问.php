<?php
//�����źͷ����š�
$array = array(
    "key" => "value",
    2 => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
var_dump($array{"multi"}["dimensional"]["array"]);

die;
//�������
function getArray() {
    return array(1, 2, 3);
}
// previously
$tmp = getArray();
echo  $tmp[1];

// on PHP 5.4����ֱ����������
echo  getArray()[1];

// or
list(, $secondElement) = getArray();

echo $secondElement;

echo $tmp[$test = 1];
