<?php

/**
 * ����
 */
abstract class Tile {
    abstract function getWealthFactor();
}

/**
 * ƽԭ
 */
class Plains extends Tile {
    private $wealthfactor = 2;
    //�Ƹ�����
    function getWealthFactor() {
        return $this->wealthfactor;
    }
}

/**
 * ����ʯƽԭ
 */
class DiamondPlains extends Plains {
    function getWealthFactor() {
        return parent::getWealthFactor() + 2;
    }
}

/**
 * ����Ⱦ��ƽԭ
 */
class PollutedPlains extends Plains {
    function getWealthFactor() {
        return parent::getWealthFactor() - 4;
    }
}

/**
 * ����Ⱦ��������ʯ��ƽԭ��ô���أ�
 */
//������
