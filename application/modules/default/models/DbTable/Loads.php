<?php

class Default_Model_DbTable_Loads extends Zend_Db_Table_Abstract
{
    protected $_name = 'loads';
    protected $_primary = 'id';


    public function addToLoads($data)
    {
   
        $this->insert($data);
            return true;

    }

}

