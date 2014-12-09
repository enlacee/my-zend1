<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * Doctype
     *     
     * @param           void
     * @return          void
     *
     */
    protected function _initDoctype()
    {
        $doctypeHelper = new Zend_View_Helper_Doctype();
        $doctypeHelper->doctype('HTML5');
    }


    /**
     * Title
     *
     * @param           void
     * @return          void
     *
     */
    protected function _initDoctitle()
    {
        $view = new Zend_View($this->getOptions());
        $view->headTitle('Zend Framework (ZF) 1');
    }


    /**
     * Configuration save in Zend_Registry
     *
     * @param           void
     * @return          void
     *
     */
    protected function _initConfig()
    {
        # get config
        $config = new Zend_Config_Ini(APPLICATION_PATH .
                DIRECTORY_SEPARATOR . 'configs' .
                DIRECTORY_SEPARATOR . 'application.ini', APPLICATION_ENV);

        # get registery
        $this->_registry = Zend_Registry::getInstance();

        # save new database adapter to registry
        $this->_registry->config              = new stdClass();
        $this->_registry->config->application = $config;
    }

    /**
    * init session
    * 
    */
    protected function __initSession() {
        Zend_Session::start();
    }        



}

