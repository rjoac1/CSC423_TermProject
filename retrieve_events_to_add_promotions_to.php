<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:08 PM
 */
require('db_cn.inc');
require('all_events_retrieved_to_add_promotions_to_ui.inc');
require('db_access.inc');

//Main control logic
get_events_matching_search_criteria();

function get_events_matching_search_criteria()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $promoCodes = $_POST['promoCodes'];
    $eventCode = mysql_real_escape_string($_POST['eventCode']);
    $name = mysql_real_escape_string($_POST['name']);
    $startDate = mysql_real_escape_string($_POST['startDate']);
    $endDate = mysql_real_escape_string($_POST['endDate']);
    $description = mysql_real_escape_string($_POST['description']);
    $adType = mysql_real_escape_string($_POST['adType']);

    $sql = "SELECT *
        FROM   AdEvent
        WHERE  EventCode LIKE '%".$eventCode."%'
        AND AdEvent.Name LIKE '%".$name."%'
        AND StartDate LIKE '%".$startDate."%'
        AND EndDate LIKE '%".$endDate."%'
        AND Description LIKE '%".$description."%'
        AND AdType LIKE '%".$adType."%'";

    $error_message = "Could not successfully run query ($sql) from DB: ";

    $search_events_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No events found in database";

    ui_show_events_retrieved($message, $search_events_result, $promoCodes);
}