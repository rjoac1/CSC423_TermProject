<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/21/2015
 * Time: 3:02 PM
 */
//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_promotion_form();
//------------------------------------------------------------
function ui_show_new_promotion_form()
{
    //Create an HTML document using the ECHO statements
    echo "<HTML>";
    echo "<HEAD>";
    echo "<script type='text/javascript' src='NewPromotionValidation.js'>  </script>";
    echo "</HEAD>";
    echo "<BODY>";
    echo "<BR/>";
    echo "<FORM action='insert_promotion.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Name:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionName" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Description:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionDescription" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Amount Off:</SPAN></TD>';
    echo '<TD><INPUT ID="promotionValue" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Promotion Type:</SPAN></TD>';
    echo '<TD><select INPUT ID="promotionType">
              <option value="Dollar">Dollar</option>
              <option value="Percent">Percent</option>
              </select>
          </TD>';
    echo '</tr>';

    echo "</table>";
    echo '<input type="reset" value="Reset" />';
    echo '<input type="submit" value="Submit New Item Data" onclick="return validate()" />';

    echo "</FORM>";
    echo "</BODY>";
    echo "</HTML>";
}
