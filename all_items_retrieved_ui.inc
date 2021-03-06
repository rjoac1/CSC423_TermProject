<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */
require('ui_utilities.inc');

function ui_show_items_retrieved($message, $items_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD ITEMS TO PROMOTION");
    echo "<center><h3>Select the Items you wish to add to a Promotion and press the Submit button.</h3></center>";
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
    <form action="search_promotions_ui.php" method="post">
    <center><input type="submit" value="Submit"/></center><br />
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th></th>
    <th>Item Number</th>
    <th>Item Description</th>
    <th>Category</th>
    <th>Department Name</th>
    <th>Purchase Cost</th>
    <th>Full Retail Price</th>
    </tr>
END;
    while($row = mysql_fetch_assoc($items_retrieved_result))
    {
        $itemNumber = $row['ItemNumber'];
        $itemDescription = $row['ItemDescription'];
        $category = $row['Category'];
        $deptartmentName = $row['DepartmentName'];
        $purchaseCost = $row['PurchaseCost'];
        $fullRetailPrice = $row['FullRetailPrice'];

        echo "<tr>";

        echo "<td><center><INPUT TYPE='checkbox' NAME='itemNumbers[]' VALUE='$itemNumber' /></center></td>";
        echo "<td>$itemNumber</td>";
        echo "<td>$itemDescription</td>";
        echo "<td>$category</td>";
        echo "<td>$deptartmentName</td>";
        echo "<td>$purchaseCost</td>";
        echo "<td>$fullRetailPrice</td>";

        echo '</tr>';
    }

    echo "</table>";
    echo"<br />";
    echo "<center><input type='submit' value='Submit'/></center>";
    echo "</form>";

    ui_print_footer_with_main_menu_button();
}
?>