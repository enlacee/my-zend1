<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        // action body
        //
        $registry = Zend_Registry::getInstance();

        //echo "<pre>"; print_R($registry->get('config')->application->toArray()); EXIT;

        //echo "<pre>"; print_r($this->getView()); exit;

/*
        ECHO "<PRE>";
        print_r($registry->config->application); exit;
        PRINT_R($this->_registry); EXIT;
        */
       

    }


}

