<?php

class Dashboard_IndexController extends Zend_Controller_Action
{
    
	
	public function indexAction()
    {

        
       $Identity = Zend_Auth::getInstance()->getIdentity()->member_id;
       $role = Zend_Auth::getInstance()->getIdentity()->member_role;
          // echo $role;
          // die();
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
        if($role == 4)//trucker
        {
       
         $sql = "SELECT loads.startCity, loads.owner, loads.endCity, loads.id, loads.truckType, loads.diliveryDate, loads.pickupDate ,loads.phone ,loads.extra ,loads.email ,loads.feet , loads.weight
                FROM loads INNER JOIN newtrucks ON newtrucks.s_city = loads.startCity  
                WHERE newtrucks.e_city = loads.endCity  
                 AND 
                newtrucks.owner = '$Identity'
                AND newtrucks.feet_left >= loads.feet
                AND newtrucks.weight >= loads.weight
                AND newtrucks.type = loads.truckType 
               ";
             

             $temp = $db->fetchAll($sql);
             $this->view->states = $temp;
         }
         elseif($role == 3){
             $sql = "SELECT newtrucks.s_city, newtrucks.owner, newtrucks.e_city, newtrucks.weight, newtrucks.feet, newtrucks.feet_left, newtrucks.type
                FROM newtrucks INNER JOIN loads ON  loads.startCity = newtrucks.s_city
                WHERE loads.endCity = newtrucks.e_city  
                 AND 
                loads.owner = '$Identity'
                AND loads.feet <= newtrucks.feet_left 
                AND loads.weight <= newtrucks.weight 
                AND loads.truckType = newtrucks.type 
               "; 
             

             $temp = $db->fetchAll($sql);
             $this->view->states = $temp;
         }
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





