<?php

class Default_Form_Member extends Zend_Form
{
	
    public function init()
    {
        $this->setMethod('post');

        $accountTypes = array(
			
            3 => 'Loader',
            4 => 'Trucker',
			2 => 'Combo'
        );

        $accountType = new Zend_Form_Element_Select('account_type');
        $accountType->setLabel('Account type')
                ->addMultiOptions($accountTypes);
		$accountType->class = "input";
				
				

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
        	->setRequired(true)
        	->addFilter('StripTags')
        	->addFilter('StringTrim')
        	->addValidator('NotEmpty');
		$email->addErrorMessage('The E-mail is required!'); 
		$email->class = "input";	
			
        
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
        	     ->setRequired(true)
        	     ->addFilter('StripTags')
        	     ->addFilter('StringTrim')
        	     ->addValidator('NotEmpty');
		$username->addErrorMessage('UserName is required!');	
		$username->class = "input";	

        $phone = new Zend_Form_Element_Text('phone');
        $phone->setLabel('Phone')
                 ->setRequired(true)
                 ->addFilter('StripTags')
                 ->addFilter('StringTrim')
                 ->addValidator('NotEmpty')
                 ->addValidator('Digits')
                 ->addErrorMessage('Phone is required! and should Contain Only numbers');    
        $phone->class = "input";

        $company = new Zend_Form_Element_Text('company');
        $company->setLabel('Your Company Name')
                ->setRequired('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->addErrorMessage('Company Name is Required');
        $company->class = "input";
      
        
        	
			
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
        	->setRequired(true)
        	->addFilter('StripTags')
        	->addFilter('StringTrim')
        	->addValidator('NotEmpty');
		$password->addErrorMessage('Password is required!');	
        $password->class = "input";
		
		
        $register = new Zend_Form_Element_Submit('register', 'Sign Up!');
		$register->class = "submit";
        
		
		
        $this->addElements(array(
            $username,
            $email,
            $accountType,
           // $password, 
            $phone,
            $company,
            $register
        ));
       	
    }


}

