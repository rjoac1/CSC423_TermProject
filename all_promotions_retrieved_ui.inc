<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */

function ui_show_promotions_retrieved($message, $promotions_retrieved_result, $item_number)
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
    echo "<h3>CHOOSE PROMOTION TO ADD ITEM TO</h3>'";
    echo <<<END
    <form action="add_item_to_promotion.php" method="post">
    <input type="hidden" name="itemNumber" value="$item_number" />
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>Promo Code</th>
    <th>Name</th>
    <th>Description</th>
    <th>Amount Off</th>
    <th>Promo Type</th>
    </tr>
END;
    while($row = mysql_fetch_assoc($promotions_retrieved_result))
    {
        $promoCode = $row['PromoCode'];
        $name = $row['Name'];
        $description = $row['Description'];
        $amountOff = $row['AmountOff'];
        $promoType = $row['PromoType'];

        echo "<tr>";

        echo "<td><center><INPUT TYPE='submit' NAME='promoCode' VALUE='$promoCode' /></center></td>";
        echo "<td>$name</td>";
        echo "<td>$description</td>";
        echo "<td>$amountOff</td>";
        echo "<td>$promoType</td>";

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