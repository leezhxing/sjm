<?php
/*
���Ľ�è��ÿ��һ�⣨4��9�գ� ����m������ѡ��n������(0<n<=m)��Ҫ��n����֮�䲻�����ظ�����͵���һ����ֵk����һ�γ����������еĿ��ܡ�	
http://stackoverflow.com/questions/728972/finding-all-the-subsets-of-a-set
http://stackoverflow.com/questions/6092781/finding-the-subsets-of-an-array-in-php
*/
define('K',18);

$nums=array(11, 18, 12, 1, -2, 20, 8, 10, 7, 6);

$numscount=count($nums);

$subscount = 2<< ($numscount-1); //ÿһ�����ƶ�����ʾ������ 2����
 
 
for($i=1; $i<$subscount; $i++){
	$subitem=array();
	$binstr=decbin($i);
	$binstr=str_pad($binstr,$numscount,'0',STR_PAD_LEFT );//������0��ʵ��0��ȫ
	for($j=0; $j<$numscount; $j++){
		if(1==$binstr[$j]){
			$subitem[]=$nums[$j];
		}
	}
	if(K==array_sum($subitem)){
		echo json_encode($subitem)."\n";
	}
}

 

 

