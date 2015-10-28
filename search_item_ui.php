<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/23/2015
 * Time: 12:02 PM
 */
//------------------------------------------------------------
require('ui_utilities.inc');
// Main Control Logic: It just calls a function
ui_show_search_item_form();

//------------------------------------------------------------
function ui_show_search_item_form()
{
    //Create an HTML document using the ECHO statements
    ui_print_header("ADD ITEM TO PROMOTION");
    echo "<H3>Search for Item to Add to Promotion</H3>";
    echo "<H4>Enter keywords for item search. Some fields may be left blank.</H4>";
    echo "<BR/>";
    echo "<FORM action='retrieve_items.php' method='post'>";
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

    echo "</table>";
    echo '<input type="reset" value="Reset" />';
    echo '<input type="submit" value="Search Items"/>';

    echo "</FORM>";
    ui_print_footer_with_main_menu_button();
}