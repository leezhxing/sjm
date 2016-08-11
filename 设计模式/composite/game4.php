<?php

abstract class Unit {
    function getComposite() {  //�������壬���Ƿ�������ӽڵ㣬�����ũ�ڲ�����Ӽ�ũ��
        return null;
    }
    abstract function bombardStrength();
}


abstract class CompositeUnit extends Unit {  //������ϵ�Unit
    private $units = array();
    function getComposite() {  //������ϵ����ﷵ��$this 
        return $this;
    }
    protected function units() {
        return $this->units;
    }
    function removeUnit( Unit $unit ) {
        $this->units = array_udiff( $this->units, array( $unit ),
            function( $a, $b ) { return ($a === $b)?0:1; } );
    }
    function addUnit( Unit $unit ) {
        if ( in_array( $unit, $this->units, true ) ) {
            return;
        }
        $this->units[] = $unit;
    }
}

//��Unit��ʹ��
class UnitScript {
    static function joinExisting( Unit $newUnit, Unit $occupyingUnit ) {
        if ( ! is_null( $comp = $occupyingUnit->getComposite() ) ) { //�������ϣ�������ӣ���ֱ�����
            $comp->addUnit( $newUnit );
        } else {  //�Բ���ֱ����ӵĵ�Ԫ��Ҫ��newһ��army��Ϊ����ӵĵ�Ԫ��Ȼ���������Ԫ�������army
            $comp = new Army();  
            $comp->addUnit( $occupyingUnit );
            $comp->addUnit( $newUnit );
        }
        return $comp;
    }
}

/**
 * �˱���������װ�������
 */
class TroopCarrier extends  CompositeUnit {
    function addUnit( Unit $unit ) {
        if ( $unit instanceof Cavalry ) {
            throw new UnitException("Can't get a horse on the vehicle");
        }
        super::addUnit( $unit );
    }
    function bombardStrength() {
        return 0;
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
