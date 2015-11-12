<?php
/**
 * Created by PhpStorm.
 * User: douglasschultz1
 */

require('db_cn.inc');
require('all_events_promo_listing_retrieved_ui.inc');
require('db_access.inc');
//Main control logic
get_items_matching_search_criteria();

function get_items_matching_search_criteria()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $eventCode = mysql_real_escape_string($_POST['eventCode']);
    $eventName = mysql_real_escape_string($_POST['eventName']);
    $startDate = mysql_real_escape_string($_POST['startDate']);
    $endDate = mysql_real_escape_string($_POST['endDate']);
    $description = mysql_real_escape_string($_POST['description']);
    $type = mysql_real_escape_string($_POST['type']);

    $sql = "SELECT EventCode, EventName, StartDate, EndDate, Description, Type
        FROM   AdEvent
        WHERE  EventCode LIKE '%".$eventCode."%'
        AND EventName LIKE '%".$eventName."%'
        AND StartDate LIKE '%".$startDate."%'
        AND EndDate LIKE '%".$endDate."'
        AND Description LIKE '%".$description."%'
        AND Type LIKE '%".$type."%'";

    $error_message = "Could not successfully run query ($sql) from DB: ";


    $search_events_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No events found in database";
    ui_show_events_retrieved($message, $search_events_result);
}
?>