�߼������ۺ�ʵ����

����Ǹ߼�����summary�е�5.php�����ӡ�
����ߵ����������ռ�ķ�ʽ�ֿ���
Component  Singleton    Behavior  ��ŵ���baseĿ¼�£�ע����⡣
�ڸ�Ŀ¼��index.php�ж���spl_autoload_register�Զ�ע�ắ�����úÿ�һ�¡�

һ�������׳��쳣��ע��㣨��FileDb.php�ļ��У���
fopen��Ϊ��ֲ�Կ��ǣ�ǿ�ҽ������� fopen() ���ļ�ʱ����ʹ�� "b" ��ǡ����ֲ���͡�
fopen��ʧ�ܻᱨ����Ҫ���Ʊ���@��ͬʱ����false��
���Ը�fopen����쳣����ʱ��
if( $fp = @fopen( 'a.txt', 'a+' ) === false ){
	throw new Exception(...);
}
ͬʱע�⣺
�����쳣��Ҫ���׳��±߲���FileDb��ֻ�����׳��������ڵ��������ĵط����񡣱�������index.php��20�в���
��ʵ�����õ�����쳣�ĵĵط���FileDb���init()������trait Singleton����construct����ʱ������init���������������û�в���
�쳣�ͻ�����ð��Ȼ��ð��getInstance��������Ϊnew static()������������еġ�
