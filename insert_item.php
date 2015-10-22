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

//This file contains php code that will be executed after the
//insert operation is done.
require('item_insert_result_ui.inc');

// Main control logic
insert_item();

//-------------------------------------------------------------
function insert_item()
{

    // Connect to the 'test' database
    // The parameters are defined in the teach_cn.inc file
    // These are global constants
    connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

    // Get the information entered into the webpage by the user
    // These are available in the super global variable $_POST
    // This is actually an associative array, indexed by a string
    $itemNumber = $_POST['itemNumber'];
    $itemDescription = $_POST['itemDescription'];
    $category = $_POST['category'];
    $departmentName = $_POST['departmentName'];
    $purchaseCost = $_POST['purchaseCost'];
    $retailPrice = $_POST['retailPrice'];

    // Create a String consisting of the SQL command. Remember that
    // . is the concatenation operator. $varname within double quotes
    // will be evaluated by PHP
    $insertStmt = "INSERT INTO Item (ItemNumber, ItemDescription, Category, DepartmentName,
		       PurchaseCost, FullRetailPrice) values ( '$itemNumber','$itemDescription', '$category',
                      '$departmentName', '$purchaseCost', '$retailPrice')";

    //Execute the query. The result will just be true or false
    $result = mysql_query($insertStmt);

    $message = "";

    if (!$result)
    {
        $message = "Error in inserting Item: $itemDescription , $category, $departmentName: ". mysql_error();
    }
    else
    {
        $message = "Data for Item: $itemDescription , $category, $departmentName, inserted successfully.";

    }

    ui_show_item_insert_result($message, $itemNumber, $itemDescription, $category,
        $departmentName, $purchaseCost, $retailPrice);

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

?>
