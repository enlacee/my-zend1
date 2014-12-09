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
    public function _initConfig()
    {

        $config = new Zend_Config($this->getOptions(), true);
        $config->merge(new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini'));
        $config->merge(new Zend_Config_Ini(APPLICATION_PATH . '/configs/app.ini'));
        $config->setReadOnly();

        # get registery
        $this->_registry = Zend_Registry::getInstance();

        # save new database adapter to registry
        $this->_registry->config              = new stdClass();
        $this->_registry->config->application = $config;       

        # start session
        $objSessionNamespace = new Zend_Session_Namespace('Zend_Auth');
        $objSessionNamespace->setExpirationSeconds($config->app->lifeTimeZendAuth);
    }   

    /**
    * init session
    * 
    */
    protected function _initSession() {
        Zend_Session::start();
    }        



}

