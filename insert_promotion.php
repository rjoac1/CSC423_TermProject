<!-- insert_item.php
   A PHP script to insert a new item into the database
-->
<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/21/2015
 * Time: 3:12 PM
 */

require('db_cn.inc');
require('db_access.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('promotion_insert_result_ui.inc');

// Main control logic
insert_promotion();

//-------------------------------------------------------------
function insert_promotion()
{

    // Connect to the 'test' database
    // The parameters are defined in the teach_cn.inc file
    // These are global constants
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    // Get the information entered into the webpage by the user
    // These are available in the super global variable $_POST
    // This is actually an associative array, indexed by a string
    $promotionNumber = $_POST['promotionNumber'];
    $promotionName = $_POST['promotionName'];
    $promotionDescription = $_POST['promotionDescription'];
    //$category = $_POST['category'];
    $promotionValue = $_POST['promotionValue'];
    $promotionType = $_POST['promotionType'];

    // Create a String consisting of the SQL command. Remember that
    // . is the concatenation operator. $varname within double quotes
    // will be evaluated by PHP
    $insertStmt = "INSERT INTO Promotion (Name, Description, AmountOff,
		       PromoType) values ('$promotionName', '$promotionDescription',
                      '$promotionValue', '$promotionType')";

    //Execute the query. The result will just be true or false
    $result = mysql_query($insertStmt);

    $message = "";

    if (!$result)
    {
        $message = "Error in inserting Promotion. <br />Promotion Description: $promotionDescription <br />Promotion Type: $promotionType <br />Promotion Name: $promotionName <br />Amount Off: $promotionValue<br />". mysql_error();
    }
    else
    {
        $message = "Data for Promotion inserted successfully. <br />Promotion Description: $promotionDescription <br />Promotion Type: $promotionType <br />Promotion Name: $promotionName <br />Amount Off: $promotionValue";

    }

    ui_show_promotion_insert_result($message, $promotionNumber, $promotionName, $promotionDescription,
        $promotionValue, $promotionType);

}

?>
