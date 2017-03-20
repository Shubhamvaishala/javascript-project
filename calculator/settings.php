<?php
//default checkbox for calculator.
$settings->add(new admin_setting_heading('headerconfig',
            get_string('headerconfig', 'block_calculator'),
            get_string('descconfig', 'block_calculator')
        ));
$settings->add(new admin_setting_configcheckbox('simplehtml/Allow_HTML',
            get_string('labelallowhtml', 'block_calculator'),
            get_string('descallowhtml', 'block_calculator'),
            '0'
        ));