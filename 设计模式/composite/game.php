<?php

//game2.php�Ѳ��������֣���ũ�ڻ��Ǿ��Ӷ�����ΪUnit

/**
 * ս����Ԫ��ʿ����
 */
abstract class Unit {
    //��������
    abstract function bombardStrength();
}

/**
 * ����
 */
class Archer extends Unit {
    function bombardStrength() {
        return 4;
    }
}

/**
 * ��ũ��
 */
class LaserCannonUnit extends Unit {
    function bombardStrength() {
        return 44;
    }
}


/**
 * ����
 */
class Army {
    private $units = array();
    private $armies = array();

    function bombardStrength() {
        $ret = 0;
        //���ӿ�����ս����Ԫ���
        foreach( $this->units as $unit ) {
            $ret += $unit->bombardStrength();
        }
        //����ӻ�����������С������ɣ�
        foreach( $this->armies as $army ) {
            $ret += $army->bombardStrength();
        }
        return $ret;
    }


    function addUnit( Unit $unit ) {
        array_push( $this->units, $unit );
    }

    function addArmy( Army $army ) {
        array_push( $this->armies, $army );
    }
}

// ��һ��������һ�£���ȡ���з���


