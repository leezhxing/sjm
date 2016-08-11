<?php
class obj 
{
    private $container = array();

    public function __construct()
    {
        $this->container = array(
            "one" => 1,
            "two" => 2,
            "three" => 3,
        );
    }

    //���һ��ƫ��λ���Ƿ����
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    //��ȡһ��ƫ��λ�õ�ֵ
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    //����һ��ƫ��λ�õ�ֵ
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    //��λһ��ƫ��λ�õ�ֵ
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

}

$obj = new obj;
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);

var_dump(isset($obj["two"]));

var_dump($obj["two"]);

unset($obj["two"]);
var_dump(isset($obj["two"]));

$obj["two"] = "A value";
var_dump($obj["two"]);





