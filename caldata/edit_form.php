<?php

class block_caldata_edit_form extends block_edit_form {
    //configration form for calculator data fetch from database.
    protected function specific_definition($mform)
    {   
        $arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block_caldata'));  
        $mform->addElement('select','config_select', get_string('blocktxt', 'block_caldata'),$arr);
        $mform->setDefault('config_select',10);
        $mform->setType('config_select', PARAM_RAW);
       
    }  
}