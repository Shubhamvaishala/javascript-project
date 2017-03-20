<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains the block_caldata.
 *
 * @package    block_caldata.
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

class block_caldata extends block_list {
    /**
     * Core function used to initialize the block.
     */
    function init() {
        $this->title = get_string('pluginname', 'block_caldata');
    }

    /**
     * Allows the block to be added multiple times to a single page
     * @return boolean
     */
    public function instance_allow_multiple() {
        return true;
    }

    function has_config() {
        return true;
    }

     /**
     * Used to generate the content for the block.
     * @return string
     */
    public function get_content() {
        global $DB , $USER;
        if ($this->content !== null) {

            return $this->content;
        }
      
        if (isset($this->config->select)) {
            $store = $this->config->select;
            $result = $store+1;
            if($result!=16)   // select the number of data showing on caldata_block using this step.
            {
                //fetch the data from database using this query..
               $array  =  $DB->get_records_sql("SELECT equtn, data FROM {block_calculator} WHERE userid ='$USER->id' LIMIT 0,$result"); 
            }
            else
            {       
               // this else part is showing all data of this use(but this query working only select 16th position show alll data of this user).
               $array  =  $DB->get_records_sql("SELECT equtn, data FROM {block_calculator} WHERE userid ='$USER->id'");
            }
        }
           $this->content = new stdClass();   
           //collect each data of this database table and display.
           if(!empty($array))
            {     
               foreach ($array as $key => $value) 
            {
               $this->content->footer.= $value->equtn.'='.$value->data.'<br>';         
            }       
         }

        return $this->content;
    }

}
