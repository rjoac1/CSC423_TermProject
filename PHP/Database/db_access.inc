<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 12:04 PM
 */

function contact_server($server, $username, $pwd)
{
    // Connect to db server
    $conn = mysql_connect($server, $username, $pwd);

    if (!$conn) {
        echo "Unable to connect to server: ". mysql_error();
        exit;
    }
}

function connect_and_select_db($server, $username, $pwd, $dbname)
{
    // Connect to db server
    $conn = mysql_connect($server, $username, $pwd);

    if (!$conn) {
        echo "Unable to connect to DB: " . mysql_error();
        exit;
    }

    // Select the database
    $dbh = mysql_select_db($dbname);
    if (!$dbh){
        echo "Unable to select ".$dbname.": " . mysql_error();
        exit;
    }
}

function get_unique_row($sql, $error_message, $not_found_message)
{
    $result = mysql_query($sql);
    if (!$result)
    {
        echo "$error_message ".mysql_error();
        exit;
    }

    $numrows = mysql_num_rows($result);
    if ($numrows == 0)
    {
        echo "$not_found_message";
        exit;
    }
    $row = mysql_fetch_assoc($result);

    mysql_free_result($result);

    return $row;
}

function get_multiple_rows($sql, $error_message, $not_found_message)
{
    $result = mysql_query($sql);
    if (!$result)
    {
        echo "$error_message ".mysql_error();
        exit;
    }

    $numrows = mysql_num_rows($result);
    if ($numrows == 0)
    {
        echo "$not_found_message";
        exit;
    }

    return $result;
}

function get_result_set_from_select_query($sql, $error_message)
{
    $result = mysql_query($sql);
    if (!$result)
    {
        echo "$error_message ".mysql_error();
        exit;
    }

    return $result;
}

function count_rows_in_result_set($result_set)
{
    return mysql_num_rows($result_set);
}

function execute_SQL_query($sql, $error_message)
{
    $result = mysql_query($sql);
    if (!$result) {
        echo "$error_message ".mysql_error();
        exit;
    }

    return $result;
}

function execute_SQL_query_with_no_error_report($sql)
{
    $result = mysql_query($sql);

    return $result;
}

function free_result_set($result_set)
{
    mysql_free_result($result_set);
}

function insert_escape_characters_into_query_text($string_val)
{

    return mysql_real_escape_string($string_val);
}


?>