<?php

class Default_Form_Truck extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        /**
         * @todo populate this from database
         */
        $countries = array(
            1 => 'USA',
            2 => 'CANADA'
        );
        
        /**
         * @todo populate this from database
         */
        $truckTypes = array(
            1 => 'Van',
            2 => 'Flat Bed',
            3 => 'Other'
        );

        $startCity = new Zend_Form_Element_Text('s_city');
        $endCity = new Zend_Form_Element_Text('e_city');
        
    }

}

