<?php
/** Created by PhpStorm. ...*/
//------------------------------------------------------------
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_event_form();

//------------------------------------------------------------
function ui_show_search_event_form()
{
    //Create an HTML document using the ECHO statements
    ui_print_header("UPDATE EVENT");

    echo "<div class='center'>";
    echo "<center>";
    echo "<H3>Search for Event to update</H3>";
    echo "<H4>Enter keywords for event search. Some fields may be left blank.</H4>";
    echo "</center>";
    echo "<BR/>";
    echo "<FORM action='../../retrieve_events_to_update.php' method='post'>";
    echo "<table>";

    echo '<tr>';  // Event Code
    echo '<TD><SPAN ALIGN=RIGHT>Event Code:</SPAN></TD>';
    echo '<TD><INPUT NAME="eventCode" ID="eventCode" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Event Name
    echo '<TD><SPAN ALIGN=RIGHT>Event Name:</SPAN></TD>';
    echo '<TD><INPUT NAME="eventName" ID="eventName" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Start Date
    echo '<TD><SPAN ALIGN=RIGHT>Start Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="startDate"ID="startDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // End Date
    echo '<TD><SPAN ALIGN=RIGHT>End Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="endDate" ID="endDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Description
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="description" ID="description" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Type
    echo '<TD><SPAN ALIGN=RIGHT>Type:</SPAN></TD>';
    echo '<TD><INPUT NAME="type" ID="type" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';
    echo '<td align="right"><input type="reset" value="Reset" /></td>';
    echo '<td align="right"><input type="submit" value="Search Events"/></td>';
    echo '</tr>';

    echo "</table>";

    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}