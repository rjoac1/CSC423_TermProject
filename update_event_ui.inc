<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 11/13/2015
 * Time: 10:52 PM
 */

require('ui_utilities.inc');
//------------------------------------------------------------
// Main Control Logic: It just calls a function
//------------------------------------------------------------
function ui_show_update_event_form($eventCode, $eventName,
                                  $startDate, $endDate, $description, $type)
{
    $script = "<script type='text/javascript' src='Javascript/ValidateEvent.js'>  </script>";
    $script1 = "<link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css\">";
    $script2 = "<script src=\"http://code.jquery.com/jquery-1.10.2.js\"></script>";
    $script3 = "<script src=\"http://code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>";
    $args = array($script1, $script2, $script3, $script);
   // $script = "<script type='text/javascript' src='NewEventValidation.js'> </script>";
    ui_print_header_with_head_elements("UPDATE EVENT", $args);

    echo "<div class='center'>";
    echo "<FORM action='update_event.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo "<TD><INPUT NAME=\"eventCode\" ID=\"eventCode\" TYPE=\"hidden\" SIZE=50 VALUE='$eventCode' /></TD>";
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Event Name:</SPAN></TD>';
    echo "<TD><INPUT NAME='eventName' ID='eventName' TYPE='text' SIZE=50 VALUE='$eventName' /></TD>";
    echo '</tr>';

    echo '<tr>';  // Start Date
    echo '<TD><SPAN ALIGN=RIGHT>Start Date:</SPAN></TD>';
    echo "<TD><INPUT NAME='startDate' ID='startDate' TYPE='text' SIZE=50 VALUE='$startDate' /></TD>";
    echo '</tr>';

    echo '<tr>';  // End Date
    echo '<TD><SPAN ALIGN=RIGHT>End Date:</SPAN></TD>';
    echo "<TD><INPUT NAME='endDate' ID='endDate' TYPE='text' SIZE=50 VALUE='$endDate' /></TD>";
    echo '</tr>';

    echo '<tr>';  // Description
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo "<TD><INPUT NAME='description' ID='description' TYPE='text' SIZE=50 VALUE='$description' /></TD>";
    echo '</tr>';

    echo '<tr>';  // Type
    echo '<TD><SPAN ALIGN=RIGHT>Type:</SPAN></TD>';
    echo "<TD><INPUT NAME='type' ID='type' TYPE='text' SIZE=50 VALUE='$type' /></TD>";
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
 //   echo '<TD align="right"><input type="submit" value="Update Event Data" onclick="return setHiddenValues();"
 //   /></TD>';

    echo '<TD align="right"><input type="submit" value="Update Event Data" onclick="return validateForm();"
    /></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();

}
