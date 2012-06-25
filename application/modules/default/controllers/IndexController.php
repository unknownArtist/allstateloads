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
		
    }

    public function aboutAction()
    {
        $this->view->headTitle()->prepend('About page');
    }

}