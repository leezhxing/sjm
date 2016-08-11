<?php

abstract class Fan {
    abstract public function getFan();
}

class Mi extends Fan {
    public function getFan() {
        return "�׷�";
    }
}

abstract class FanDecorator extends Fan {
    protected $fan;
    public function __construct($fan) {
        $this->fan = $fan;
    }
}

class JiaJiDan extends FanDecorator {
    public function getFan() {
        return "���˼�����".$this->fan->getFan();
    }
}


class JiaCong extends FanDecorator {
    public function getFan() {
        return "���˴е�".$this->fan->getFan();
    }
}


class JiaYou extends FanDecorator {
    public function getFan() {
        return "�����͵�".$this->fan->getFan();
    }
}
header("Content-type: text/html; charset=utf-8");
$fan = new JiaYou(new JiaJiDan(new Mi()));
echo $fan->getFan();

echo "\n";
$fan = new JiaCong(new JiaYou(new Mi()));
echo $fan->getFan();