<?php
/**
 * Created by PhpStorm.
 * User: douglasschultz1
 */

require('db_cn.inc');
require('all_events_promo_listing_retrieved_ui.inc');
require('db_access.inc');
//Main control logic
get_all_promo_events();

function get_all_promo_events()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $startDate = mysql_real_escape_string($_POST['startDate']);
    $endDate = mysql_real_escape_string($_POST['endDate']);

    //Retrieve all events that occur during the time period including the outer bounds
    if()

    $sql = "SELECT * FROM AdEvent WHERE".
            "StartDate = '$startDate' OR StartDate = '$endDate' ".
            "OR EndDate = '$startDate' OR EndDate = '$endDate' ".
            "OR StartDate BETWEEN '$startDate' AND '$endDate' ".
            "OR EndDate BETWEEN '$startDate' AND '$endDate'".
            "ORDER BY AdEvent.StartDate ASC";

    //$sql = "SELECT * FROM AdEvent ORDER BY AdEvent.StartDate ASC";            --older, incorrect version

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