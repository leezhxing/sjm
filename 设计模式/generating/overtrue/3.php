<?php
//--- 3. ��һ�����Ӱɣ���������Ա���� -------------------------------------------------------


abstract class Employee {
    protected $name;
    private static $types = array( 'Minion', 'CluedUp', 'WellConnected' );
    static function create( $name ) {
        $num = rand( 1, count( self::$types ) )-1; #��ͳһ����
        $class = self::$types[$num];  //new class����������new�أ�������
        return new $class( $name );
    }
    function __construct( $name ) {
        $this->name = $name;
    }
    abstract function fire();
}


/**
 * Class Minion ����Ա��
 */
class Minion extends Employee {
    function fire() {
        print "{$this->name}��������������������\n";
    }
}

/**
 * Class CluedUp ��ѧ�ʵ�Ա��
 */
class CluedUp extends Employee {
    function fire() {
        print "{$this->name}����Ҫ���ҵ���ʦ\n";
    }
}


/**
 * Class WellConnected ţ����Ա��
 */
class WellConnected extends Employee {
    function fire() {
        print "{$this->name}���Ұ�����գ�\n";
    }
}


/**
 * Class NastyBoss
 */
class NastyBoss {
    private $employees = array();

    function addEmployee( Employee $employee ) {
        $this->employees[] = $employee; #!
    }

    /**
     * ��Ŀÿʧ��һ�ξͿ���һ��
     */
    function projectFails() {
        if ( count( $this->employees ) > 0 ) {
            $emp = array_pop( $this->employees );
            $emp->fire();
        }
    }
}

$boss = new NastyBoss();
$boss->addEmployee( Employee::create( "����" ) );
$boss->addEmployee( Employee::create( "��÷÷" ) );
$boss->addEmployee( Employee::create( "·��" ) );

$boss->projectFails();
$boss->projectFails();
$boss->projectFails();
//q

