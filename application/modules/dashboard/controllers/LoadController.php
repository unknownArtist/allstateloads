<?php
/**
 * @author Darius 
 */
 
class Dashboard_LoadController extends Zend_Controller_Action
{
   
    public function indexAction()
    {
        $select = new Default_Model_DbTable_Loads();
        $this->view->loads = $select->fetchAll();
		
    }

   public function mytrucksAction()
   {
       $select = new Default_Model_DbTable_Loads();
       $id = Zend_auth::getInstance()->getIdentity()->member_id;
       $where = 'owner = ' . "$id";
       $this->view->myLoads = $select->fetchAll($where);
       
   }

   public function addAction()
   {

        $form = new Dashboard_Form_Addload();
        $this->view->addLoad = $form;

        $getters = new Default_Model_DbTable_Loads();
        

       if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
                $post = $form->getValues();
                $data = array(
                    
                    'owner'             => Zend_auth::getInstance()->getIdentity()->member_id,
                    'startState'        => $post['startState'],
                    'startCity'         => $post['startCity'],
                    'startZip'          => $post['startZip'],
                    'endState'          => $post['endState'],
                    'endCity'           => $post['endCity'],
                    'endZip'            => $post['endZip'],
                    'weight'            => $post['weight'],
                    'feet'              => $post['feet'],
                    'pickupDate'        => $post['pickupDate'],
                    'diliveryDate'      => $post['diliveryDate'],
                    'truckType'         => $post['truckType'],
                    'email'             => $post['email'],
                    'phone'             => $post['phone'],
                    'extra'             => $post['extra'],

                    
                );

         if($getters->addToLoads($data))
         {
             $this->_redirect('dashboard/manage/loads');
         }
         else
         {
             $form->populate($post);
         }


                
            }
       }
   }
}