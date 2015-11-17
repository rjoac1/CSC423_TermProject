<?php
/**
 * Created by PhpStorm.
 * User: Allan
 */
require('ui_utilities.inc');

function ui_show_events_retrieved($message, $events_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD EVENTS TO PROMOTION");
    echo "<center><h3>Select the Events you wish to add to a Promotion and press the Submit button.</h3></center>";
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
    <form action="search_promotion_adevent_ui.php" method="post">
    <center><input type="submit" value="Submit"/></center><br />
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th></th>
    <th>Event Number</th>
    <th>Event Name</th>
    <th>Begin Date</th>
    <th>End Date</th>
    <th>Description</th>
    <th>Ad type</th>
    </tr>
END;
    while($row = mysql_fetch_assoc($events_retrieved_result))
    {
        $eventNumber = $row['EventCode'];
        $name = $row['Name'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $description = $row['Description'];
        $adType = $row['AdType'];

        echo "<tr>";

        echo "<td><center><INPUT TYPE='checkbox' NAME='eventNumbers[]' VALUE='$eventNumber' /></center></td>";
        echo "<td>$eventNumber</td>";
        echo "<td>$name</td>";
        echo "<td>$startDate</td>";
        echo "<td>$endDate</td>";
        echo "<td>$description</td>";
        echo "<td>$adType</td>";

        echo '</tr>';
    }

    echo "</table>";
    echo"<br />";
    echo "<center><input type='submit' value='Submit'/></center>";
    echo "</form>";

    ui_print_footer_with_main_menu_button();
}
?>