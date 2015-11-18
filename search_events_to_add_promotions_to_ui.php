<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:05 PM
 */
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_event_form();

//------------------------------------------------------------
function ui_show_search_event_form()
{
    $promoCodes_selected = $_POST['promoCodes'];

    //Create an HTML document using the ECHO statements
    ui_print_header("ADD PROMOTIONS TO EVENT");

    echo "<div class='center'>";
    echo "<center><H3>SEARCH FOR EVENT TO ADD PROMOTIONS TO</H3></center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_events_to_add_promotions_to.php' method='post'>";
    foreach($promoCodes_selected as $promoCode)
    {
        echo '<input type="hidden" name="promoCodes[]" value="'.$promoCode.'" />';
    }
    echo "<table>";
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Event Code:</SPAN></TD>';
    echo '<TD><INPUT NAME="eventCode" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Name:</SPAN></TD>';
    echo '<TD><INPUT NAME="name" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Start Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="startDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>End Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="endDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="description" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Ad Type:</SPAN></TD>';
    echo '<TD><INPUT NAME="adType" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Search Events" /></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}