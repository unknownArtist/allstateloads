<?php

class BlogController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        
        $this->view->headTitle()->prepend('Latest News');
        $data = new Default_Model_DbTable_News();
		$offset = "2";
        $news =  $data->fetchAll();
        $this->view->data = $news;
		
    }


}