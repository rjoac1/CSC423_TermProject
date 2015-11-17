<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 11/13/2015
 * Time: 9:08 PM
 */
require('db_cn.inc');
require('db_access.inc');
require('update_event_ui.inc');

getEvent();

function getEvent(){
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    $eventCode = $_REQUEST['eventCode'];

    $sql = "SELECT EventCode, AdEvent.Name, StartDate, EndDate, Description, AdType
        FROM   AdEvent
        WHERE  EventCode = '".$eventCode."'";

    $error_message =
        "Could not successfully run query to get event data ($sql) from DB: ";
    $not_found_message =
        "Event with Event Code ($eventCode) not found in DB";

    $row = get_unique_row($sql, $error_message, $not_found_message);

    $eventCode = $row["EventCode"];
    $name = $row["Name"];
    $startDate = $row["StartDate"];
    $endDate = $row["EndDate"];
    $description = $row["Description"];
    $adType = $row["AdType"];


    ui_show_update_event_form($eventCode, $name,
        $startDate, $endDate, $description, $adType);

}
?>