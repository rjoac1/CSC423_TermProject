<?php
/**
 * Created by PhpStorm.
 * User: douglasschultz1
 */
require('ui_utilities.inc');

function ui_show_events_retrieved($message, $events_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header(" This");
    echo "<center><h3>Change this too.</h3></center>";
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
    <center></center><br />
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th></th>
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
        $eventName = $row['EventName'];
        $startDate = $row['StartDate'];
        $endDate = $row['EndDate'];
        $description = $row['Description'];
        $type = $row['Type'];

        echo "<tr>";

        echo "<td>$eventCode</td>";
        echo "<td>$eventName</td>";
        echo "<td>$startDate</td>";
        echo "<td>$endDate</td>";
        echo "<td>$description</td>";
        echo "<td>$type</td>";

        echo '</tr>';

        retrieve_and_print_associated_promos($eventCode);

    }

    echo "</table>";
    echo"<br />";

    ui_print_footer_with_main_menu_button();
}

function retrieve_and_print_associated_promos($eventCode){
    $sql = "";
    $error_message = "Could not successfully run query ($sql) from DB: ";


    $search_events_result = get_result_set_from_select_query($sql,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No events found in database";
    ui_show_eventpromo_retrieved($message, $search_events_result);
}

function ui_show_eventpromo_retrieved($message, $events_retrieved_result){

}

?>