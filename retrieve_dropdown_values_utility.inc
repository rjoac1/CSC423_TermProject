<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/10/2015
 * Time: 11:37 AM
 */
require_once('db_cn.inc');
require_once('db_access.inc');

function get_promoType_dropdown_values()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    $sql = "SELECT DISTINCT PromoType FROM Promotion";
    $result = execute_SQL_query_with_no_error_report($sql);
    return $result;
}
function get_item_category_dropdown_values()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    $sql = "SELECT DISTINCT Category FROM Item";
    $result = execute_SQL_query_with_no_error_report($sql);
    return $result;
}
function get_item_department_name_dropdown_values()
{
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    $sql = "SELECT DISTINCT DepartmentName FROM Item";
    $result = execute_SQL_query_with_no_error_report($sql);
    return $result;
}


?>