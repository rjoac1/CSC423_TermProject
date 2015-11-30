<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/24/2015
 * Time: 3:31 PM
 */
//------------------------------------------------------------
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_item_form();

//------------------------------------------------------------
function ui_show_search_item_form()
{
    //Create an HTML document using the ECHO statements
    ui_print_header("FIND BIGGEST SAVINGS FOR AN ITEM");

    echo "<div class='center'>";
    echo "<center>";
    echo "<H3>Search for Item to find the biggest savings for.</H3>";
    echo "<H4>Enter keywords for item search. Some fields may be left blank.</H4>";
    echo "</center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_items_to_find_savings.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Item Number:</SPAN></TD>';
    echo '<TD><INPUT NAME="itemNumber" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Item Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="itemDescription" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Category:</SPAN></TD>';
    echo '<TD><INPUT NAME="category" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Department Name:</SPAN></TD>';
    echo '<TD><INPUT NAME="departmentName" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Search Items"/></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}