<?php
/**
 * ���һ���࣬����ͬ�Ŀγ�����ִ�в�ͬ���߼�.
 * ���ʹ�ø��������жϡ���switch.
 */

/**
 * Class Lesson
 */
abstract class Lesson {
    private $duration;
    const FIXED = 1;
    const TIMED = 2;
    private $costtype;
    function __construct( $duration, $costtype=1 ) {
        $this->duration = $duration;
        $this->costtype = $costtype;
    }
    function cost() {
        switch ( $this->costtype ) {
            CASE self::TIMED :
                return (5 * $this->duration);
                break;
            CASE self::FIXED :
                return 30;
                break;
            default:
                $this->costtype = self::FIXED;
                return 30;
        }
    }

    function chargeType() {
        switch ( $this->costtype ) {
            CASE self::TIMED :
                return "��ʱ�շ�";
                break;
            CASE self::FIXED :
                return "�̶��շ�";
                break;
            default:
                $this->costtype = self::FIXED;
                return "�̶��շ�";
        }
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

$lecture = new Lecture( 5, Lesson::FIXED );
echo "{$lecture->cost()} ({$lecture->chargeType()})\n";

$seminar= new Seminar( 3, Lesson::TIMED );
echo "{$seminar->cost()} ({$seminar->chargeType()})\n";


//30 (�̶��շ�)
//15 (��ʱ�շ�)
