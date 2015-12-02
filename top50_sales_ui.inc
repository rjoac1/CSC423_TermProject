<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */
require('ui_utilities.inc');
function ui_show_top50_sales_retrieved($message, $promotions_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("List of Promotion's and associated Items");

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname

    if ($message)
    {
        if ($message != "")
        {
            echo '<center><font color="blue">'.$message.'</font></center><br />';
        }
    }

    echo <<<END
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>#</th>
    <th>Event Code</th>
    <th>Event Name</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Item Number</th>
    <th>Item Name</th>
    <th>Item Description</th>
    <th>Item Category</th>
    <th>Item Department</th>
    <th>Item Purchase Cost</th>
    <th>Full Retail Price</th>
    <ht>Sale Price</>
    <th>Savings</th>
    </tr>
END;
    $count = 0;
    $bgcolor1 = "<tr  bgcolor='#a9a9a9'>";
    $bgcolor2 = "<tr  bgcolor='#FFFFFF'>"
    while($row = mysql_fetch_assoc($promotions_retrieved_result))
    {
        $eventCode = $row['EventCode'];
        $eventName = $row['Name'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $itemNumber = $row['ItemNumber'];
        $itemDescription = $row['ItemDescription'];
        $category = $row['Category'];
        $department = $row['DepartmentName'];
        $purchaseCost = $row['PurchaseCost'];
        $fullRetail = $row['FullRetailPrice'];
        $salePrice = $row['SalePrice'];
        $savings = $row['Savings'];


        echo "<td><b>$eventCode</b></td>";
        echo "<td><b>$eventName</b></td>";
        echo "<td ><b>$startDate</b></td>";
        echo "<td><b>$endDate</b></td>";

        echo "<td><b>$itemNumber</b></td>";
        echo "<td><b>$itemDescription</b></td>";
        echo "<td><b>$category</b></td>";
        echo "<td><b>$department</b></td>";
        echo "<td><b>$purchaseCost</b></td>";
        echo "<td><b>$fullRetail</b></td>";
        echo "<td><b>$salePrice</b></td>";
        echo "<td><b>$savings</b></td>";

        echo '</tr>';
        $temp = $bgcolor1;
        $bgcolor1 = $bgcolor2;
        $bgcolor2 = $temp;
        //this is where a sub-table will go -mw
    }

    echo "</table>";
    echo"<br />";
    echo "</form>";

    ui_print_footer_with_main_menu_button();

}

?>
