<?php

/**
 * 1 ս����Ԫ��ʿ����
 */
abstract class Unit {
    //��ը����
    abstract function bombardStrength();
    abstract function addUnit( Unit $unit );
    abstract function removeUnit( Unit $unit );
}




/**
 * 2 ����
 */
class Army extends Unit{
    private $units = array();
    function addUnit( Unit $unit ) {
        if ( in_array( $unit, $this->units, true ) ) {
            return;
        }
        $this->units[] = $unit;
    }
    function removeUnit( Unit $unit ) {
        $this->units = array_udiff( $this->units, array( $unit ),function( $a, $b ) {
            return ($a === $b)?0:1;
        } );
    }

    function bombardStrength() {
        $ret = 0;
        foreach( $this->units as $unit ) {
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }
}


/**
 * 3 ����  //�ϱߵľ��ӿ������ʿ�����������ֲ�������������ˣ�����addUnit�ȷ������׳��쳣
 */
class UnitException extends Exception {}

class Archer extends Unit {
    function addUnit( Unit $unit ) {
        throw new UnitException( get_class($this)." is a leaf" );
    }
    function removeUnit( Unit $unit ) {
        throw new UnitException( get_class($this)." is a leaf" );
    }
    function bombardStrength() {
        return 4;
    }
}

/**
 * ��ũ��
 */
class LaserCannonUnit extends Unit {
    // ���ֺͼ�ũ�ڼ���Ĳ������������Ԫ�ˣ�ÿ�����������඼Ҫдexception�������ô�Ż��أ�
    function addUnit( Unit $unit ) {
        throw new UnitException( get_class($this)." is a leaf" );
    }
    function removeUnit( Unit $unit ) {
        throw new UnitException( get_class($this)." is a leaf" );
    }
    function bombardStrength() {
        return 44;
    }
}
