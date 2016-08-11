<?php
//--- 2. �Ѷ���ʵ�����Ĺ���ί�г���------------------------------------------------------


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
 * Class CluedUp ��ѧ�ʵ�Ա��
 */
class CluedUp extends Employee {
    function fire() {
        print "{$this->name}����Ҫ���ҵ���ʦ\n";
    }
}

/**
 * Class NastyBoss
 */
class NastyBoss {
    private $employees = array();

    function addEmployee( Employee $employee ) {   //���Ա��ʱ��Խӿڣ��������ʵ��
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
$boss->addEmployee( new Minion( "��÷÷" ) );  //�����������͵�Ա��
$boss->addEmployee( new CluedUp( "����" ) );
$boss->addEmployee( new Minion( "·��" ) );
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();

//·����������������������
//���ף���Ҫ���ҵ���ʦ
//��÷÷��������������������

//q
