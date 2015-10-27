<?php

//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_event_form();

//------------------------------------------------------------
function ui_show_new_event_form()
{
    //Create an HTML document using the ECHO statements
    echo "<HTML>";
    echo "<HEAD>";
    echo "<script type='text/javascript' src='ValidateEvent.js'>  </script>";
    echo "</HEAD>";
    echo "<BODY>";
    echo "<BR/>";
    echo "<FORM action='insert_event.php' method='post'>";
    echo "<table>";

    echo '<tr>';  // Event Code
    echo '<TD><SPAN ALIGN=RIGHT>Event Code:</SPAN></TD>';
    echo '<TD><INPUT ID="eventCode" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Event Name
    echo '<TD><SPAN ALIGN=RIGHT>Event Name:</SPAN></TD>';
    echo '<TD><INPUT ID="eventName" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Start Date
    echo '<TD><SPAN ALIGN=RIGHT>Start Date:</SPAN></TD>';
    echo '<TD><INPUT ID="startDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // End Date
    echo '<TD><SPAN ALIGN=RIGHT>End Date:</SPAN></TD>';
    echo '<TD><INPUT ID="endDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Description
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo '<TD><INPUT ID="description" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // Type
    echo '<TD><SPAN ALIGN=RIGHT>Type:</SPAN></TD>';
    echo '<TD><INPUT ID="type" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';
    echo "</table>";
    echo '<input type="reset" value="Reset" />';
    echo '<input type="submit" onclick="return validateForm();" value="Submit New Event Data" />';

    echo "</FORM>";
    echo "</BODY>";
    echo "</HTML>";
}
