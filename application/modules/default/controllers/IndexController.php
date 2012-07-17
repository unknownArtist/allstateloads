<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $this->view->headTitle()->prepend('Home page');
        //data = new Default_Model_DbTable_News();
		//$offset = "2";
        //$this->view->data = $data->fetchAll($offset);
        $loads = new Default_Model_DbTable_Loads();

         $l_data = $loads->fetchAll($where = null,'id DESC','7,0');
            
        $this->view->l_data = $l_data;



        $trucks = new Dashboard_Model_NewTrucks();

         $t_data = $trucks->fetchAll($where = null,'created DESC','7,0');
         $this->view->t_data = $t_data;


    }

    public function aboutAction()
    {
        $this->view->headTitle()->prepend('About page');
    }

}