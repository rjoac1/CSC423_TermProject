<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/9/2015
 * Time: 2:46 PM
 */
require('db_cn.inc');
require('db_access.inc');
require('update_item_ui.inc');

getItem();

function getItem(){
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    $itemNumber = $_REQUEST['itemNumber'];

    $sql = "SELECT ItemNumber, ItemDescription, Category, DepartmentName, PurchaseCost, FullRetailPrice
        FROM   Item
        WHERE  ItemNumber = '".$itemNumber."'";

    $error_message =
        "Could not successfully run query to get item data ($sql) from DB: ";
    $not_found_message =
        "Item with Item Number ($itemNumber) not found in DB";

    $row = get_unique_row($sql, $error_message, $not_found_message);

    $itemNumber = $row["ItemNumber"];
    $itemDescription = $row["ItemDescription"];
    $category = $row["Category"];
    $deptName = $row["DepartmentName"];
    $purchCost = $row["PurchaseCost"];
    $retail = $row["FullRetailPrice"];


    ui_show_update_item_form($itemNumber, $itemDescription,
        $category, $deptName, $purchCost, $retail);

}
?>