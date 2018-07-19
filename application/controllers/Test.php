<?php
/**
 * @name IndexController
 * @author ms-20171018onml\administrator
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class TestController extends Yaf_Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/yaf/index/index/index/name/ms-20171018onml\administrator 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
		echo 123;exit;
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new SampleModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}
	public function addAction(){
		echo 321;
		return false;
	}
	public function aAction(){
		$data=array(
			'id'=>1,
			'name'=>'张三'
		);
		$arr=array(
			array(
				'id'=>2,
				'name'=>'李四'
			),
			array(
				'id'=>3,
				'name'=>'王五'
			)
		);
		$age='30';
		$this->getView()->assign('data',$data);
		$this->getView()->assign('age',$age);
		$this->getView()->assign('arr',$arr);
		return $this->getView()->render('test/a.phtml');
		return false;
	}
	public function showAction(){
		$t4=new T4Model();
		$res=$t4->add('insert into t4 (uname,pwd) values ("aaa", "bbb")');
		echo $res;exit;
		// $arr=$t4->get("select * from t4");
		// var_dump($arr);
		return false;
	}
	public function homeAction(){
		return $this->getView()->render('test/home.phtml');
	}
	public function maddAction(){
		if($this->getRequest()->isPost()){
			$uname=$this->getRequest()->getPost('uname');
			$content=$this->getRequest()->getPost('content');
			$msg=new MsgModel();
			$rs=$msg->add("insert into msg(uname,content,created_at) values('{$uname}','{$content}',".time().")");
			if($rs){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
		return false;
	}
}
