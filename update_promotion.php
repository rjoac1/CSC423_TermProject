<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/10/2015
 * Time: 11:57 AM
 */
require('db_cn.inc');
require('db_access.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('update_promotion_result_ui.inc');

// Main control logic
update_promotion();

//-------------------------------------------------------------
function update_promotion()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,
        DB_NAME);

    // Get the bannerid and other data sent by the user from the query
    $promoCode = $_POST['promoCode'];
    $name = mysql_real_escape_string($_POST["promotionName"]);
    $description = mysql_real_escape_string($_POST["promotionDescription"]);
    $amountOff = mysql_real_escape_string($_POST["amountOff"]);
    $promoType = mysql_real_escape_string($_POST["promotionType"]);

    $updateStmt = "update Promotion
	set  Name = '".$name."', Description = '".$description."', AmountOff = '".$amountOff."',
	PromoType = '".$promoType."'".
        "WHERE  PromoCode = '".$promoCode."'";

    $result = execute_SQL_query_with_no_error_report($updateStmt);

    $message = "";

    if (!$result)
    {
        $message .= "Error in updating Promotion: ".$promoCode." in database.<br />".mysql_error()."<hr />";
    }
    else
    {
        $message = "Data for Promotion updated successfully.<br />PromoCode: $promoCode<br />Promotion Description:
$description <br />Promotion
Type:
$promoType <br />Promotion Name: $name <br />Amount Off: $amountOff<br /><br />";
    }

    $getPromoItemsStmt = "SELECT * FROM PromotionItem WHERE PromoCode = '$promoCode'";
    //echo "$getPromoItemsStmt";
    $promoItems = execute_SQL_query_with_no_error_report($getPromoItemsStmt);

    $numPromoItems = count_rows_in_result_set($promoItems);
    while ($promoItem = mysql_fetch_assoc($promoItems))
    {
        $id = $promoItem['ID'];
        $oldSalePrice = $promoItem['SalePrice'];
        $itemNo = $promoItem['ItemNumber'];
        $retail = getRetailPrice($itemNo);
        //echo "ID = $id PromoCode: $promoCode OldSalePrice: $oldSalePrice";

        $newSalePrice = getNewSalePrice($retail, $promoType, $amountOff);

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


    ui_show_promotion_update_details($message);
}

function getNewSalePrice($item_retail_price, $promoType, $amountOff)
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
function getRetailPrice($itemNo)
{
    $select_stmt = "SELECT FullRetailPrice FROM Item WHERE ItemNumber = '$itemNo'";
    $not_found_message = "Could not retrieve Full Retail Price from Item.";
    $result = get_unique_row($select_stmt, $not_found_message, $not_found_message);

    return $result['FullRetailPrice'];
}

?>