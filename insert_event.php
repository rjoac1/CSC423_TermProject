
<!-- insert_teacher.php
   A PHP script to insert a new ad event into the test database
  -->
<?php

require('db_cn.inc');
require('db_access.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('event_insert_result_ui.inc');

// Main control logic
insert_event();

//-------------------------------------------------------------
function insert_event()
{

    // Connect to the 'test' database
    // The parameters are defined in the db_cn.inc file
    // These are global constants
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    // Get the information entered into the webpage by the user
    // These are available in the super global variable $_POST
    // This is actually an associative array, indexed by a string
    $eventCode = mysql_real_escape_string($_POST['eventCode']);
    $eventName = mysql_real_escape_string($_POST['eventName']);
    $startDate = mysql_real_escape_string($_POST['startDate']);
    $endDate = mysql_real_escape_string($_POST['endDate']);
    $description = mysql_real_escape_string($_POST['description']);
    $type = mysql_real_escape_string($_POST['type']);

    // Create a String consisting of the SQL command. Remember that
    // . is the concatenation operator. $varname within double quotes
    // will be evaluated by PHP
    $insertStmt = "INSERT INTO AdEvent (EventCode, AdEvent.Name, StartDate, EndDate,
		       Description, AdType) values ( '$eventCode', '$eventName', '$startDate',
                      '$endDate', '$description', '$type')";

    //Execute the query. The result will just be true or false
    $result = mysql_query($insertStmt);

    $message = "";

    if (!$result)
    {
        $message = "Error in inserting Event: <br />Event Name: $eventName<br />Start Date: $startDate<br />End Date:
$endDate<br />". mysql_error();
    }
    else
    {
        $message = "Data for Event inserted successfully.<br />Event Name: $eventName<br />Start Date: $startDate<br />End
Date: $endDate<br />Description: $description<br />Type: $type<br />";

    }

    ui_show_event_insert_result($message, $eventName, $startDate,
        $endDate, $description, $type);

}

?>
