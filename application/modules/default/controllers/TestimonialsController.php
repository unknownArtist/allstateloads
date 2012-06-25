<?php

class TestimonialsController extends Zend_Controller_Action
{

    public function init()
    {
    }

    

    public function indexAction()
    {
        $this->view->headTitle()->prepend('Testimonals from registered users of allstateloads');
    }
	
	

	
}