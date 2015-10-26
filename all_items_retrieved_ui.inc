<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */

function ui_show_items_retrieved($message, $items_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    echo "<HTML>";
    echo "<HEAD>";
    echo "</HEAD>";
    echo "<BODY>";

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname

    if ($message)
    {
        if ($message != "")
        {
            echo '<center><font color="blue">'.$message.'</font></center><br />';
        }
    }
    echo "<h3>CHOOSE ITEM TO ADD TO PROMOTION</h3>'";
    echo <<<END
    <form action="search_promotions_ui.php" method="post">
    <table>
    <tr>
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

        echo "<td><INPUT TYPE='submit' NAME='itemNumber' VALUE='$itemNumber' /></td>";
        echo "<td>$itemDescription</td>";
        echo "<td>$category</td>";
        echo "<td>$deptartmentName</td>";
        echo "<td>$purchaseCost</td>";
        echo "<td>$fullRetailPrice</td>";

        echo '</tr>';
    }

    echo "</table>";
    echo "</form>";

    echo <<<END
    <br />
    <input type="button" value="Return to Main Menu" onClick="window.location='index.html'"/>
    </body>
    </html>
END;

}
?>