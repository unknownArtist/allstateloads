<?php

class Dashboard_IndexController extends Zend_Controller_Action
{
    
	
	public function indexAction()
    {
       $Identity = Zend_Auth::getInstance()->getIdentity()->member_id;
          
                 $db = Zend_Db::factory('Pdo_Mysql', array(
               // 'host'     => 'localhost',
               // 'username' => 'allstatewwh',
               // 'password' => 'H133413X',
              //  'dbname'   => 'allstatewwh'
				'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'allstatewwh'
            ));
         
          
         $sql ="select loads.startCity,loads.owner, loads.endCity, loads.id, loads.truckType, loads.diliveryDate, loads.pickupDate ,loads.phone ,loads.extra ,loads.email ,loads.feet , loads.weight
                from loads  inner join newtrucks on newtrucks.s_city = loads.startCity  
                where newtrucks.e_city = loads.endCity  
                 and 
                newtrucks.owner = '$Identity'
                and newtrucks.feet_left >= loads.feet
                and newtrucks.weight >= loads.weight
                and newtrucks.type = loads.truckType 
               ";
         
         $temp = $db->fetchAll($sql);
         $this->view->states = $temp;

		 
     
   }


	 public function truckersindexAction()
    {
        
    }
	
	 public function loadersindexAction()
    {
        
    }

    public function myTrucksAction()
    {
        $dbTable = new Dashboard_Model_NewTrucks();
        
        $select = $dbTable->select()->where('owner = ?', Zend_Auth::getInstance()->getIdentity()->member_id->member_role);
        $this->view->data = $dbTable->fetchAll($select)->toArray();
    }

    public function myLoadsAction()
    {

    }
}





