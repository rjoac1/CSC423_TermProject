<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */
require('ui_utilities.inc');
function ui_show_events_retrieved($message, $events_retrieved_result, $promoCodes)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD PROMOTIONS TO EVENT");

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname
    echo "<center><h3>Select Event you wish to add Promotions to.</h3></center>";
    if ($message)
    {
        if ($message != "")
        {
            echo '<center><font color="blue">'.$message.'</font></center><br />';
        }
    }

    echo <<<END1
    <div class="center">
    <form action="add_promotions_to_event.php" method="post">
END1;
    foreach($promoCodes as $promoCode)
    {
        echo "<input type='hidden' name='promoCodes[]' value='$promoCode' />";
    }
    echo <<<END2
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>Event Code</th>
    <th>Name</th>
    <th>Start Date</th>
    <th>End Date Off</th>
    <th>Description</th>
    <th>Ad Type</th>
    </tr>
END2;


    while($row = mysql_fetch_assoc($events_retrieved_result))
    {
        $eventCode = $row['EventCode'];
        $name = $row['Name'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $description = $row['Description'];
        $adType = $row['AdType'];

        echo "<tr>";

        echo "<td><center><INPUT TYPE='submit' NAME='eventCode' VALUE='$eventCode' /></center></td>";
        echo "<td>$name</td>";
        echo "<td>$startDate</td>";
        echo "<td>$endDate</td>";
        echo "<td>$description</td>";
        echo "<td>$adType</td>";

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