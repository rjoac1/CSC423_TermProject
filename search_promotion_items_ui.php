<?php
/**
 * Created by PhpStorm.
 * User: Van
 * Date: 11/30/2015
 * Time: 1:20 PM
 */

require('ui_utilities.inc');
require('retrieve_dropdown_values_utility.inc');
// Main Control Logic: It just calls a function
ui_show_search_promotion_form();

//------------------------------------------------------------
function ui_show_search_promotion_form()
{
    //Create an HTML document using the ECHO statements
    ui_print_header("VIEW PROMOTIONS AND ITEMS");

    echo "<div class='center'>";
    echo "<center>";
    echo "<H3>Search for Promotion's and associated Items</H3>";
    echo "<H4>Enter keywords for Promotion search.  Fields may be left blank.</H4>";
    echo "</center>";
    echo "<BR/>";
    echo "<FORM action='retrieve_promotions_items.php' method='post'>";
    echo "<table>";
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Amount Off:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionValue" NAME="promotionValue" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Type:</SPAN></TD>';
    echo '<TD><select ID="promotionType" NAME="promotionType">';

    $n = 0;
    $dropDownValues = get_promoType_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        echo "<option value='$dropDownValue[$n]'>$dropDownValue[$n]</option>";
    }
    $x = '';
    $n++;
    echo "<option value='$dropDownValue[$n]'>$x</option>";

    echo '</select></TD>';
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
