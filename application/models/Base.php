<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author ms-20171018onml\administrator
 */
class BaseModel {
	protected $db;
    public function __construct() {
		$this->db=new PDO('mysql:dbname=framework','root','root');
    }   
    
    public function get($sql) {
		$result=$this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($sql) {
        return $this->db->exec($sql);
    }
}
