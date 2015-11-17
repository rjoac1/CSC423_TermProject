
<?php
/**
 * Created by PhpStorm.
 * User: Allan
 * Date: 11/10/2015
 * Time: 5:52 PM
 */
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/23/2015
 * Time: 12:06 PM
 */
//test
require('db_cn.inc');
require('all_events_retrieved_ui.inc');
require('db_access.inc');
//Main control logic
get_events_matching_search_criteria();

function get_events_matching_search_criteria()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $adEventNumber = mysql_real_escape_string($_POST['adEventNumber']);
    $eventName = mysql_real_escape_string($_POST['eventName']);
    $eventDescription = mysql_real_escape_string($_POST['eventDescription']);
    $beginDate = mysql_real_escape_string($_POST['beginDate']);
    $endDate = mysql_real_escape_string($_POST['endDate']);
    //$beginDate = mysql_real_escape_string($_POST['beginDate']);


    $sql = "SELECT EventCode, Name, StartDate, EndDate, Description, AdType
        FROM   AdEvent
        WHERE  EventCode LIKE '%".$adEventNumber."%'
        AND Name LIKE '%".$eventName."%'
        AND StartDate LIKE '%".$beginDate."%'
        AND EndDate LIKE '%".$endDate."%'
         AND Description LIKE '%".$eventDescription."'";

    $error_message = "Could not successfully run query ($sql) from DB: ";


    $search_events_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No items found in database";
    ui_show_events_retrieved($message, $search_events_result);
}
?>