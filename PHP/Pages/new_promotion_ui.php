<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/21/2015
 * Time: 3:02 PM
 */
require('ui_utilities.inc');
require('retrieve_dropdown_values_utility.inc');
//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_promotion_form();
//------------------------------------------------------------
function ui_show_new_promotion_form()
{
    //Create an HTML document using the ECHO statements

    $script = "<script type='text/javascript' src='../../Javascript/NewPromotionValidation.js'>  </script>";
    ui_print_header_with_head_elements("ADD NEW PROMOTION", $script);

    echo "<div class='center'>";
    echo "<FORM action='../Elements/insert_promotion.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Name:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionName" NAME="promotionName" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Description:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionDescription" NAME="promotionDescription" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Amount Off:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionValue" NAME="promotionValue" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Type:</SPAN></TD>';
    echo '<TD><select ID="promotionType" NAME="promotionType">';

    $dropDownValues = get_promoType_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        echo "<option value='$dropDownValue[0]'>$dropDownValue[0]</option>";
    }

    echo '</select></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Submit New Promotion Data" onclick="return validate()" /></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();
}
