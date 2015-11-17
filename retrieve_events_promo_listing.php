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


    $sql = "SELECT * FROM AdEvent ORDER BY AdEvent.StartDate ASC";

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