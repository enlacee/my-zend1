<?php

class Default_IndexController extends Zend_Controller_Action
{
    private $_user;


    public function init()
    {
        parent::init();
        $this->_user = new Application_Model_DbTable_User();
    }

    public function indexAction()
    {
        //$f = new Default_Form_Login();
        
       
        
        //echo "<pre>"; var_dump($f); exit;
        // action body
        //$registry = Zend_Registry::getInstance();
        //echo "<pre>"; print_R($registry->get('config')->application->toArray()); EXIT;
        //
        
        //var_dump($this->getRequest()->_registry->get('config')->application->app);


        $user = new Application_Model_DbTable_User();
        
        $data = $user->getSelect();
        
        //echo "<pre>";
        //print_r($data);

        $this->view->headScript()->appendFile(
            '/js/buscador_beneficios.js'
        );    
        $this->view->headTitle()->set('web site index action');

        $this->view->data = $user->getSelect();

        $this->view->author = $this->getRequest()
            ->_registry
            ->get('config')
            ->application
            ->app->author;

    }

    /**
     * Add User
     */
    public function addAction()
    {
        $data = array(
            'name' => 'maria',
            'pass' => '123456',
            'status' => 1
        );
        //echo "<pre>"; print_r(get_class_methods($this->_user)); exit;
        $this->_user->insert($data);
        echo "add Row";
    }

    /**
     * Add User
     */
    public function updateAction($id = null)
    { //$db->update($table, $data, $where);
        $data = array(
            'name' => 'maria elena update!',
            'pass' => '000000'
        );

        $where = "id = 3"; // or array

        $this->_user->update($data, $where);
        echo "update Row"; exit;
    }





}