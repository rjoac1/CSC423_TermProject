<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 11/11/2015
 * Time: 6:31 PM
 */

require('db_cn.inc');
require('db_access.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('update_event_result_ui.inc');

// Main control logic
update_event();

//-------------------------------------------------------------
function update_event()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,
        DB_NAME);

    // Get the bannerid and other data sent by the user from the query
    $eventCode = $_REQUEST['eventCode'];
    $name = mysql_real_escape_string($_POST["eventName"]);
    $startDate = mysql_real_escape_string($_POST["startDate"]);
    $endDate = mysql_real_escape_string($_POST["endDate"]);
    $description = mysql_real_escape_string($_POST["description"]);
    $type = mysql_real_escape_string($_POST["type"]);

    $updateStmt = "update AdEvent
	set  AdEvent.Name = '".$name."', StartDate = '".$startDate."', EndDate = '".$endDate."',
	Description = '".$description."', AdType = '".$type."'".
        "WHERE  EventCode = '".$eventCode."'";

    $result = execute_SQL_query_with_no_error_report($updateStmt);

    $message = "";

    if (!$result)
    {
        $message .= "Error in updating Event: ".$eventCode." in database.<br />".mysql_error()."<hr />";
    }
    else
    {
        $message = "Data for Event updated successfully.<br />Event Code: $eventCode <br />Event Name: $name<br />Start
Date:
$startDate<br />End
Date: $endDate<br />Description: $description<br />Type: $type<br /><br />";
    }



    ui_show_event_update_details($message);
}
?>