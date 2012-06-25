<?php
/**
 * @author Darius
 */

class Admin_Form_News extends Zend_Form
{
    public function init()
    {
        //news title, news text
        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
              ->setRequired(true)
              ->addFilter(new Zend_Filter_Alpha(true))
              ->setValidators(array('NotEmpty'));

        $text = new Zend_Form_Element_Textarea('text');
        $text->setRequired(true)
             ->setLabel('Content')
             ->addFilter(new Zend_Filter_Alpha(true))
             ->setValidators(array('NotEmpty'));

        $submit = new Zend_Form_Element_Submit('submit', 'Create');

        $this->addElements(array(
            $title,
            $text,
            $submit
        ));
    }
}
