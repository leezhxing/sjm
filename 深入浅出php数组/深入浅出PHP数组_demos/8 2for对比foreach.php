<?php

/**
 * array_walk �� foreach, for ��Ч�ʵıȽϡ�
 * ����Ҫ���Ե���foreach, for, �� array_walk��Ч�ʵ����⡣ 
 */

//����һ��1000000��һ�����顣
$max = 10000000;
$test_arr = range(0, $max);
$temp = '';
//���Ƿֱ������ַ�����������Щ������1��ֵ��ʱ�䡣




// for �ķ���
$startTime = microtime(true);
for ($i = 0; $i < $max; $i++) {
    $temp = $temp + 1;   //��������ѭ������ÿ��ѭ������������
}
$endTime = microtime(true);
$t = $endTime - $startTime;
echo "ʹ��for, û�ж�������� ����: {$t} \n";

// foreach �ķ���
$startTime = microtime(true);
foreach ($test_arr as $k => &$v) {
    $temp = $temp + 1;
}
$endTime = microtime(true);
$t = $endTime - $startTime;
echo "ʹ�� foreach û�ж�������� ���� : {$t}\n\n\n";








$startTime = microtime(true);
for ($i = 0; $i < $max; $i++) {
    $test_arr[$i] = $test_arr[$i] + 1;
}
$endTime = microtime(true);
$t = $endTime - $startTime;
echo "ʹ��for ����ֱ�Ӷ���������˲��� ����: {$t}\n";

$startTime = microtime(true);
//foreach ($test_arr as $k => &$v) {
foreach ($test_arr as $k => $v) {
    $v = $v + 1;
    //$test_arr[$k] = $v + 1;
}
$endTime = microtime(true);
$t = $endTime - $startTime;
echo "ʹ�� foreach ֱ�Ӷ�������� : {$t}\n\n\n";







$startTime = microtime(true);
for ($i = 0; $i < $max; $i++) {
    addOne($test_arr[$i]);
}
$endTime = microtime(true);
$t = $endTime - $startTime;
echo "ʹ��for ���ú������������ ���� : {$t}\n";


$startTime = microtime(true);
foreach ($test_arr as $k => &$v) {
    addOne($v);
}
$endTime = microtime(true);
$t = $endTime - $startTime;
echo "ʹ�� foreach ���ú������������ : {$t}\n\n\n";





function addOne(&$item) {
    $item = $item + 1;
}
