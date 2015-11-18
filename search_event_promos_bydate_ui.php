<?php
/**
 * Created by PhpStorm.
 * User: mwaldt
 * Date: 11/18/2015
 * Time: 10:41 AM
 */

require('ui_utilities.inc');
//require('retrieve_events_promo_listing.php');
// Main Control Logic: It just calls a function
ui_show_search_event_promo_form();

//------------------------------------------------------------
function ui_show_search_event_promo_form()
{
    //Create an HTML document using the ECHO statements
    $args = "<script src=\"http://code.jquery.com/jquery-1.10.2.js\"></script>".
            "<script src=\"http://code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>".
            "<script type=\"text/javascript\" src=\"Javascript/ValidateEvent.js\">  </script>";

    ui_print_header("VIEW EVENTS AND PROMOTIONS", $args);

    echo "<div class='center'>";
    echo "<center>";
    echo "<H3>Search for Event's and associated Promotions</H3>";
    echo "<H4>Enter a range of dates to search between, any events that take place between these values will be returned with all associated promotions.</H4>";
    echo "</center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_events_promo_listing.php' method='post'>";
    echo "<table>";


    echo '<tr>';  // Start Date
    echo '<TD><SPAN ALIGN=RIGHT>Start Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="startDate"ID="startDate" TYPE="text" class="hasDatepicker" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  // End Date
    echo '<TD><SPAN ALIGN=RIGHT>End Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="endDate" ID="endDate" TYPE="text" class="hasDatepicker" SIZE=50/></TD>';
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