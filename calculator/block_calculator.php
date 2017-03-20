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
 * This file contains the calculator block.
 *
 * @package    block_calculator
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


class block_calculator extends block_list {
     /**
     * Core function used to initialize the block.
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_calculator');
    }
    
    /**
     * Allows the block to be added multiple times to a single page
     * @return boolean
     */
    public function instance_allow_multiple() {
                return true;
    }
    public function has_config() {
        return true;
    }
    /**
     * Used to generate the content for the block.
     * @return string
     */
    public function get_content() {
        global $DB , $CFG , $USER;
        //fetch userid using this from database.
        $_SESSION['studentid'] = $USER->id;  
        if ($this->content !== null) {
            return $this->content;
        }
            $this->content = new stdClass();
            $this->content->text   = 'The content of our SimpleHTML block!';
            $this->content->footer = '<form name="calculator" method="POST">
                                      <div class="calt" style="text-align:center;">                              
        <input class ="rsltbtn" id="txt" name="result" type="text"  style="width:182px"/> <br/><br/>
        <input class ="btnspc" type="button" name="bttnclr" value="C" onclick ="ce()"/>
        <input class ="btnspc" type="button" name="bttnBks" value="bksp" onclick ="bs()"/><br/><br/>
        <input class ="btn" type="button" name="bttn1" value="1" onclick ="displnum1()"/>
        <input class ="btn" type="button" name="bttn2" value="2" onclick ="displnum2()"/>
        <input class ="btn" type="button" name="bttn3" value="3" onclick ="displnum3()"/>
        <input class ="btn" type="button" name="bttnPLUS" value="+" onclick ="plus();"/><br/><br/>
        <input class ="btn" type="button" name="bttn4" value="4" onclick ="displnum4()"/>
        <input class ="btn" type="button" name="bttn5" value="5" onclick ="displnum5()"/>
        <input class ="btn" type="button" name="bttn6" value="6" onclick ="displnum6()"/>
        <input class ="btn" type="button" name="bttnMNC" value="-" onclick ="mins();"/><br/><br/>
        <input class ="btn" type="button" name="bttn9" value="9" onclick ="displnum9()"/>
        <input class ="btn" type="button" name="bttn8" value="8" onclick ="displnum8()"/>
        <input class ="btn" type="button" name="bttn7" value="7" onclick ="displnum7()"/>
        <input class ="btn" type="button" name="bttnMULT" value="*" onclick ="multi();"/><br/><br/>
        <input class ="btn" type="button" name="bttnZero" value="0" onclick ="displnum0()"/>
        <input class ="btn" type="button" name="bttnpnt" value="." onclick ="displnumpnt()"/>
        <input class ="btn" type="button" name="bttnqul" value="=" onclick ="data();eql();"/>
        <input class ="btn" type="button" name="bttndiv" value="/" onclick ="div()"/><br/><br/>
                                          <p id="show"></p>
                                  </form>
                                 
                                  <script>
                      
                                          function displnum1()
                                          {
                                               document.calculator.result.value +="1";
                                          }
                                          function displnum2()
                                          {
                                               document.calculator.result.value +="2";
                                          }
                                          function displnum3()
                                          {
                                               document.calculator.result.value +="3";
                                          }
                                          function displnum4()
                                          {
                                               document.calculator.result.value +="4";
                                          }
                                          function displnum5()
                                          {
                                               document.calculator.result.value +="5";
                                          }
                                          function displnum6()
                                          {
                                               document.calculator.result.value +="6";
                                          }
                                          function displnum7()
                                          {
                                               document.calculator.result.value +="7";
                                          }
                                          function displnum8()
                                          {
                                               document.calculator.result.value +="8";
                                          }
                                          function displnum9()
                                          {
                                               document.calculator.result.value +="9";
                                          }
                                          function displnum0()
                                          {
                                               document.calculator.result.value +="0";
                                          }
                                          function displnumpnt()
                                          {
                                               document.calculator.result.value +=".";
                                          }
                                          function plus()
                                          {
                                               document.calculator.result.value +="+";
                                          }
                                          function mins()
                                          {
                                               document.calculator.result.value +="-";
                                          }
                                          function multi()
                                          {
                                               document.calculator.result.value +="*";
                                          }
                                          function div()
                                          {
                                               document.calculator.result.value +="/";
                                          }
                                          function ce()
                                          {
                                               calculator.result.value="";
                                          }
                                          function bs()
                                          {
                                               calculator.result.value=calculator.result.value.slice(0,calculator.result.value.length-1);
                                          }
                                          function eql()
                                          {
                                               var cal= eval(document.calculator.result.value);
                                               document.calculator.result.value = cal;
                                               return cal;
                                          }
                                         function data()
                                          {
                                               var xmlhttp = new XMLHttpRequest();
                                               xmlhttp.onreadystatechange = function()
                                          {
                                            if (this.readyState === 4 && this.status === 200)
                                              {
                                                 document.getElementById("show").innerHTML = this.responseText;
                                              }
                                          };
                                               var value = document.getElementById("txt").value;
                                               var finlrslt = eql();
                                               var formData = new FormData();
                                               formData.append("optn", value);
                                               formData.append("hddn", finlrslt);
                                               xmlhttp.open("POST", '.$CFG->wwwroot.'"blocks/calculator/cal.php",true);
                                               xmlhttp.send(formData);
        }
                                  </script>
                                 ';
                return $this->content;
    }
    
    /**
     * Core function, specifies where the block can be used.
     * @return array
     */
    public function applicable_formats() {
        return array('course-view' => true,
        'site-index' => true,
        'course-view-social' => false);
    }
}