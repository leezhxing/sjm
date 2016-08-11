<?php

//Ŀ���ɫ

interface Target {  
    public function simpleMethod1();  
    public function simpleMethod2();  
}
  
//Դ��ɫ  
class Adaptee {  
      
    public function simpleMethod1(){  
        echo 'Adapter simpleMethod1'."<br>";  
    }  
}  
  
//����������ɫ  
class Adapter implements Target {  
    private $adaptee;  
      
      
    function __construct(Adaptee $adaptee) {  
        $this->adaptee = $adaptee;   
    }  
      
    //ί�ɵ���Adaptee��sampleMethod1����  
    public function simpleMethod1(){  
        echo $this->adaptee->simpleMethod1();  
    }  
      
    public function simpleMethod2(){  
        echo 'Adapter simpleMethod2'."<br>";     
    }   
      
}  
  
//�ͻ���  

$adaptee = new Adaptee();  
$adapter = new Adapter($adaptee);  
$adapter->simpleMethod1();  
$adapter->simpleMethod2();   
