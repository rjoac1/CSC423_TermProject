<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:48 PM
 */

require('db_access.inc');
require('db_cn.inc');
require('AdEventPromotion_insert_result_ui.inc');

//Main control function
add_promotion_to_event();

function add_promotion_to_event()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $promoCodes = $_POST['promoCodes'];
    $eventCode = $_REQUEST['eventCode'];
    //echo "Item number = $itemNumber \nPromoCode = $promoCode";
    //Calculate sale price
    $message = "";

    if(empty($promoCodes))
    {
        $message .= "Error: No Promotions Selected.";
    }
    else{
        $count = count($promoCodes);
        $message .= "$count Promotions selected to be added to Event.<br />";

        foreach($promoCodes as $promoCode) {

            if (!promotionExistsAlreadyInEvent($promoCode, $eventCode)) {

                $insertStmt = "INSERT INTO AdEventPromotion (PromoCode, EventCode) values ( '$promoCode','$eventCode')";

                $result = mysql_query($insertStmt);


                if (!$result) {
                    $message .= "Error adding Promotion to Event. <br />Event Code: $eventCode<br />PromoCode:
                $promoCode<br /><br />" . mysql_error() . "<br />";
                } else {
                    $message .= "Promotion added to Event successfully.<br />Event Code: $eventCode<br />PromoCode:
                $promoCode<br /><br />";
                }
            } else {
                $message .= "Promotion (PromoCode: %promoCode) already exists in Event (Event Code: $eventCode).<br /><br />";
            }
        }
    }

    ui_show_adEvent_promotion_insert_result($message);
}


function promotionExistsAlreadyInEvent($promoCode, $eventCode)
{
    $selectStmt = "SELECT * FROM AdEventPromotion WHERE PromoCode = '$promoCode' AND EventCode = '$eventCode'";
    $result = execute_SQL_query_with_no_error_report($selectStmt);
    $numRows = count_rows_in_result_set($result);
    if($numRows == 0)
        return false;
    else
        return true;
}