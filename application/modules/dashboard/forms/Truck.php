<?php
/**
 * @author Darius 
 **/
class Dashboard_Form_Truck extends Zend_Form
{

    public function init() {

        $this->setAction('/dashboard/truck/create');
        $this->setMethod(Zend_Form::METHOD_POST);

        $selectTrueFalse = array(
            1 => 'yes',
            0 => 'no'
			
						        );

        $states = Zend_Registry::get('states');

        //start point State, City, Zip
        $startState = new Zend_Form_Element_Select('startState');
        $startState->addMultiOptions($states)
                   ->setLabel('Starting State');
			   
			
				   
				   
        $startCity = new Zend_Form_Element_Text('startCity');
        $startCity->setLabel('Starting City')
                ->setRequired(true)
                ->addValidators(array('NotEmpty'));
        //validacija
		$startCity->class = "text";
		
		
		
		
		

        $startZip = new Zend_Form_Element_Text('startZip');
        $startZip->setLabel('Starting Zip Code')
                ->setRequired(true)
                ->addValidators(array('NotEmpty', 'Digits'));
		$startZip->class = "text";
				
        
		
		$startingDate = new Zend_Dojo_Form_Element_DateTextBox('startingDate');
		$startingDate->setLabel('Starting Date (click and choose)')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
        
		$startingDate->class = "text";

        		   
					   
					   
		
		
		

        $endState = new Zend_Form_Element_Select('endState');
        $endState->addMultiOptions($states)
                ->setLabel('Destination State');
			
		
		
				

        $endCity = new Zend_Form_Element_Text('endCity');
        $endCity->setLabel('Destination City');
        //validacija
		$endCity->class = "text";
		
		
		

        $endZip = new Zend_Form_Element_Text('endZip');
        $endZip->setLabel('Destination Zip Code')
                ->addValidator('Digits');
        //validacija
		$endZip->class = "text";

		
		$endDate = new Zend_Dojo_Form_Element_DateTextBox('endDate ');
		$endDate->setLabel('Reaching Date (click and choose)')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
        
		$endDate->class = "text";
		
		
		
		$via = new Zend_Form_Element_Text('via');
        $via->setLabel('IN which Cities Truck will have Stops write like " Dallas , Denver , San Francisco "');
        //validacija
		$via->class = "text";
		


        $public = new Zend_Form_Element_Select('public');
        $public->setLabel('Do you make this truck public???');
        $public->addMultiOptions($selectTrueFalse);
        
		
		
        $team = new Zend_Form_Element_Select('team');
        $team->setLabel('TeamDriven??');
        $team->addMultiOptions($selectTrueFalse);
        
        

        $full = new Zend_Form_Element_Select('full');
        $full->setLabel('Is your Truck Full');
        $full->addMultiOptions($selectTrueFalse);
		
		
		
        $weight = new Zend_Form_Element_Text('weight');
        $weight->setLabel('Weight Capacity still avilable(KGs)')
                ->addValidator('Digits');
		$weight->class = "text";
		
				
				
        $feet = new Zend_Form_Element_Text('feet');
        $feet->setLabel('Total Space (square Feet) of Truck')
               ->addValidator('Digits');
		$feet->class = "text";
		
		
		$feet_left = new Zend_Form_Element_Text('feet_left');
        $feet_left->setLabel('Free Space in the Truck (Square Feet)')
               ->addValidator('Digits');
		$feet_left->class = "text";			
		
			   

        $type = new Zend_Form_Element_Select('type');
        $type->setLabel('Truck Trailer Type')
                ->setRequired(true);
		$type->class = "text";		
						


        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email Address')
              ->addValidators(array('EmailAddress', 'NotEmpty'));
			  $email->class = "text";
		$email->class = "text";		  



        $phone = new Zend_Form_Element_Text('phone');
        $phone->setLabel('Contact Phone number');
		$phone->class = "text";	
        //validacija


        
		

        $startGroup = $this->addDisplayGroup(array($startState, $startCity, $startZip, $endState, $endCity, $endZip, $via), 'start',array('tag'=>'div','style'=>	        
		'width:43%;
		float:left;
		background:;
		opacity:0.7;
  		filter:alpha(opacity=60); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:-10px;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:0px;
		clear:left;
		border:4px solid;
		border-color:#CC9;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;') ,array('tag'=>'div','style :hover'=>'background:#ccc;'), array('legend' => 'Starting Point '));
		
		
		
		
		
        $truckDataGroup = $this->addDisplayGroup(array($type, $weight, $feet_left), 'truckData', array('tag'=>'div','style'=>
		'width:43%;
		float:left;
		background:;
		opacity:0.8;
  		filter:alpha(opacity=70); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:-25px;
		margin-left:12px;
		border:4px solid;
		border-color:#CC9;
		-webkit-border-radius:15px;
		clear:right;'), array('legend' => 'Destination'));
		
		
		
		
		$datesDataGroup = $this->addDisplayGroup(array($startingDate,$endDate), 'datesData',array('tag'=>'div','style'=>		        'width:43%;
		float:right;
		background:;
		opacity:1.0;
  		filter:alpha(opacity=90); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:10px;
		border:4px solid;
		border-color:#CC9;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:10px;
		clear:right;'));
		
		
      
		
		
		$contactDataGroup = $this->addDisplayGroup(array($team, $phone, $email), 'contactData',array('tag'=>'div','style'=>		        'width:41%;
		float:right;
		background:;
		opacity:1.0;
		color:#000;
  		filter:alpha(opacity=90); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:10px;
		border:10px solid;
		border-color:#CC9;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:10px;
'));
		
		
		
		
		
		
		$submit = new Zend_Form_Element_Submit('submit', 'Post Truck');
		$submit->class = "submit";
		
		
		
        $this->addElements(array(
            $submit
        ));

    }
}
