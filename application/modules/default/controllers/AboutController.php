<?php

class AboutController extends Zend_Controller_Action
{

    public function init()
    {
    }

    

    public function indexAction()
    {
        $this->view->headTitle()->prepend('How All State Loads Works');
    }
	
	

	
}