<?php

class Default_Model_DbTable_Metadata extends Zend_Db_Table_Abstract
{

    protected $_name = 'zf_metadata';
        
    
    public function getDataBy() 
    {
        $data = $this->fetchAll('id_type = 1 ');
        
        return $data->toArray();
    }


}

