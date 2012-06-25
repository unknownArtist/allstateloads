<?php

class FaqsController extends Zend_Controller_Action
{

    public function init()
    {
    }

    

    public function indexAction()
    {
        $this->view->headTitle()->prepend('Frequently Asked Questions about allstateloads');
    }
	
	

	
}