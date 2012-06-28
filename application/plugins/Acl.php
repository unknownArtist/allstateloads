<?php

/**
 * @author Darius 
 * amendments : adil
 */

final class Application_Plugin_Acl extends Zend_Controller_Plugin_Abstract  {

    protected $_acl;
    protected $_errorPage;

    public function  __construct() {

        $this->_errorPage = array(
            'module' => 'default',
            'controller' => 'error',
            'action' => 'denied'
        );

        $this->_initAcl();
        Zend_Registry::set('acl', $this->_acl);
    }

    private function _initAcl() {
        
        $this->_acl = new Zend_Acl();

        //Roles
        $this->_acl->addRole(new Zend_Acl_Role('guest'))
                   ->addRole(new Zend_Acl_Role('member'))
				   ->addRole(new Zend_Acl_Role('shipper'))
				   ->addRole(new Zend_Acl_Role('trucker'))
                   ->addRole(new Zend_Acl_Role('admin'), 'member');

        //Resources
        $this->_acl->add(new Zend_Acl_Resource('index'))
				   ->add(new Zend_Acl_Resource('about'))
				   ->add(new Zend_Acl_Resource('resources'))
				   ->add(new Zend_Acl_Resource('testimonials'))
				   ->add(new Zend_Acl_Resource('faqs'))
				   ->add(new Zend_Acl_Resource('signup'))
				   ->add(new Zend_Acl_Resource('contact'))
				   ->add(new Zend_Acl_Resource('blog'))
                   ->add(new Zend_Acl_Resource('user'))
                   ->add(new Zend_Acl_Resource('admin'))
                   ->add(new Zend_Acl_Resource('error'))
                   ->add(new Zend_Acl_Resource('truck'))
                   ->add(new Zend_Acl_Resource('dashboard:index'))
				   ->add(new Zend_Acl_Resource('dashboard:search'))
                   ->add(new Zend_Acl_Resource('dashboard:truck'))
                   ->add(new Zend_Acl_Resource('dashboard:load'))
				   ->add(new Zend_Acl_Resource('dashboard:manage'))
                   ->add(new Zend_Acl_Resource('dashboard:test'))
                   ->add(new Zend_Acl_Resource('admin:index'))
                   ->add(new Zend_Acl_Resource('admin:news'));

        //Deny Guest
        $this->_acl->deny('guest', 'user')
                   ->deny('guest', 'dashboard:truck')
				   ->deny('guest', 'dashboard:load')
                   ->deny('guest', 'admin');

        //Allow Guest
        $this->_acl->allow('guest', 'index', array('index', 'about'))
                   ->allow('guest', 'user', array('login', 'register', 'index','recover'))
				   ->allow('guest', 'signup')
				   ->allow('guest', 'contact')
				   ->allow('guest', 'faqs')
				   ->allow('guest', 'blog')
				   ->allow('guest', 'about')
				   ->allow('guest', 'testimonials')
				   ->allow('guest', 'resources')
                   ->allow('guest', 'error');
                   
       //Deny Member
        $this->_acl->deny('member', 'index', array('index', 'about'))
				   ->deny('member', 'user', array('login', 'register'))
				   ->deny('member', 'signup')
				   // ->deny('member', 'faqs')
				   ->deny('member', 'contact')
				   ->deny('member', 'testimonials')
				   ->deny('member', 'resources')
				   ->deny('member', 'about');

        //Allow Member
        $this->_acl->allow('member', 'truck')
                   ->allow('member', 'dashboard:index')
				   ->allow('member', 'dashboard:load')
                   ->allow('member', 'dashboard:truck')
				   ->allow('member', 'dashboard:search')
				   ->allow('member', 'dashboard:manage')
                   ->allow('member', 'user', array('logout', 'profile','change-password'));
				   
				   
				   
		//Deny shipper
        $this->_acl->deny('shipper', 'index', array('index', 'about'))
				   ->deny('shipper', 'user', array('login', 'register'))
				   ->deny('trucker', 'dashboard:truck')
				   ->deny('shipper', 'signup')
				   ->deny('shipper', 'faqs')
				   ->deny('shipper', 'contact')
				   ->deny('shipper', 'testimonials')
				   ->deny('member', 'resources')
				   ->deny('shipper', 'about');

        //Allow shipper
        $this->_acl->allow('shipper', 'truck')
                   ->allow('shipper', 'dashboard:index')
                   ->allow('shipper', 'user', array('change-password'))
				   ->allow('shipper', 'dashboard:load')
				   ->allow('shipper', 'dashboard:search')
				   ->allow('shipper', 'dashboard:manage')
                   ->allow('shipper', 'user', array('logout', 'profile'));		
				   
				   
				   
		
		//Deny trucker
        $this->_acl->deny('trucker', 'index', array('index', 'about'))
				   ->deny('trucker', 'user', array('login', 'register'))
				   ->deny('trucker', 'dashboard:load')
				   ->deny('trucker', 'faqs')
				   ->deny('trucker', 'signup')
				   ->deny('trucker', 'contact')
				   ->deny('trucker', 'testimonials')
				   ->deny('member', 'resources')
				   ->deny('trucker', 'about');

        //Allow trucker
        $this->_acl->allow('trucker', 'truck')
                   ->allow('trucker', 'dashboard:index')
                   ->allow('trucker', 'dashboard:truck')
				   ->allow('trucker', 'dashboard:search')
				   ->allow('trucker', 'dashboard:manage')
				   ->allow('trucker', 'user', array('logout', 'profile'));
                  		   
				   
				   
				      

        //Deny Admin

        //Allow Admin
        $this->_acl->allow('admin', 'admin:index')
                   ->allow('admin', 'admin:news');
    }

    private function denyAccess()
    {
       $this->_request->setModuleName($this->_errorPage['module']);
       $this->_request->setControllerName($this->_errorPage['controller']);
       $this->_request->setActionName($this->_errorPage['action']);
    }

    public function  preDispatch(Zend_Controller_Request_Abstract $request) {

        $auth = Zend_Auth::getInstance();
        $role = 'guest';
        
        if ($auth->hasIdentity()) {
            $role = $this->roleFromInt($auth->getIdentity()->member_role);
        }

        $resourceName = '';
        $module = $this->_request->getModuleName();
        $controller = $this->_request->getControllerName();
        $action = $this->_request->getActionName();
        
        if($module !== 'default') {
            $resourceName = $module . ':';
        }
		
		$resourceName .= $controller;
		
        if(!$this->getAcl()->isAllowed($role, $resourceName, $action)) {
            $this->denyAccess();
        }
    }

    public function getAcl()
    {
        return $this->_acl;
    }

    public function getErrorPage()
    {
        return $this->_errorPage;
    }

    public function setErrorPage($module, $controller, $action)
    {
         $this->_errorPage = array(
            'module' => $module,
            'controller' => $controller,
            'action' => $action
        );
    }

    public static function roleFromInt($role) {
        switch ($role) {
            case 1: return 'admin';
            case 2: return 'member';
            case 3: return 'shipper'; 
            case 4: return 'trucker';
            default: return 'guest';
        }
    }

}
