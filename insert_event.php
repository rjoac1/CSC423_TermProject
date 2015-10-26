
<!-- insert_teacher.php
   A PHP script to insert a new ad event into the test database
  -->
<?php

require('db_cn.inc');

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
    $eventCode = $_POST['eventCode'];
    $eventName = $_POST['eventName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    // Create a String consisting of the SQL command. Remember that
    // . is the concatenation operator. $varname within double quotes
    // will be evaluated by PHP
    $insertStmt = "INSERT INTO Event (EventCode, EventName, StartDate, EndDate,
		       Description, Type) values ( '$eventCode', '$eventName', '$startDate,
                      '$endDate', '$description', '$type')";

    //Execute the query. The result will just be true or false
    $result = mysql_query($insertStmt);

    $message = "";

    if (!$result)
    {
        $message = "Error in inserting Event: $eventName , $startDate , $endDate: ". mysql_error();
    }
    else
    {
        $message = "Data for Event: $eventName , $startDate , $endDate inserted successfully.";

    }

    ui_show_event_insert_result($message, $eventName, $startDate,
        $endDate, $description, $type);

}

function connect_and_select_db($server, $username, $pwd, $dbname)
{
    // Connect to db server
    $conn = mysql_connect($server, $username, $pwd);

    if (!$conn) {
        echo "Unable to connect to DB: " . mysql_error();
        exit;
    }

    // Select the database
    $dbh = mysql_select_db($dbname);
    if (!$dbh){
        echo "Unable to select ".$dbname.": " . mysql_error();
        exit;
    }
}

?>
