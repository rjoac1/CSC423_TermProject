<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:08 PM
 */
require('db_cn.inc');
require('all_promotions_retrieved_ui.inc');
require('db_access.inc');

//Main control logic
get_promotions_matching_search_criteria();

function get_promotions_matching_search_criteria()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    $itemNumbers = $_POST['itemNumbers'];
    $promoCode = mysql_real_escape_string($_POST['promoCode']);
    $name = mysql_real_escape_string($_POST['name']);
    $description = mysql_real_escape_string($_POST['description']);

    $sql = "SELECT *
        FROM   Promotion
        WHERE  PromoCode LIKE '%".$promoCode."%'
        AND Promotion.Name LIKE '%".$name."%'
        AND Description LIKE '%".$description."%'";

    $error_message = "Could not successfully run query ($sql) from DB: ";

    $search_promotions_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_promotions_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No promotions found in database";

    ui_show_promotions_retrieved($message, $search_promotions_result, $itemNumbers);
}