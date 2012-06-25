<?php

class Default_Model_DbTable_Members extends Zend_Db_Table_Abstract
{
	protected $_name = 'members';
	protected $_primary = 'member_id';

        public function login($username, $password)
    {
        
    	$auth = Zend_Auth::getInstance();
    	$db = Zend_Db_Table::getDefaultAdapter();

    	$authAdapter = new Zend_Auth_Adapter_DbTable($db, $this->_name, 'member_username', 'member_pass');

    	$authAdapter->setIdentity($username)
    	            ->setCredential($password);

    	$result = $auth->authenticate($authAdapter);

    	if($result->isValid()) {
    		//what will be saved in SESSION array
    		$auth->getStorage()->write($authAdapter->getResultRowObject(array('member_id', 'member_role', 'member_username')));
    		//$session = new Zend_Session_Namespace('Zend_Auth');
    		return true;
    	}
    	return $error_msg = $result->getMessages();
    }
	
}

