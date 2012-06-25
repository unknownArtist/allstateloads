<?php
 $form = new Zend_Form;

 $city = new Zend_Dojo_Form_Element_FilteringSelect('city');
 $city->setLabel('Select a user')
            ->setAutoComplete(true)
            ->setStoreId('userStore')
            ->setStoreType('dojo.data.ItemFileReadStore')
            ->setStoreParams(array('url'=>'/dashboard'))
            ->setAttrib("searchAttr", "username")
            ->setRequired(true);

 $submit = $form->createElement('submit', 'submit');

 $form->addElements(array($city, $submit));

 return $form;

?>