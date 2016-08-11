<?php

!defined('IN_APP') && exit('Access Denied');

class exammodel extends modelbase {


	private $rightAnswers = array(
		"B","C","A","B","A",
		"C","D","D","B","C",
		"B","D","A","D","C",
		"D","B","C","D","B"
	);

	function __construct($base) {
		parent::__construct($base);
		$this->convert=true;
		$this->sortfields = array('id'=>1);
	}
	
	function add($exam){
        $exam['score'] = 100-count(array_diff_assoc($exam['answers'],$this->rightAnswers))*5;
		$findexam=$this->findRow( array('phone'=>$exam['phone']) );
		$exam['sendsms'] = 0;
		$exam['sendmail'] = 0;
		return empty($findexam) ? $this->insert($exam) : 0 ; //����Ѿ����Թ������ٷ��Ͷ��š�
	}

 	function convert($item){
		//$item['format_dateline'] = tdate($item['dateline']);
		return $item;
	}
	
	//��ȡ�����ͱ�־��ͬʱ��־Ϊ�Ѿ�����
	function findAndUpSms(){
		//$criteria=array('sendsms'=>array('$exists'=>false) );
		$criteria=array( 'sendsms'=> 0 );//Ĭ�ϲ����Ϊ0
		$fields=array('truename'=>1,'phone'=>1,'score'=>1 );
		$items = $this->findAll($criteria,$fields);
		//���±�ʶ������Ϊ�Ѿ����Ͷ���
		$this->update($criteria, array('sendsms'=>1 ));
		return $items;
	}
	
	 
}

