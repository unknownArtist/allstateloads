<?php

class Model_UserTest extends ControllerTestCase
{
	private $user;
	
    public function setUp()
    {
        $this->user = new Application_Model_DbTable_User();    
    }
    
    public function testCheckUsername()
    {
    	$this->assertTrue($this->user->checkUsername('admin'));
    	$this->assertFalse($this->user->checkUsername('z2344112211'));
    }
    
    public function testCheckEmail()
    {
        $this->assertTrue($this->user->checkEmail('admin@admin.com'));
        $this->assertFalse($this->user->checkEmail('zo@aa.ee'));
    }
    
    
}