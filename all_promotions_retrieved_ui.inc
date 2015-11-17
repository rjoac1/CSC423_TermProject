<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */
require('ui_utilities.inc');
function ui_show_promotions_retrieved($message, $promotions_retrieved_result, $item_numbers)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD ITEMS TO PROMOTION");
    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname
    echo "<center><h3>Select Promotion you wish to add Items to.</h3></center>";
    if ($message)
    {
        if ($message != "")
        {
            echo '<center><font color="blue">'.$message.'</font></center><br />';
        }
    }
    echo <<<END1
    <div class="center">
    <form action="add_item_to_promotion.php" method="post">
END1;
    foreach($item_numbers as $itemNo)
    {
        echo "<input type='hidden' name='itemNumbers[]' value='$itemNo' />";
    }
    echo <<<END2
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>Promo Code</th>
    <th>Name</th>
    <th>Description</th>
    <th>Amount Off</th>
    <th>Promo Type</th>
    </tr>
END2;
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
    echo "</div>";
    echo <<<END
END;
    ui_print_footer_with_main_menu_button();
}
?>