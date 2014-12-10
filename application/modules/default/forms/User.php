<?php

class Default_Form_User extends Zend_Form
{

    public function init()
    {
        
        # Name
        $name = new Zend_Form_Element_Text('name');
        $name->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addFilter('StringToLower')
            ->addValidator('NotEmpty');
        # Name
        $pass = new Zend_Form_Element_Password('pass');
        $pass->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');            
        
        $sexo = new Zend_Form_Element_Select('sexo');
        $options = $this->_getDataSexo(); 
        $sexo->setMultiOptions(array("" => '-- select --'));
        $sexo->addMultiOptions($options);
        $sexo->setRequired(true)
             ->addValidator('NotEmpty');        
        /*$sexo->addMultiOptions(array(
            "" => '-- select --',
            "1" => 'masculino',
            "2" => 'femenino',
            "3" => 'otro',
        ));*/
        
        $hash = new Zend_Form_Element_Hash('csrf', array('salt' => 'unique'));
        $hash->setTimeout(300)
                ->addErrorMessage('Form timed out. Please reload the page & try again');        
        
        # Submit
        $submit = new Zend_Form_Element_Submit('submit');

        # Create
        $this->addElements(array($name,$pass,$sexo,$hash,$submit));
        
        
    }
    
    
    private function _getDataSexo() {        
        $model = new Default_Model_Metadata();
        $data =  $model->getDataBy();
        
        $options = array();
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $options[$data[$key]['id']] =  $data[$key]['name'];
            }            
        }
        
        return $options;
    }
}

