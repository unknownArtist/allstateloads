<?php

class Dashboard_Form_SearchTruck extends Zend_Form
{

    public function init()
    {
        
        $this->setAction('do-search');
        $this->setMethod('post');
        
        
        $leavingFrom = new Zend_Form_Element_Text('leavingFrom');
        $leavingFrom->setLabel('Leaving From:')
                    ->setRequired(TRUE)
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim');
		$leavingFrom->class = "text";				
                    
        
        $goingTo = new Zend_Form_Element_Text('goingTo');
        $goingTo->setLabel('Going To:')
                    ->setRequired(TRUE)
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim');
		$goingTo->class = "text";				
        
        
        $trailerTypeFlatBed = new Zend_Form_Element_Checkbox('trailerTypeFlatBed');
        $trailerTypeFlatBed->setLabel('FlatBed:')
                           ->setRequired(TRUE)
                           ->setValue('Flat Bed')
                           ->addFilter('StripTags')
                           ->addFilter('StringTrim');
		$trailerTypeFlatBed->class = "checkbox";				   
						   
        
        $trailerTypeVan = new Zend_Form_Element_Checkbox('trailerTypeVan');
        $trailerTypeVan->setLabel('Van:')
                           ->setRequired(TRUE)
                           ->addFilter('StripTags')
                           ->addFilter('StringTrim');
		$trailerTypeVan->class = "checkbox";				   
						   
						   
        $trailerTypeTanker = new Zend_Form_Element_Checkbox('trailerTypeTanker');
        $trailerTypeTanker->setLabel('Tanker:')
                           ->setRequired(TRUE)
                           ->addFilter('StripTags')
                           ->addFilter('StringTrim');
		$trailerTypeTanker->class = "checkbox";				   
						   
						   
        $trailerTypeStrectTrailer = new Zend_Form_Element_Checkbox('trailerTypeStrectTrailer');
        $trailerTypeStrectTrailer->setLabel('StrectTrailer:')
                           ->setRequired(TRUE)
                           ->addFilter('StripTags')
                           ->addFilter('StringTrim');
		$trailerTypeStrectTrailer->class = "checkbox";				   
						   
        
        $selectDate = new Zend_Dojo_Form_Element_DateTextBox('selectDate');
        $selectDate->setLabel('Select available Date:')
                    ->setRequired(TRUE)
                    
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim');
        $selectDate->class = "text";
        
        $submit = new Zend_Form_Element_Submit('search');
		$submit->class = "submit";
        
        
		
		
		
		$startGroup = $this->addDisplayGroup(array($leavingFrom,$goingTo), 'start',array('tag'=>'div','style'=>	       
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
		
		
		
		
		$typeGroup = $this->addDisplayGroup(array($trailerTypeFlatBed,
            $trailerTypeVan,
            $trailerTypeTanker,
            $trailerTypeStrectTrailer), 'type',array('tag'=>'div','style'=>	        'width:93%;
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
		
		
		
		
		$dateGroup = $this->addDisplayGroup(array($selectDate), 'date',array('tag'=>'div','style'=>	        'width:93%;
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
		
		
		
		
		
        $this->addElements(array(
   
            $submit
            ));
        
        
        
    }


}

