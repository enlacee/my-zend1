<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';


    public function getSelect()
    {
		$db = $this->getAdapter();
        //mostramos las 8 primeras filas
        $sql = $db->select()
        	->limit(10)
        	->from($this->_name);
        	//->where()

 		$rs = $db->fetchAll($sql);

 		return $rs;
    }

/*
$data = array(
    'created_on'      => '2007-03-22',
    'bug_description' => 'Something wrong',
    'bug_status'      => 'NEW'
);
 
$table->insert($data);
*/


}

