<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */
require('ui_utilities.inc');

function ui_show_promotions_to_add_to_event_retrieved($message, $promotions_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD PROMOTIONS TO EVENT");
    echo "<center><h3>Select the Promotions you wish to add to an Event and press the Submit button.</h3></center>";
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
    <form action="search_events_to_add_promotions_to_ui.php" method="post">
    <center><input type="submit" value="Submit"/></center><br />
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th></th>
    <th>PromoCode</th>
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

        echo "<td><center><INPUT TYPE='checkbox' NAME='promoCodes[]' VALUE='$promoCode' /></center></td>";
        echo "<td>$promoCode</td>";
        echo "<td>$name</td>";
        echo "<td>$description</td>";
        if($promoType == "Percent")
        {
            $value = $amountOff*100;
            echo "<td>$value%</td>";
        }
        else{
            echo "<td>$amountOff</td>";
        }
        echo "<td>$promoType</td>";
        echo '</tr>';
    }

    echo "</table>";
    echo"<br />";
    echo "<center><input type='submit' value='Submit'/></center>";
    echo "</form>";

    ui_print_footer_with_main_menu_button();
}
?>