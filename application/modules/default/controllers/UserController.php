<?php

class Default_UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Default_Form_User();
        
        
        if ($this->_request->isPost()) {
            # get params
            $data = $this->_request->getPost();
            
            if ($form->isValid($data)) {
                
            } else {
                
            }
            
            $form->populate($data);
            //$form->reset();
        }
            
        $this->view->form = $form;
    }


}

