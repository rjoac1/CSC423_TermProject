<?php
/**
 * Created by PhpStorm.
 * User: Allan
 * Date: 11/5/2015
 * Time: 5:38 PM
 */
//------------------------------------------------------------
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_adevent_form();

//------------------------------------------------------------
function ui_show_search_adevent_form()
{
    //Create an HTML document using the ECHO statements
    ui_print_header("ADD AD/EVENT TO PROMOTION");

    echo "<div class='center'>";
    echo "<center>";
    echo "<H3>Search for event to Add to Promotion</H3>";
    echo "<H4>Enter keywords for event search. Some fields may be left blank.</H4>";
    echo "</center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_adevent.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Event Number:</SPAN></TD>';
    echo '<TD><INPUT NAME="adEventNumber" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Event Name:</SPAN></TD>';
    echo '<TD><INPUT NAME="eventName" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="eventDescription" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Begin Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="beginDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>End Date:</SPAN></TD>';
    echo '<TD><INPUT NAME="endDate" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Search Event"/></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}