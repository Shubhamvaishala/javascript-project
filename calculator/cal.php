<?php
require_once("../../config.php");
//fetch current user id from moodle Database.
$dataid =$_SESSION['studentid'];

//insert data into moodle Database
if (isset($_POST['optn'])) {
         $record = new stdClass();
         $record->userid = $dataid;
         $record->equtn = $_POST['optn'];
         $record->data = $_POST['hddn'];
         $sql = $DB->insert_record('block_calculator' , $record);
}
