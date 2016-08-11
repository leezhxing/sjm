<?php   

/*
���ģʽ������Ҷ�ӽڵ㻹��Ҷ�ڵ�϶�Ҫ�Ƕ��̳�һ������
*/
abstract class MenuComponent  //��ͬ��һ������
{  
    public function add($component){}  
    public function remove($component){}  
    public function getName(){}  
    public function getUrl(){}  
    public function displayOperation(){}  
}  
/** 
 * ��֦������ɫ��Composite�� 
 * 
 */  
class MenuComposite extends MenuComponent  
{  
    private $_items = array();  
    private $_name = null;  
	
    public function __construct($name) {  
        $this->_name = $name;  
    }  
    public function add($component) {  
        $this->_items[$component->getName()] = $component;  
    }  
    public function remove($component) {  
        $key = array_search($component,$this->_items);  
        if($key !== false) unset($this->_items[$key]);  
    }  
    public function getItems() {  
        return $this->_items;  
    }  
      
    public function displayOperation($prefix='|') {  

        if($this->getItems()) {  
            $prefix .= ' _ _ ';  
        }else{  
            $prefix .='';  
        }  
        echo $this->_name, " <br />\n";
        foreach($this->_items as $name=> $item) {  
            echo $prefix;  
            $item->displayOperation($prefix);  
        }  
    }  
  
    public function getName(){  
        return $this->_name;  
    }  
}  
  
/** 
 *��Ҷ������ɫ(Leaf) 
 * 
 */  
class ItemLeaf extends MenuComponent  
{  
    private $_name = null;  
    private $_url = null;  

    public function __construct($name,$url)  
    {  
        $this->_name = $name;  
        $this->_url = $url;  
    }  
  
    public function displayOperation($prefix='')  
    {  
        echo '<a href="', $this->_url, '">' , $this->_name, "</a><br />\n";
    }  
  
    public function getName(){  
        return $this->_name;  
    }  
}  
  



$bj = new MenuComposite("����"); 

$cy = new ItemLeaf("������","chaoyang.com"); 
$hd = new ItemLeaf("������","haidian.com"); 
  
$bj->add($cy); 
$bj->add($hd); 

$yn = new MenuComposite("����"); 
$zt = new MenuComposite("��ͨ��");
$sj = new ItemLeaf("�罭��", "suijiang.gov.cn");

$zt->add($sj);
$yn->add($zt);

$sd = new MenuComposite("ɽ��");  
$sd->add(new ItemLeaf("����", "jinan.gov.cn"));

  
$allMenu = new MenuComposite("�й�");  
$allMenu->add($bj);  
$allMenu->add($yn);  
$allMenu->add($sd);


$allMenu->displayOperation();  


// ֻ��ʾ���ϵ�
$yn->displayOperation();

