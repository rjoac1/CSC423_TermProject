<?php
/**
 * Created by PhpStorm.
 * User: douglasschultz1
 *
 */
require('ui_utilities.inc');

function ui_show_events_retrieved($message, $events_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("List of Event's Promotions");
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

        echo "<tr  bgcolor='#a9a9a9'>";

        echo "<td><b>$eventCode</b></td>";
        echo "<td><b>$eventName</b></td>";
        echo "<td width='90'><b>$startDate</b></td>";
        echo "<td width='90'><b>$endDate</b></td>";
        echo "<td><b>$description</b></td>";
        echo "<td><b>$type</b></td>";

        echo '</tr>';

        echo '<tr>';
        echo '<td colspan="6">';
        retrieve_and_print_associated_promos($eventCode);
        echo "</td>";
        echo '</tr>';

    }

    echo "</table>";
    echo"<br />";

    ui_print_footer_with_main_menu_button();
}

function retrieve_and_print_associated_promos($eventCode){

    $sql2 = "SELECT * FROM `Promotion` WHERE PromoCode in (SELECT `PromoCode` FROM `AdEventPromotion` WHERE `EventCode` in (SELECT `EventCode` FROM `AdEvent` WHERE `EventCode` = '" . $eventCode . "'))";


    $error_message = "Could not successfully run query ($sql2) from DB: ";


    $search_events_result = get_result_set_from_select_query($sql2,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_events_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No events found in database";
    ui_show_eventpromo_retrieved($message, $search_events_result);

}

function ui_show_eventpromo_retrieved($message, $events_retrieved_result){
    $numrows = mysql_num_rows($events_retrieved_result);
    if($numrows == 0){
        echo <<<END2
        <table border="1" cellspacing="0" cellpadding="5px" bgcolor="white" width="900">
        <tr><td colspan="6">
        There are no associated promotions for this event at this time.
        </td></tr></table>
END2;
    }else {
        echo <<<END
        <table border="1" cellspacing="0" cellpadding="5px" bgcolor="white" width="900">
        <tr>
        <th>Promomotion Name</th>
        <th>Description Name</th>
        <th>Amount Off</th>
        <th>Promotion Type</th>
        </tr>
END;
        while ($row = mysql_fetch_assoc($events_retrieved_result)) {
            $promoName = $row['Name'];
            $description = $row['Description'];
            $amountOff = $row['AmountOff'];
            $promoType = $row['PromoType'];

            echo "<tr>";

            echo "<td>$promoName</td>";
            echo "<td>$description</td>";
            echo "<td>$amountOff</td>";
            echo "<td>$promoType</td>";

            echo '</tr>';

        }

        echo "</table>";
        echo "<br />";
    }
}

?>