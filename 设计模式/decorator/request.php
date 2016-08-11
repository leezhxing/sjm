<?php
// Decorator && Intercepting Filter.

class RequestHelper{}

abstract class ProcessRequest {  //װ���ߺͱ�װ���߶���proecss���������Գ����һ����
    abstract function process( RequestHelper $req );
}

class MainProcess extends ProcessRequest {  //��װ�Σ��������
    function process( RequestHelper $req ) {
        print __CLASS__.": doing something useful with request\n";
    }
}

abstract class DecorateProcess extends ProcessRequest {   //װ���ߵĳ���
    protected $processrequest;
    function __construct( ProcessRequest $pr ) {
        $this->processrequest = $pr;
    }
}

class LogRequest extends DecorateProcess {   //�±������඼��װ����
    function process( RequestHelper $req ) {
        print __CLASS__.": logging request\n";
        $this->processrequest->process( $req );
    }
}

class AuthenticateRequest extends DecorateProcess {
    function process( RequestHelper $req ) {
        print __CLASS__.": authenticating request\n";
        $this->processrequest->process( $req );
    }
}

class StructureRequest extends DecorateProcess {
    function process( RequestHelper $req ) {
        print __CLASS__.": structuring request data\n";
        $this->processrequest->process( $req );
    }
}


$process = new AuthenticateRequest( new StructureRequest(   new LogRequest (  new MainProcess() ) ) );
$process->process( new RequestHelper() );

//output;
//AuthenticateRequest: authenticating request
//StructureRequest: structuring request data
//LogRequest: logging request
//MainProcess: doing something useful with request
