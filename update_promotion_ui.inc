<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/10/2015
 * Time: 11:27 AM
 */
require('ui_utilities.inc');
require('retrieve_dropdown_values_utility.inc');
//------------------------------------------------------------
// Main Control Logic: It just calls a function
//------------------------------------------------------------
function ui_show_update_promotion_form($promoCode, $name,
                                       $description, $amountOff, $promoType)
{
    $script = "<script type='text/javascript' src='NewPromotionValidation.js'> </script>";
    ui_print_header_with_head_elements("UPDATE PROMOTION", $script);

    echo "<div class='center'>";
    echo "<FORM action='update_promotion.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><INPUT NAME="promoCode" ID="promoCode" TYPE="hidden" SIZE=50 VALUE='.$promoCode.' /></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Name:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionName" NAME="promotionName" TYPE="text" SIZE=50 VALUE='.$name.' /></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Description:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionDescription" NAME="promotionDescription" TYPE="text" SIZE=50 VALUE='.$description.' /></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Amount Off:</SPAN></TD>';
    echo '<TD><INPUT ID="amountOff" NAME="amountOff" TYPE="text" SIZE=50 VALUE='.$amountOff.' /></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Type:</SPAN></TD>';
    echo '<TD><select ID="promotionType" NAME="promotionType">';

    $dropDownValues = get_promoType_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        if (strcmp($promoType,$dropDownValue[0]) == 0) {
            echo "<option value='$dropDownValue[0]' selected='selected'>$dropDownValue[0]</option>";
        } else {
            echo "<option value='$dropDownValue[0]'>$dropDownValue[0]</option>";
        }
    }

    echo '</select></TD>';
    echo '</tr>';

    echo '<tr>';
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Update Promotion Data" onclick="return validate()" /></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();

}
?>
