<?php
//validation
class Default_Form_Email extends Zend_Form
{
	public function init()
    {
        $this->setAction('');
        $this->setMethod('post');

        $email              = new Zend_Form_Element_Text('email');
        $email->setLabel('New Email Address');

        $phone = new Zend_Form_Element_Text('phone');
        $phone->setLabel('New Contact number');

         $submit = new Zend_Form_Element_Submit('submit');


        $this->addElements(array(

        	$email,
            $phone,
        	$submit

	        ));
    }

}