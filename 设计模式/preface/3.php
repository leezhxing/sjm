<?php
include(__DIR__.'/2.php');

/**
 * ע������������û�ͨ����վע�ᱨ������վ����Ҫ��֪ͨ���û���
 */

/**
 * Class RegistrationMgr
 */
class RegistrationMgr {
    function register( Lesson $lesson ) {
        // һЩ�����ע���߼�������
        // ������Ϣ��
        $notifier = Notifier::getNotifier(); #!ͨ�����󹤳���ȡ����� Notifier
        $notifier->inform( "��ע�����¿γ̣�����Ϊ��{$lesson->cost()}���뾡��ɷѡ���" );
    }
}

abstract class Notifier {
    static function getNotifier() {
        // ��������ǰ��������û����û����������е�ѡ�ʹ�ò�ͬ�ķ�ʽ���ͣ�
        if ( rand(1,2) === 1 ) {
            return new MailNotifier();
        } else {
            return new TextNotifier();
        }
    }
    abstract function inform( $message );
}

class MailNotifier extends Notifier {
    function inform( $message ) {
        print "�ʼ�֪ͨ��{$message}\n";
    }
}
class TextNotifier extends Notifier {
    function inform( $message ) {
        print "����֪ͨ��{$message}\n";
    }
}


$lessons2 = new Lecture( 5, new FixedCostStrategy() );
$lessons1 = new Seminar( 3, new TimedCostStrategy() );

$mgr = new RegistrationMgr();
$mgr->register( $lessons1 );
$mgr->register( $lessons2 );

//����֪ͨ����ע�����¿γ̣�����Ϊ��15���뾡��ɷѡ���
//����֪ͨ����ע�����¿γ̣�����Ϊ��30���뾡��ɷѡ���
