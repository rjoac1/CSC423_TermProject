<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/24/2015
 * Time: 3:38 PM
 */
require('db_cn.inc');
require('db_access.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('item_savings_result_ui.inc');

// Main control logic
update_item();

//-------------------------------------------------------------
function update_item()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,
        DB_NAME);

    // Get the bannerid and other data sent by the user from the query
    $itemNumber = $_REQUEST['itemNumber'];

    $sql = "SELECT E.EventCode, E.Name, E.StartDate, E.EndDate, E.Description, E.AdType, I.FullRetailPrice, PI.SalePrice, (I.FullRetailPrice - PI.SalePrice) AS Savings
FROM AdEvent AS E
INNER JOIN AdEventPromotion AS EP
	ON E.EventCode = EP.EventCode
INNER JOIN PromotionItem AS PI
	ON EP.PromoCode = PI.PromoCode
INNER JOIN Item AS I
	ON PI.ItemNumber = I.ItemNumber
WHERE I.ItemNumber = '$itemNumber'
ORDER BY Savings DESC";

    $result = execute_SQL_query_with_no_error_report($sql);

    $message = "";

    if (!$result)
    {
        $message .= "Error finding savings for Item: ".$itemNumber." in database.<br />".mysql_error()."<hr />";
    }
    else if(count_rows_in_result_set($result) == 0)
    {
        $message .= "Item (Item Number: ".$itemNumber.") is currently a not a part of any Ad Events at this moment.<hr />";
    }
    else
    {
        $message .= "Listed below are all of the events which offer the greatest amount of savings currently for Item
        with Item Number: ".$itemNumber."<hr />";
    }

    ui_show_item_savings_details($message, $result);
}

?>