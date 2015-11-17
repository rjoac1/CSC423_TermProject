<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 10/26/2015
 * Time: 1:05 PM
 */
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_promotion_form();
//------------------------------------------------------------
function ui_show_search_promotion_form()
{
    $eventNumbersSelected = $_POST['eventNumbers'];
    //Create an HTML document using the ECHO statements
    ui_print_header("ADD events TO PROMOTION");
    echo "<div class='center'>";
    echo "<center><H3>SEARCH FOR PROMOTION TO ADD ITEMS TO</H3></center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_adevent_promotions.php' method='post'>";
    foreach($eventNumbersSelected as $eventNo)
    {
        echo '<input type="hidden" name="eventNumbers[]" value="'.$eventNo.'" />';
    }
    echo "<table>";
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Code:</SPAN></TD>';
    echo '<TD><INPUT NAME="promoCode" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Name:</SPAN></TD>';
    echo '<TD><INPUT NAME="name" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="description" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';
    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Search Promotion" /></TD>';
    echo '</tr>';
    echo "</table>";
    echo "</FORM>";
    echo "</div>";
    ui_print_footer_with_main_menu_button();
}