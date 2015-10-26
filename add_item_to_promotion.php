<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:48 PM
 */

require('db_access.inc');
require('db_cn.inc');
require('insert_promotion_item_insert_result_ui.inc');

//Main control function
add_item_to_promotion();

function add_item_to_promotion()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $itemNumber = $_POST['itemNumber'];
    $promoCode = $_REQUEST['promoCode'];
    //echo "Item number = $itemNumber \nPromoCode = $promoCode";
    //Calculate sale price
    $item_retail_price = getItemRetailPrice($itemNumber);
    $promoType = getPromoType($promoCode);
    $amountOff = getAmountOff($promoCode);

    //echo "retail price : $item_retail_price \n promotype: $promoType \n amount off: $amountOff";

    $salePrice = getSalePrice($item_retail_price, $promoType, $amountOff);

    $insertStmt = "INSERT INTO PromotionItem (PromoCode, ItemNumber, SalePrice) values ( '$promoCode','$itemNumber', '$salePrice')";

    $result = mysql_query($insertStmt);

    $message = "";

    if (!$result)
    {
        $message = "Error in inserting PromotionItem: $promoCode, $itemNumber, $salePrice: ". mysql_error();
    }
    else
    {
        $message = "Data for Promotion: $promoCode, $itemNumber, $salePrice inserted successfully.";

    }

    ui_show_promotion_item_insert_result($message);
}
function getSalePrice($item_retail_price, $promoType, $amountOff)
{
    if($promoType = "Percent")
    {
        return $item_retail_price - ($amountOff * $item_retail_price);
    }
    else{
        return $item_retail_price - $amountOff;
    }
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