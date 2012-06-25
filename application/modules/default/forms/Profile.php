<?php

class Default_Form_Profile extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        $email              = new Zend_Form_Element_Text('member_email');
        $email->setLabel('Current Email Address');
              
        $password           = new Zend_Form_Element_Password('member_pass');
        $password->setLabel('Enter New Password')
                 ->addValidator('StringLength', FALSE. array(6,20))
                 ->setRequired(TRUE);
        $password_confirm   = new Zend_Form_Element_Password('confirm_pass');
        $password_confirm->setLabel('Confirm Password');
                         
                         
                         

        $company    = new Zend_Form_Element_Text('member_company');
        $company->setLabel('Company Name')
                ->setRequired(TRUE);
                
        $phone      = new Zend_Form_Element_Text('member_phone');
        $phone->setLabel('Current Phone Number')
              ->setRequired(TRUE);

        $submit = new Zend_Form_Element_Submit('submit', 'Submit');

        $this->addElements(array(

           $email,
           $password,
           $password_confirm,
           $company,
           $phone,
           $submit,
        ));


    }

}