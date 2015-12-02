<?php
/**
 * Created by PhpStorm.
 * User: douglasschultz1
 */

require('db_cn.inc');
require('top50_sales_ui.inc');
require('db_access.inc');
//Main control logic
get_all_promo_events();

function get_all_promo_events()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    //Get top 50 items on sale and display the event that it is a part of
    $sql = "SELECT E.EventCode, E.Name, E.StartDate, E.EndDate, I.ItemNumber, I.ItemDescription,".
            " I.Category, I.DepartmentName, I.PurchaseCost, I.FullRetailPrice, PI.SalePrice, ".
            "(I.FullRetailPrice - PI.SalePrice) AS Savings FROM Item AS I".
            "INNER JOIN PromotionItem AS PI".
            "   ON PI.ItemNumber = I.ItemNumber".
            "INNER JOIN AdEventPromotion AS EP".
            "   ON EP.PromoCode = PI.PromoCode".
            "INNER JOIN AdEvent AS E".
            "   ON E.EventCode = EP.EventCode".
            "ORDER BY Savings DESC".
            "LIMIT 0, 50";

    $error_message = "Could not successfully run query ($sql) from DB: ";

    $search_events_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No events found in database";
    ui_show_top50_sales_retrieved($message, $search_events_result);
}
?>