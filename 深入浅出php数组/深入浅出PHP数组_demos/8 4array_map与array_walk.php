<?php

$peoples = array('����','����','����','����');
$ages = array(13,18,26,88);


$npeoples=array_filter($peoples ,function($people){
	return ('����'!=$people);
});
print_r($npeoples);
exit;



array_walk($peoples,
	function(& $people,$key){
		$people .= '1';
	}
);
print_r($peoples);


$newItems = array_map(
				function($people,$age){
					return $people." ".$age;
				},
				$peoples,
				$ages
			);
print_r($newItems);