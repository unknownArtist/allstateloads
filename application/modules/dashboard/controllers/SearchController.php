<?php

class Dashboard_SearchController extends Zend_Controller_Action
{
    public function indexAction()
    {
        
    }

    public function truckersAction()
    {
           $form = new Dashboard_Form_SearchForm();
           $this->view->form = $form;

            if($this->getRequest()->isPost())
            {
                $formData = $this->getRequest()->getPost();
                if($form->isValid($formData))
                {
                  $leaveFrom             = $form->getValue('leavingFrom');
                  $goingTo               = $form->getValue('goingTo');
                  $trailerTypeFlatBed    = $form->getValue('trailerTypeFlatBed');
                  $trailerVan            = $form->getValue('trailerTypeVan');
                  $trailerTanker         = $form->getValue('trailerTypeTanker');
                  $trailerStrectTrailer  = $form->getValue('trailerTypeStrectTrailer');
                  $trailerselectDate     = $form->getValue('selectDate');
                  $pickupDate            = $form->getValue('selectDate');

               if($trailerTypeFlatBed == 1)  { $trailerTypeFlatBed = "2";  }
               if($trailerVan == 1)          { $trailerVan = "1";   }
               if($trailerTanker == 1)       { $trailerTanker = "3";  }
               if($trailerStrectTrailer = 1) { $trailerStrectTrailer = "4"; }
               
               
               $appliedSearch = new Default_Model_DbTable_Loads();

               $where = "startCity = '$leaveFrom' and endCity = '$goingTo' and 
               pickupDate = '$pickupDate' and truckType IN           
               ('$trailerTypeFlatBed', '$trailerVan', '$trailerTanker', '$trailerStrectTrailer')";
               $result = $appliedSearch->fetchAll($where); 
               $this->view->resultOfSearch = $result;
               
                    
                }
                else
                {
                    $form->populate($formData);
                }
            }
            
    }

    public function loadersAction()
    {
            $form = new Dashboard_Form_SearchForm();
            $this->view->form = $form;
            
            if($this->getRequest()->isPost())
            {
                $formData = $this->getRequest()->getPost();
                if($form->isValid($formData))
                {
                  $leaveFrom             = $form->getValue('leavingFrom');
                  $goingTo               = $form->getValue('goingTo');
                  $trailerTypeFlatBed    = $form->getValue('trailerTypeFlatBed');
                  $trailerVan            = $form->getValue('trailerTypeVan');
                  $trailerTanker         = $form->getValue('trailerTypeTanker');
                  $trailerStrectTrailer  = $form->getValue('trailerTypeStrectTrailer');
                  $trailerselectDate     = $form->getValue('selectDate');
                  $pickupDate            = $form->getValue('selectDate');

               if($trailerTypeFlatBed == 1)  { $trailerTypeFlatBed = "2";  }
               if($trailerVan == 1)          { $trailerVan = "1";   }
               if($trailerTanker == 1)       { $trailerTanker = "3";  }
               if($trailerStrectTrailer = 1) { $trailerStrectTrailer = "4"; }
               
               
               $appliedSearch = new Default_Model_DbTable_Truck();

               $where = "s_city = '$leaveFrom' and e_city = '$goingTo' and 
               startingDate = '$pickupDate' and truckType IN           
               ('$trailerTypeFlatBed', '$trailerVan', '$trailerTanker', '$trailerStrectTrailer')";
               $result = $appliedSearch->fetchAll($where); 
               $this->view->resultOfSearch = $result;
               
                    
                }
                else
                {
                    $form->populate($formData);
                }
            }
            
    }
    
    public function searchViewAction()
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
       
         $sql = "SELECT loads.owner, loads.startCity, loads.endCity, loads.id, loads.diliveryDate, loads.pickupDate ,loads.phone ,loads.extra ,loads.email ,loads.feet , loads.weight
                FROM loads INNER JOIN newtrucks ON newtrucks.s_city = loads.startCity  
                WHERE newtrucks.e_city = loads.endCity  
                 AND 
                newtrucks.owner = '$Identity'
                AND newtrucks.feet_left >= loads.feet
                AND newtrucks.weight >= loads.weight
                AND newtrucks.type = loads.truckType 
               ";
             

             $temp1 = $db->fetchRow($sql);
             $this->view->t_states = $temp1;
         }
         else
          {
            if($role == 3){
            
             $sql = "SELECT newtrucks.s_city, newtrucks.owner, newtrucks.e_city, newtrucks.weight, newtrucks.feet, newtrucks.feet_left, newtrucks.type ,newtrucks.via, newtrucks.id, newtrucks.startingDate, newtrucks.phone, newtrucks.email
                FROM newtrucks INNER JOIN loads ON  loads.startCity = newtrucks.s_city
                WHERE loads.endCity = newtrucks.e_city  
                 AND 
                loads.owner = '$Identity'
                AND loads.feet <= newtrucks.feet_left 
                AND loads.weight <= newtrucks.weight 
                AND loads.truckType = newtrucks.type 
               "; 
             

             $temp2 = $db->fetchRow($sql);
             $this->view->l_states = $temp2;
         } 
            }   
    }
    
    
}