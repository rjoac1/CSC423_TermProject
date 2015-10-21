<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/21/2015
 * Time: 3:02 PM
 */
//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_item_form();

//------------------------------------------------------------
function ui_show_new_item_form()
{
    //Create an HTML document using the ECHO statements
    echo "<HTML>";
    echo "<HEAD>";

    echo "</HEAD>";
    echo "<BODY>";
    echo "<BR/>";
    echo "<FORM action='insert_item.php' method='post'>";
    echo "<table>";

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
    echo '<TD><SPAN ALIGN=RIGHT>Purchase Cost:</SPAN></TD>';
    echo '<TD><INPUT NAME="purchaseCost" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Full Retail Price:</SPAN></TD>';
    echo '<TD><INPUT NAME="retailPrice" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';
    echo "</table>";
    echo '<input type="reset" value="Reset" />';
    echo '<input type="submit" value="Submit New Item Data" />';

    echo "</FORM>";
    echo "</BODY>";
    echo "</HTML>";
}
