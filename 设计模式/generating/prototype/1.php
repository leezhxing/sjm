<?php

/*ԭ��ģʽ
	ԭ��ģʽ����ͨ��clone�����µ���
	���ڴ���һ������ĺķ���Դ�Ƚ϶��ʱ�򣬻��ߴ����������ʱ��
*/
class Sea {}
class EarthSea extends Sea {}
class MarsSea extends Sea {}

class Plains {}
class EarthPlains extends Plains {}
class MarsPlains extends Plains {}

class Forest {}
class EarthForest extends Forest {}
class MarsForest extends Forest {}

/**
 * ���ι���
 * Class TerrainFactory
 */
class TerrainFactory {
    private $sea;
    private $forest;
    private $plains;
    function __construct( Sea $sea, Plains $plains, Forest $forest ) {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;
    }
    function getSea( ) {
        return clone $this->sea;
    }
    function getPlains( ) {
        return clone $this->plains;
    }
    function getForest( ) {
        return clone $this->forest;
    }
}

//�����ϵ�
$factory = new TerrainFactory( new EarthSea(), new EarthPlains(), new EarthForest() );
print_r( $factory->getSea() );
print_r( $factory->getPlains() );
print_r( $factory->getForest() );

//���򺣣�����ƽԭ������ɭ�֣�������ȥ����д����
$factory = new TerrainFactory( new EarthSea(), new MarsPlains(), new EarthForest() );
