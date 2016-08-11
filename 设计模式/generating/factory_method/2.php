<?php

//--- 2 -----------------------------------------------

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

// Ҳ������
abstract class CommsManager {
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getFooterText();
}


class BloggsCommsManager extends CommsManager {
    function getHeaderText() {
        return "BloggsCal header\n";
    }
    function getApptEncoder() {
        return new BloggsApptEncoder();
    }
    function getFooterText() {
        return "BloggsCal footer\n";
    }
}


$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();
