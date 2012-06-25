<?php

class Dashboard_Form_EditTrucks extends Zend_Form
{
	public function init()
	{
		$this->setAction('#');
        $this->setMethod('post');


        $selectTruks = array(
            '1'				=>		'Auto Carrierr',
			'2'				=>		'B-Train',
			'3'				=>		'Container - Regular',
			'4'				=>		'Container - Insulated',

        );


        $states = Zend_Registry::get('states');

        $startState = new Zend_Form_Element_Select('startState');
            $startState->setLabel('Starting State')
                       ->addMultiOptions($states)
                       ->setRequired(true)
                       ->addValidator('NotEmpty');

       $startCity = new Zend_Form_Element_Text('startCity');
             $startCity->setLabel('Start City')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
	   $startCity->class = "text";                       

        $startZip = new Zend_Form_Element_Text('startZip');
                 $startZip->setLabel('Starting Zip Code')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$startZip->class = "text";			   


        $endState = new Zend_Form_Element_Select('endState');
                 $endState->setLabel('Destination State')
                       ->setRequired(true)
                       ->addValidator('NotEmpty')
                       ->addMultiOptions($states);

        $endCity = new Zend_Form_Element_Text('endCity');
                 $endCity->setLabel('Destination City')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$endCity->class = "text";			   

        $endZip = new Zend_Form_Element_Text('endZip');
                 $endZip->setLabel('Destination Zip Code')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$endZip->class = "text";			   

        $weight = new Zend_Form_Element_Text('weight');
                 $weight->setLabel('Weight of the Load ')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$weight->class = "text";			   


        $feet = new Zend_Form_Element_Text('feet');
                 $feet->setLabel('Space needed for Load')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$feet->class = "text";
							   

		
		$pickupDate = new Zend_Dojo_Form_Element_DateTextBox('pickupDate');
		$pickupDate->setLabel('Pickup Date')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
        $pickupDate->class = "text";

        		   			   
		$diliveryDate = new Zend_Dojo_Form_Element_DateTextBox('diliveryDate ');
		$diliveryDate->setLabel('Dilivery Date')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
        $diliveryDate->class = "text";
		
	
        $truckType = new Zend_Form_Element_Select('truckType');
                 $truckType->setLabel('Truck Trailer Type')
                       ->setRequired(true)
                       ->addValidator('NotEmpty')
                       ->addMultiOptions($selectTruks);

        $email = new Zend_Form_Element_Text('email');
                 $email->setLabel('Your Email Address')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$email->class = "text";			   
					   

        $phone = new Zend_Form_Element_Text('phone');
                 $phone->setLabel('Your Phone Number')
                       ->setRequired(true)
                       ->addValidator('NotEmpty')
                       ->addValidator('regex',true,array('/^[(0-9)]+$/'))
      				   ->addErrorMessage('Please enter a valid Phone Number');
		$phone->class = "text";			   
					   

        $extra = new Zend_Form_Element_Text('extra');
                 $extra->setLabel('Your Company Name')
                       ->setRequired(true)
                       ->addValidator('NotEmpty');
		$extra->class = "text";	
		
		
		
		
		$startGroup = $this->addDisplayGroup(array($startState,
              $startCity,
              $startZip,
              $endCity,
              $endState,
              $endZip
              ), 'start',array('tag'=>'div','style'=>	       
			  'width:93%;
		float:left;
		background:;
		opacity:1.0;
  		filter:alpha(opacity=1.0); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:-10px;
		border:4px solid;
		border-color:#CC9;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:0px;
		clear:left;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;') ,array('tag'=>'div','style :hover'=>'background:#ccc;'), array('legend' => 'Starting Point '));
		
		
		
		
		$loadDataGroup = $this->addDisplayGroup(array($weight,
            $feet,
              $truckType), 'loadData', array('tag'=>'div','style'=>
		'width:93%;
		float:left;
		background:;
		opacity:1.0;
  		filter:alpha(opacity=1.0); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:-10px;
		border:4px solid;
		border-color:#CC9;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:0px;
		clear:left;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;') ,array('tag'=>'div','style :hover'=>'background:#ccc;'), array('legend' => 'Starting Point '));
		
		
		
		
		
		$datesDataGroup = $this->addDisplayGroup(array($pickupDate,$diliveryDate), 'datesData',array('tag'=>'div','style'=>		       
		'width:93%;
		float:left;
		background:;
		opacity:1.0;
  		filter:alpha(opacity=1.0); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:-10px;
		border:4px solid;
		border-color:#CC9;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:0px;
		clear:left;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;') ,array('tag'=>'div','style :hover'=>'background:#ccc;'), array('legend' => 'Starting Point '));
		
		
		
		
		$contactDataGroup = $this->addDisplayGroup(array($extra, $phone, $email), 'contactData',array('tag'=>'div','style'=>		       
		
		'width:93%;
		float:left;
		background:;
		opacity:1.0;
  		filter:alpha(opacity=1.0); /* For IE8 and earlier */
		padding:10px;
		padding-left:20px;
		margin-top:-10px;
		border:4px solid;
		border-color:#CC9;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-o-border-radius: 15px;
		-ms-border-radius: 15px;
		-khtml-border-radius: 15px;
		margin-left:0px;
		clear:left;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;') ,array('tag'=>'div','style :hover'=>'background:#ccc;'), array('legend' => 'Starting Point '));
		
		
		
					   
         $submit = new Zend_Form_Element_Submit('submit', 'Post Update');
		 $submit->class = "submit";

         $this->addElements(array(

              //$owner,
         
              $submit
			  
          ));

    }
	
}