<?php

class Person {
	
	private $name;
	private $age;
	
	function __construct($name, $age) {
	   $this->name=$name;
	   $this->age=$age;
	}
	
	public function getAge (){
		return $this->age;
	}

}

$objs=array();
$objs[]=new Person( '����', 18 );
$objs[]=new Person( '����', 56 );
$objs[]=new Person( '����', 9 );
$objs[]=new Person( '����', 25 );


usort($objs,function($obja,$objb){
	return ($obja->getAge()- $objb->getAge() );
});

print_r($objs);
