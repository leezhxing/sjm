<?php

$items=array(
	array('id'=>12,'name'=>'����' ,'age'=>18),
	array('id'=>8,'name'=>'����' ,'age'=>30),
	array('id'=>19,'name'=>'����' ,'age'=>10),
	array('id'=>4,'name'=>'����' ,'age'=>39),
	array('id'=>86,'name'=>'����' ,'age'=>6),
);


//����1����usort
usort($items,function($itema,$itemb){
	return ($itema['id'] -$itemb['id']);
});

print_r($items);



//����2���� array_multisort
/*
$ids =array_column($items , 'id' );

array_multisort($ids, SORT_ASC, $items);

print_r($items);
*/
