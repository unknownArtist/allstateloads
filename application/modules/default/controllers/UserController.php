<?php

class UserController extends Zend_Controller_Action {

    private $_auth;
    private $user;

    public function init() {
        $this->_auth = Zend_Auth::getInstance();
    }
    
     public function recoverAction()
    {
        $form = new Default_Form_RecoverPassword();
        $this->view->form = $form;

        if ($this->getRequest()->isPost())
            {

            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData))
                {
                  $getEmail = new Default_Model_DbTable_Members();
                  $formEmail = $form->getValue('email');
                  $where = "member_email = '$formEmail'";
                  $email = $getEmail->fetchAll($where)->toArray();
                  if($email)
                  {
                      
                      $data = array('member_pass' => $randNumber = $this->randGenAction());
                      $getEmail->update($data, $where);
                      $this->SendEmailAction($formEmail,$randNumber);
                      
                      $this->view->successMessage = "Your password is sent to this email"." ".$formEmail;
                      
                  }
                  else
                  {
                        $this->view->ErrorMessage = "This is not Valid Email";
                  }                 
                  
                }
            }

    }

    public function indexAction() {
        $this->_redirect('/user/login');
    }

    public function loginAction() {
        $form = new Default_Form_Login();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $member = new Default_Model_DbTable_Members();
                if (true === $message = $member->login($form->getValue('username'),
                                                       $form->getValue('password'))) {
                    $this->_redirect('/dashboard/');
                } else {
                    $this->view->error = $message;
                }
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction() {
        $this->_auth->clearIdentity();
        $this->_redirect('/');
    }

    public function profileAction() {
        $member = new Default_Model_DbTable_Members();
        $this->view->data =$member->find($this->_auth->getIdentity()->member_id)->current()->toArray();
    }

    public function registerAction() {
        $form = new Default_Form_Member();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $member = new Default_Model_DbTable_Members();
                
                $pass = $this->randGenAction();
                $data = array(

                    'member_username'   =>      $form->getValue('username'),
                    'member_pass'       =>      $pass,
                    'member_email'      =>      $form->getValue('email'),
                    'member_role'       =>      $form->getValue('account_type'),
                    'member_phone'      =>      $form->getValue('phone'),
                    'member_company'    =>      $form->getValue('company')

                );
                $member->insert($data);
                $this->SendEmailAction($form->getValue('email'),$pass);
                $this->_redirect('/user/login');
            }
        }
        $this->view->form = $form;
    }
	
    public function changePasswordAction()
    {
    	$form = new Default_Form_Password();
    	if ($this->_request->isPost()) {
    		if ($form->isValid($this->_request->getPost())) {
    			$member = new Default_Model_DbTable_Members();
    			$data = array('member_pass' => $form->getValue('password'));
    			$where = 'member_id = ' . Zend_Auth::getInstance()->getIdentity()->member_id . ' ';
    			$member->update($data, $where);

    			$this->_redirect('/user/profile');
    		}
    	}
    	$this->view->form = $form;
    }
 	
	public function changeEmailAction()
    {
        echo "hello";
    }

     private function randGenAction()
    {
       $length=15;
       $strength=0;
       
        $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength & 2) {
        $vowels .= "AEUY";
    }
    if ($strength & 4) {
        $consonants .= '23456789';
    }
    if ($strength & 8) {
        $consonants .= '@#$%';
    }
 
    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
    }

    private function SendEmailAction($email,$pass) 
    {
         $smtpConfigs = array(
            
            'auth'          =>      'login',
            'username'      =>      'support@allstateloads.com',
            //'username'      =>      'nayatelorg',
            'password'      =>      'SUP0T1(2_+',
            //'password'      =>      'quickbrown123',
           // 'ssl'           =>      'ssl',
            'port'          =>      425
            
        );
        
        $smtpTransportObject = new Zend_Mail_Transport_Smtp('smtp.allstateloads.com', $smtpConfigs);
        
        $mail = new Zend_Mail();
  
        
  
 
        $mail->addTo($email,"allstateloads confirmation")
             ->setFrom('nayatelorg@gmail.com', "nayatel")
             ->setSubject('Accounet Confirmation')
             ->setBodyText('your pin code is' ." " .$pass . " ". 'After you logged in kindly set you desired password from Account Settings')
             ->send($smtpTransportObject);
    }

   
    
    
}


