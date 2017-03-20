<?php
defined('MOODLE_INTERNAL') || die();
//upgrade calculator block that time we create a block. 
function xmldb_block_calculator_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();
    if ($oldversion < 2016059780) {
            // Define table block_calculator to be created.
            $table = new xmldb_table('block_calculator');
            // Adding fields to table block_calculator.
            $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
            $table->add_field('userid', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
            $table->add_field('equtn', XMLDB_TYPE_CHAR, '10', null, null, null, null);
            $table->add_field('data', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
            // Adding keys to table block_calculator.
            $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
            // Conditionally launch create table for block_calculator.
        if (!$dbman->table_exists($table)) {
                $dbman->create_table($table);
        }
            // Calculator savepoint reached.
            upgrade_block_savepoint(true, 2016059780, 'calculator');
    }
    return true;
}