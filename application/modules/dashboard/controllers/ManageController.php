<?php

class Dashboard_ManageController extends Zend_Controller_Action
{
     protected $_dbTable = null;

   
    public function init() {
       //  error_reporting();
        if ($this->_dbTable === null) {
            $this->_dbTable = new Dashboard_Model_NewTrucks();
        }
    }

   

    public function indexAction() 
	{
       
		$id = Zend_Auth::getInstance()->getIdentity()->member_id;
        $data = new Dashboard_Model_NewTrucks();
		$where = "owner = '$id'";
	
        $this->view->data = $this->_dbTable->fetchAll($where);
        
        
    }

    public function trucksAction()
    {
       $select = $this->_dbTable->select()->where('public = ?', 1);
        $this->view->data = $this->_dbTable->fetchAll($select); 
    }

    public function loadsAction()
    {

		
		 $select = new Default_Model_DbTable_Loads();
       $id = Zend_auth::getInstance()->getIdentity()->member_id;
       $where = 'owner = ' . "$id";
       $this->view->loads = $select->fetchAll($where);
    }
}





