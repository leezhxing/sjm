<?php
#6������תΪ����
//�������Բ��ɷ��ʣ�
//˽�б���ǰ�����������ǰ׺��
//��������ǰ�����һ�� '*' ��ǰ׺��
//��Щǰ׺��ǰ�󶼸���һ�� NULL �ַ���
class User{
	public $name='andy';
	public $age=52;
    private $phone='138XXXXXXXX';
	protected $locaton='hongkong';
    
    public function __construct()
    {
        $this->test = 'test';
    }
}

var_dump((array) new User());

