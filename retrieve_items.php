<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/23/2015
 * Time: 12:06 PM
 */

require('db_cn.inc');
require('all_items_retrieved_ui.inc');
require('db_access.inc');
//Main control logic
get_items_matching_search_criteria();

function get_items_matching_search_criteria()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $itemNumber = $_POST['itemNumber'];
    $itemDescription = $_POST['itemDescription'];
    $category = $_POST['category'];
    $departmentName = $_POST['departmentName'];

    $sql = "SELECT ItemNumber, ItemDescription, Category, DepartmentName, PurchaseCost, FullRetailPrice
        FROM   Item
        WHERE  ItemNumber LIKE '%".$itemNumber."%'
        AND ItemDescription LIKE '%".$itemDescription."%'
        AND Category LIKE '%".$category."%'
        AND DepartmentName LIKE '%".$departmentName."'";

    $error_message = "Could not successfully run query ($sql) from DB: ";


    $search_items_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_items_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No items found in database";
    ui_show_items_retrieved($message, $search_items_result);
}
?>