<?php
//-- 1. ��թ�ϰ�������Ա�� --------------------------------------------------------

//
abstract class Employee {
    protected $name;
    function __construct( $name ) {
        $this->name = $name;
    }
    abstract function fire(); #��
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
 * Class NastyBoss
 */
class NastyBoss {
    private $employees = array();

    function addEmployee( $employeeName ) {
        $this->employees[] = new Minion( $employeeName ); #!
    }

    /**
