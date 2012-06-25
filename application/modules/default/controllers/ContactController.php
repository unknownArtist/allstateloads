<?php

class ContactController extends Zend_Controller_Action
{

    public function init()
    {

    }

    

    public function indexAction()
    {
    	$smtpConfigs = array(
            
            'auth'          =>      'login',
            'username'      =>      'nayatelorg@gmail.com',
            'password'      =>      'quickbrown123',
            'ssl'           =>      'ssl',
            'port'          =>       465
            
        );
        
        $smtpTransportObject = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $smtpConfigs);
        
        $mail = new Zend_Mail();

        $form = new Default_Form_ContactUs();

        $this->view->ContactForm = $form;


        
        	
        	if ($this->getRequest()->isPost())
        	{
        	 $formData = $this->getRequest()->getPost();
                   if($form->isValid($formData))
                    {
        	    		$mail->addTo($form->getValue('email'), $form->getValue('name'))
                         ->setFrom('nayatelorg@gmail.com', "nayatel")
             		 	 ->setSubject('Need Information')
            			 ->setBodyText($form->getValue('description')." ".'this is your phone'." ".$form->getValue('phone'))
             		     ->send($smtpTransportObject);

                         $this->_redirect('contact');
           
                        $this->view->message = "your email has been sent";
                    
                    } 
                }
                        
                    }                   
                        
 }