<?php

class Default_RegisterController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_user = new Application_Model_DbTable_User();        
    }

    public function indexAction()
    {
        # load form
        $form = new Application_Form_Register();

        # attempt to save
        $save = $this->save($form);

        # send to view
        $this->view->registerForm = $save['form'];        
    }

    /**
     * save method
     *
     * @param	void
     * @return	void
     */
    private function save($form)
    {
        $message = NULL;
        if ($this->_request->isPost()) {
            # get params
            $data = $this->_request->getPost();
            if ($form->isValid($data)) {
                # check for existing email
                
                $checkStatus = $this->_user->validExist();

                if ($checkStatus == 0) {
                    # register account
                    $datai = array (
                    	'name' => $data['name'],
                    	'pass' => $data['pass']
                	);

                	$this->_user->insert($datai);

                    # send to login page
                    //$this->_helper->redirector('successful', 'register', 'auth');
                } else {
                    $alert = array('Registration Failed: Email already exists'); // move to view
                }
            }
            # populate form
            $form->populate($data);
        }
        return array('form' => $form);
    }

    public function successfulAction()
    {
        // action body
    }


}



