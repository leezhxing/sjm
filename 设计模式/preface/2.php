<?php
/**
 * ���һ���࣬����ͬ�Ŀγ�����ִ�в�ͬ���߼�.
 * ��Σ��ƷѸ��á����ԡ�ʵ��
 * ����ģʽ
 * �������ݿ�ķ�װ���Ƿ�ֹ�Ժ�����޸����ݿ���ٸĴ��롣
 */

/**
 * Class Lesson
 */
abstract class Lesson {
    private $duration;
    private $costStrategy; #!
    function __construct( $duration, CostStrategy $strategy ) {  //�ڶ���������ʾ�����ǳ�����CostStrategy������
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }
    function cost() {
        return $this->costStrategy->cost( $this );
    }
    function chargeType() {
        return $this->costStrategy->chargeType( );
    }
    function getDuration() {
        return $this->duration;
    }
    // ���෽��...
}

/**
 * ����
 */
class Lecture extends Lesson {
    // Lecture �ض���ʵ�� ...
}

/**
 * ���ְ�
 */
class Seminar extends Lesson {
    // Seminar �ض���ʵ�� ...
}

/**
 * Class CostStrategy
 */
abstract class CostStrategy {
    abstract function cost( Lesson $lesson );
    abstract function chargeType();
}

/**
 * ��ʱ�շѲ���
 */
class TimedCostStrategy extends CostStrategy {
    function cost( Lesson $lesson ) {
        return ( $lesson->getDuration() * 5 );
    }
    function chargeType() {
        return "��ʱ�շ�";
    }
}

/**
 * �̶��շѲ���
 */
class FixedCostStrategy extends CostStrategy {
    function cost( Lesson $lesson ) {
        return 30;
    }
    function chargeType() {
        return "�̶��շ�";
    }
}

/*
 * test
 */
/*
$lessons[] = new Lecture( 5, new FixedCostStrategy() );
$lessons[] = new Seminar( 3, new TimedCostStrategy() );

foreach ( $lessons as $lesson ) {
    echo "{$lesson->cost()} ({$lesson->chargeType()})\n";
}


//30 (�̶��շ�)
//15 (��ʱ�շ�)
