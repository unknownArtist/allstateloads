<?php

/**
 * @author Darius 
 */
class Dashboard_TruckController extends Zend_Controller_Action {

    protected $_dbTable = null;

    public function init() {
       //  error_reporting();
        if ($this->_dbTable === null) {
            $this->_dbTable = new Dashboard_Model_NewTrucks();
        }
    }

    public function indexAction() {
        $select = $this->_dbTable->select()->where('public = ?', 1);
        $this->view->data = $this->_dbTable->fetchAll($select);
        
        
    }

    public function createAction() {
        $class = new Default_Model_DbTable_Trucktype();
       
        $data = $class->fetchAll()->toArray();
        unset($class);
        $array = array();
        foreach ($data as $item) {
            $array[$item['truck_type_id']] = $item['truck_type_name'];
        }
        unset($data);
        $form = new Dashboard_Form_Truck();
        $form->getElement('type')->addMultiOptions($array);

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $post = $form->getValues();
                $data = array(
                    'owner'         => Zend_Auth::getInstance()->getIdentity()->member_id,
                    'public'        => $post['public'],
                    's_state'       => $post['startState'],
                    's_city'        => $post['startCity'],
                    's_zip'         => $post['startZip'],
                    'e_state'       => $post['endState'],
                    'e_city'        => $post['endCity'],
                    'e_zip'         => $post['endZip'],
                    'team'          => $post['team'],
                    'full'          => $post['full'],
                    'weight'        => $post['weight'],
                    'feet'          => $post['feet'],
                    'feet_left'     => $post['feet_left'],
                    'type'          => $post['type'],
                    'phone'         => $post['phone'],
                    'email'         => $post['email'],
                    'created'       => date('Y-m-d')
                );

               // print_r($data);
               // die();
                
                $row = $this->_dbTable->createRow($data);
                if($row->save()) {
                    $this->_redirect('dashboard/manage');
                }
            } else {
                $form->populate($this->_request->getPost());
            }
        }

        $this->view->form = $form;
    }

}
