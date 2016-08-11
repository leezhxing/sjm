<?php

/**
 * 1 ս����Ԫ��ʿ����
 */
abstract class Unit {
    //��ը����
    abstract function bombardStrength();
    function addUnit( Unit $unit ) {
        throw new UnitException( get_class($this)." is a leaf" );
    }
    function removeUnit( Unit $unit ) {
        throw new UnitException( get_class($this)." is a leaf" );
    }
}


/**
 * 2 ����
 */
class Army extends Unit{
    private $units = array();
    function addUnit( Unit $unit ) {
        if ( in_array( $unit, $this->units, true ) ) {   //���һ��clone�����ǲ��е�
            return;
        }
        $this->units[] = $unit;
    }
    function removeUnit( Unit $unit ) {
        $this->units = array_udiff( $this->units, array( $unit ),function( $a, $b ) { return ($a === $b)?0:1; } );
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
 * 3 ����
 */
class UnitException extends Exception {}
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


// ����һ������
$main_army = new Army();
// ���ս����Ԫ
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannonUnit() );

// ����һ��С����
$sub_army = new Army();
// ���ս����Ԫ
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );

// ��С���Ӽ�������
$main_army->addUnit( $sub_army );

// �����ܵĹ�����
print "attacking with strength: {$main_army->bombardStrength()}\n";
