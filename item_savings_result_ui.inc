<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/24/2015
 * Time: 3:47 PM
 */

include('ui_utilities.inc');

function ui_show_item_savings_details($message, $result){
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("FIND BIGGEST SAVINGS FOR AN ITEM");
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
    <th>Event Code</th>
    <th>Event Name</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Description</th>
    <th>Type</th>
    <th>Full Retail Price</th>
    <th>Sale Price</th>
    <th>Savings</th>
    </tr>
END;
    while($row = mysql_fetch_assoc($result))
    {
        $eventCode = $row['EventCode'];
        $eventName = $row['Name'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $description = $row['Description'];
        $type = $row['AdType'];
        $fullRetail = $row['FullRetailPrice'];
        $salePrice = $row['SalePrice'];
        $savings = $row['Savings'];

        $fullRetail = round($fullRetail, 2);
        $salePrice = round($salePrice, 2);
        $savings = round($savings, 2);

        echo "<tr>";

        echo "<td>$eventCode</td>";
        echo "<td>$eventName</td>";
        echo "<td>$startDate</td>";
        echo "<td>$endDate</td>";
        echo "<td>$description</td>";
        echo "<td>$type</td>";
        echo "<td>$fullRetail</td>";
        echo "<td>$salePrice</td>";
        echo "<td>$savings</td>";


        echo '</tr>';
    }

    echo "</table>";
    echo"<br />";
    ui_print_footer_with_main_menu_button();
}