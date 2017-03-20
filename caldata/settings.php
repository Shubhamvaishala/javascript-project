<?php
$settings->add(new admin_setting_heading(
            'headerconfig',
            get_string('headerconfig', 'block_caldata'),
            get_string('descconfig', 'block_caldata')
        ));
 
$settings->add(new admin_setting_configcheckbox(
            'simplehtml/Allow_HTML',
            get_string('labelallowhtml', 'block_caldata'),
            get_string('descallowhtml', 'block_caldata'),
            '0'
        ));
 