<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 1:05 PM
 */
// Main Control Logic: It just calls a function
ui_show_search_promotion_form();

//------------------------------------------------------------
function ui_show_search_promotion_form()
{
    $itemNumberSelected = $_REQUEST['itemNumber'];

    //Create an HTML document using the ECHO statements
    echo "<HTML>";
    echo "<HEAD>";

    echo "</HEAD>";
    echo "<BODY>";
    echo "<H1>SEARCH FOR PROMOTION TO ADD ITEM TO</H1>";
    echo "<BR/>";
    echo "<FORM action='retrieve_promotions.php' method='post'>";
    echo '<input type="hidden" name="itemNumber" value="'.$itemNumberSelected.'" />';
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


    echo "</table>";
    echo '<input type="reset" value="Reset" />';
    echo '<input type="submit" value="Search Promotion" />';

    echo "</FORM>";
    echo "</BODY>";
    echo "</HTML>";
}