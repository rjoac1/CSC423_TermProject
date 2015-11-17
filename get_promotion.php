<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/10/2015
 * Time: 11:19 AM
 */
require('db_cn.inc');
require('db_access.inc');
require('update_promotion_ui.inc');

getPromotion();

function getPromotion(){
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    $promoCode = $_REQUEST['promoCode'];

    $sql = "SELECT PromoCode, Name, Description, AmountOff, PromoType
        FROM   Promotion
        WHERE  PromoCode = '".$promoCode."'";

    $error_message =
        "Could not successfully run query to get promotion data ($sql) from DB: ";
    $not_found_message =
        "Promotion with PromoCode ($promoCode) not found in DB";

    $row = get_unique_row($sql, $error_message, $not_found_message);

    $promoCode = $row["PromoCode"];
    $name = $row["Name"];
    $description = $row["Description"];
    $amountOff = $row["AmountOff"];
    $promoType = $row["PromoType"];

    ui_show_update_promotion_form($promoCode, $name,
       $description, $amountOff, $promoType);

}
?>