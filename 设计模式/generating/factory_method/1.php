<?php
/**
 * ҵ�񳡾���һ������ԤԼ����ϵͳ��
 * ��ϵͳ��Ҫ������ϵͳ�������ݣ�
 * ��Ҫʹ�ò�ͬ�ı�������
 * �Ժ�ܿ��������µı�����
 */

// Encoder ������
abstract class ApptEncoder {
    abstract function encode();
}

// ���־����Encoder
class BloggsApptEncoder extends ApptEncoder {
    function encode() {
        return "BloggsCal ��ʽ��ԤԼ����\n";
    }
}
class MegaApptEncoder extends ApptEncoder {
    function encode() {
        return "MegaCal ��ʽ��ԤԼ����\n";
    }
}

// ����������ɾ����Encoder
class CommsManager {
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode = 1;
    function __construct( $mode ) {
        $this->mode = $mode;
    }

// 2. ÿ��һ���߼���Ҫ�ж���
    function getHeaderText() {
        switch ( $this->mode ) {
            case ( self::MEGA ):
                return "MegaCal header\n";
            default:
                return "BloggsCal header\n";
        }
    }

    function getApptEncoder() {
        switch ( $this->mode ) {
            case ( self::MEGA ):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }
}

$comms = new CommsManager( CommsManager::MEGA );
$apptEncoder = $comms->getApptEncoder();
print $apptEncoder->encode();
