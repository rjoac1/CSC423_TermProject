1<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:48 PM
 */

require('db_access.inc');
require('db_cn.inc');
require('promotionEvent_insert_result_ui.inc');

//Main control function
add_item_to_promotion();

function add_item_to_promotion()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $eventNumbers = $_POST['eventNumbers'];
    $promoCode = $_REQUEST['promoCode'];
    //echo "Item number = $itemNumber \nPromoCode = $promoCode";
    //Calculate sale price
    $promoType = getPromoType($promoCode);
    $amountOff = getAmountOff($promoCode);
    $message = "";

    if(empty($eventNumbers))
    {
        $message .= "Error: No Event Selected.";
    }
    else{
        $count = count($eventNumbers);
        $message .= "$count Event selected.<br />";

        foreach($eventNumbers as $eventNumber) {

            if (!itemExistsAlreadyInPromotion($eventNumber, $promoCode)) {

                //$item_retail_price = getItemRetailPrice($eventNumber);
                //echo "retail price : $item_retail_price \n promotype: $promoType \n amount off: $amountOff";
                //$salePrice = getSalePrice($item_retail_price, $promoType, $amountOff);
                $insertStmt = "INSERT INTO AdEventPromotion (EventCode, PromoCode) values ('$eventNumber','$promoCode')";

                $result = mysql_query($insertStmt);


                if (!$result) {
                    $message .= "Error adding Event code to Promotion. <br />Promo Code: $promoCode<br />Event code:
                $eventNumber<br />" . mysql_error() . "<br />";
                } else {
                    $message .= "Event code added to Promotion successfully.<br />Promo Code: $promoCode<br />Event code:
                $eventNumber<br />";
                }
            } else {
                $message .= "EVENT (Event code: $eventNumber) already exists in Promotion (Promo Code: $promoCode).<br /><br />";
            }
        }
    }

    ui_show_promotion_event_insert_result($message);
}
function getSalePrice($item_retail_price, $promoType, $amountOff)
{
    //echo "PromoType: $promoType\nAmount off: $amountOff\nRetail Price: $item_retail_price\n";
    if($promoType == "Percent")
    {
        $result = ($item_retail_price - ($amountOff * $item_retail_price));
        //echo "Percent result: $result";
    }
    else{
        $result = ($item_retail_price - $amountOff);
        //echo "Dollar result: $result";
    }
    //$result = round($result, 2);
    return $result;
}
function getItemRetailPrice($itemNum)
{
    $select_stmt = "SELECT FullRetailPrice FROM Item WHERE ItemNumber = $itemNum";
    $not_found_message = "Could not retrieve retail price from item.";
    $result = get_unique_row($select_stmt, $not_found_message, $not_found_message);

    return $result['FullRetailPrice'];

}
function getPromoType($pCode)
{
    $select_stmt = "SELECT PromoType FROM Promotion WHERE PromoCode = $pCode";
    $not_found_message = "Could not retrieve Promotion Type from Promotion.";
    $result = get_unique_row($select_stmt, $not_found_message, $not_found_message);

    return $result['PromoType'];
}
function getAmountOff($pCode)
{
    $select_stmt = "SELECT AmountOff FROM Promotion WHERE PromoCode = $pCode";
    $not_found_message = "Could not retrieve Amount Off from Promotion.";
    $result = get_unique_row($select_stmt, $not_found_message, $not_found_message);

    return $result['AmountOff'];
}
function itemExistsAlreadyInPromotion($itemNo, $promoCo)
{
    $selectStmt = "SELECT * FROM PromotionItem WHERE ItemNumber = '$itemNo' AND PromoCode = '$promoCo'";
    $result = execute_SQL_query_with_no_error_report($selectStmt);
    $numRows = count_rows_in_result_set($result);
    if($numRows == 0)
        return false;
    else
        return true;
}