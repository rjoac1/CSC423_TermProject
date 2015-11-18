<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:48 PM
 */

require('db_access.inc');
require('db_cn.inc');
require('promotionItem_insert_result_ui.inc');

//Main control function
add_item_to_promotion();

function add_item_to_promotion()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
//test
    $itemNumbers = $_POST['itemNumbers'];
    $promoCode = $_REQUEST['promoCode'];
    //echo "Item number = $itemNumber \nPromoCode = $promoCode";
    //Calculate sale price
    $promoType = getPromoType($promoCode);
    $amountOff = getAmountOff($promoCode);
    $message = "";

    if(empty($itemNumbers))
    {
        $message .= "Error: No Items Selected.";
    }
    else{
        $count = count($itemNumbers);
        $message .= "$count Items selected to be added to Promotion.<br />";

        foreach($itemNumbers as $itemNumber) {

            if (!itemExistsAlreadyInPromotion($itemNumber, $promoCode)) {

                $item_retail_price = getItemRetailPrice($itemNumber);
                //echo "retail price : $item_retail_price \n promotype: $promoType \n amount off: $amountOff";
                $salePrice = getSalePrice($item_retail_price, $promoType, $amountOff);
                $insertStmt = "INSERT INTO PromotionItem (PromoCode, ItemNumber, SalePrice) values ( '$promoCode','$itemNumber', '$salePrice')";

                $result = mysql_query($insertStmt);


                if (!$result) {
                    $message .= "Error adding Item to Promotion. <br />Promo Code: $promoCode<br />Item Number:
                $itemNumber<br />Sale Price: $salePrice<br /><br />" . mysql_error() . "<br />";
                } else {
                    $message .= "Item added to Promotion successfully.<br />Promo Code: $promoCode<br />Item Number:
                $itemNumber<br />Sale Price: $salePrice<br /><br />";
                }
            } else {
                $message .= "Item (Item Number: $itemNumber) already exists in Promotion (Promo Code: $promoCode).<br /><br />";
            }
        }
    }

    ui_show_promotion_item_insert_result($message);
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
    $result = round($result, 2);
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