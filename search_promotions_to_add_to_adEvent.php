<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/17/2015
 * Time: 5:06 PM
 */
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_promotion_form();

//------------------------------------------------------------
function ui_show_search_promotion_form()
{
    //Create an HTML document using the ECHO statements
    ui_print_header("ADD PROMOTIONS TO EVENT");

    echo "<div class='center'>";
    echo "<center>";
    echo "<H3>Search for Promotions to Add to Event</H3>";
    echo "<H4>Enter keywords for promotion search. Some fields may be left blank.</H4>";
    echo "</center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_promotions_to_add_to_event.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>PromoCode:</SPAN></TD>';
    echo '<TD><INPUT NAME="promoCode" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Name:</SPAN></TD>';
    echo '<TD><INPUT NAME="name" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="description" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Search Promotions"/></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}