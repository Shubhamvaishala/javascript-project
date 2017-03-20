<?php
class block_calculator_edit_form extends block_edit_form {
    protected function specific_definition($mform) {
        // Fields for editing calculator block title and contents.
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
        $mform->addElement('text', 'config_text', get_string('content', 'block_calculator'));
        $mform->setType('config_text', PARAM_RAW);
    }
}