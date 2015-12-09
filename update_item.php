<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/9/2015
 * Time: 2:28 PM
 */
require('db_cn.inc');
require('db_access.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('update_item_result_ui.inc');

// Main control logic
update_item();

//-------------------------------------------------------------
function update_item()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,
        DB_NAME);

    // Get the bannerid and other data sent by the user from the query
    $itemNumber = $_REQUEST['itemNumber'];
    $itemDescription = mysql_real_escape_string($_POST["itemDescription"]);
    $category = mysql_real_escape_string($_POST["category"]);
    $deptName = mysql_real_escape_string($_POST["departmentName"]);
    $purchCost = mysql_real_escape_string($_POST["purchaseCost"]);
    $retail = mysql_real_escape_string($_POST["retailPrice"]);

    $updateStmt = "update Item
	set  ItemDescription = '".$itemDescription."', Category = '".$category."', DepartmentName = '".$deptName."',
	PurchaseCost = '".$purchCost."', FullRetailPrice = '".$retail."'".
        "WHERE  ItemNumber = '".$itemNumber."'";

    $result = execute_SQL_query_with_no_error_report($updateStmt);

    $message = "";

    if (!$result)
    {
        $message .= "Error in updating Item: ".$itemNumber." in database.<br />".mysql_error()."<hr />";
    }
    else
    {
        $message = "Data for Item updated successfully. <br />Item Number: $itemNumber<br />Item Description: $itemDescription
<br />Category: $category <br />Department Name: $deptName<br />Purchase Cost: $purchCost<br
/>Retail Price: $retail<br /><br />";
    }

    $getPromoItemsStmt = "SELECT * FROM PromotionItem WHERE ItemNumber = '$itemNumber'";
    //echo "$getPromoItemsStmt";
    $promoItems = execute_SQL_query_with_no_error_report($getPromoItemsStmt);

    $numPromoItems = count_rows_in_result_set($promoItems);
    while ($promoItem = mysql_fetch_assoc($promoItems))
    {
        $id = $promoItem['ID'];
        $promoCode = $promoItem['PromoCode'];
        $oldSalePrice = $promoItem['SalePrice'];
        //echo "ID = $id PromoCode: $promoCode OldSalePrice: $oldSalePrice";

        $newSalePrice = getNewSalePrice($retail, $promoCode);

        $promoItemUpdateStmt = "UPDATE PromotionItem
        set SalePrice = '$newSalePrice'
        where ID = '$id'";

        $result = execute_SQL_query_with_no_error_report($promoItemUpdateStmt);
        if (!$result) {
            $message .= "Error in updating Promotion Item: ".$id." in database.<br />".mysql_error()."<hr
            />";
        } else {
            $message .= "Data for Promotion Item with ID: ".$id." updated successfully. <br />Old Sale Price: ".$oldSalePrice."<br />New Sale Price: ".$newSalePrice."<hr />";
        }

    }


            ui_show_item_update_details($message);
}

function getNewSalePrice($item_retail_price, $promoCode)
{
    $promoType = getPromoType($promoCode);
    $amountOff = getAmountOff($promoCode);

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

?>