<?php
require('ui_utilities.inc');
//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_event_form();

//------------------------------------------------------------
function ui_show_new_event_form()
{
    //Create an HTML document using the ECHO statements

    $script = "<script type='text/javascript' src='Javascript/ValidateEvent.js'>  </script>";
    $script1 = "<link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">";
    $script2 = "<script src=\"http://code.jquery.com/jquery-1.10.2.js\"></script>";
    $script3 = "<script src=\"http://code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>";
    $args = array($script1, $script2, $script3, $script);
    ui_print_header_with_head_elements("ADD NEW EVENT", $args);
    
    echo "<div class='center'>";
    echo "<FORM action='insert_event.php' method='post'>";
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
    echo '<td align="right"><input type="submit" onclick="return validateForm();" value="Submit New Event Data" /></td>';
    echo '</tr>';

    echo "</table>";

    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}
