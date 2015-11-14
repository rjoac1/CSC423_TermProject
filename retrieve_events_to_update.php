<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 11/11/2015
 * Time: 7:13 PM
 */
require('db_cn.inc');
require('all_events_to_update_retrieved_ui.inc');
require('db_access.inc');
//Main control logic
get_events_matching_search_criteria();

function get_events_matching_search_criteria()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD, DB_NAME);

    $eventCode = mysql_real_escape_string($_POST['eventCode']);
    $eventName = mysql_real_escape_string($_POST['eventName']);
    $startDate = mysql_real_escape_string($_POST['startDate']);
    $endDate = mysql_real_escape_string($_POST['endDate']);
    $description = mysql_real_escape_string($_POST['description']);

    $sql = "SELECT EventCode, EventName, StartDate, EndDate, Description,
        FROM   Event
        WHERE  EventCode LIKE '%".$eventCode."%'
        AND EventName LIKE '%".$eventName."%'
        AND StartDate LIKE '%".$startDate."%'
        AND EndDate LIKE '%".$endDate."%'
        AND Description LIKE '%".$description."'";

    $error_message = "Could not successfully run query ($sql) from DB: ";

    $search_events_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No items found in database";
    ui_show_items_retrieved($message, $search_events_result);
}
?>

