<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 11/11/2015
 * Time: 7:48 PM
 */
require('ui_utilities.inc');

function ui_show_events_retrieved($message, $events_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("UPDATE EVENT");

    echo "<center><h3>Select the Event you wish to update.</h3></center>";
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
    <form action="get_event.php" method="post">
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>Event Code</th>
    <th>Event Name</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Description</th>
    <th>Type</th>
    </tr>
END;
    while($row = mysql_fetch_assoc($events_retrieved_result))
    {
        $eventCode = $row['EventCode'];
        $eventName = $row['Name'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $description = $row['Description'];
        $type = $row['AdType'];

        echo "<tr>";

        echo "<td><center><INPUT TYPE='submit' NAME='eventCode' VALUE='$eventCode' /></center></td>";
        echo "<td>$eventName</td>";
        echo "<td>$startDate</td>";
        echo "<td>$endDate</td>";
        echo "<td>$description</td>";
        echo "<td>$type</td>";


        echo '</tr>';
    }

    echo "</table>";
    echo"<br />";
    echo "</form>";

    ui_print_footer_with_main_menu_button();



}