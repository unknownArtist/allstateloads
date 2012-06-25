<?php

class Dashboard_SearchController extends Zend_Controller_Action
{
    public function indexAction()
    {
        
    }

    public function truckersAction()
    {
        
    }

    public function loadersAction()
    {
            $form = new Dashboard_Form_SearchForm();
            $this->view->form = $form;
            
            if($this->getRequest()->isPost())
            {
                $formData = $this->getRequest()->getPost();
                if($form->isValid($formData))
                {
                  $leaveFrom             = $form->getValue('leavingFrom');
                  $goingTo               = $form->getValue('goingTo');
                  $trailerTypeFlatBed    = $form->getValue('trailerTypeFlatBed');
                  $trailerVan            = $form->getValue('trailerTypeVan');
                  $trailerTanker         = $form->getValue('trailerTypeTanker');
                  $trailerStrectTrailer  = $form->getValue('trailerTypeStrectTrailer');
                  $trailerselectDate     = $form->getValue('selectDate');
                  $pickupDate            = $form->getValue('selectDate');

               if($trailerTypeFlatBed == 1)  { $trailerTypeFlatBed = "2";  }
               if($trailerVan == 1)          { $trailerVan = "1";   }
               if($trailerTanker == 1)       { $trailerTanker = "3";  }
               if($trailerStrectTrailer = 1) { $trailerStrectTrailer = "4"; }
               
               
               $appliedSearch = new Default_Model_DbTable_Loads();

               $where = "startCity = '$leaveFrom' and endCity = '$goingTo' and 
               pickupDate = '$pickupDate' and truckType IN           
               ('$trailerTypeFlatBed', '$trailerVan', '$trailerTanker', '$trailerStrectTrailer')";
               $result = $appliedSearch->fetchAll($where); 
               $this->view->resultOfSearch = $result;
               
                    
                }
                else
                {
                    $form->populate($formData);
                }
            }
            
    }
    
    public function searchViewAction()
    {
        
    }
    
    
}