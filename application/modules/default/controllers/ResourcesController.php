<?php

class ResourcesController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
 
    }

    public function aboutAction()
    {
        $this->view->headTitle()->prepend('Resources for Truckers and Loaders');
    }

}