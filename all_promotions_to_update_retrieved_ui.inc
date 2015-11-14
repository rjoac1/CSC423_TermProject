<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/10/2015
 * Time: 11:14 AM
 */
require('ui_utilities.inc');

function ui_show_promotions_retrieved($message, $promotions_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("UPDATE PROMOTION");
    echo "<center><h3>Select the Promotion you wish to update.</h3></center>";
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
    <form action="get_promotion.php" method="post">
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>Promotion Code</th>
    <th>Name</th>
    <th>Description</th>
    <th>Amount Off</th>
    <th>Promotion Type</th>
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
    echo"<br />";
    echo "</form>";

    ui_print_footer_with_main_menu_button();
}
?>