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
ui_show_new_item_form();
//------------------------------------------------------------
function ui_show_new_item_form()
{
    $script = "<script type='text/javascript' src='Javascript/NewItemValidation.js'> </script>";
    ui_print_header_with_head_elements("ADD NEW ITEM", $script);

    echo "<div class='center'>";
    echo "<FORM action='insert_item.php' method='post'>";
    echo "<table>";

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Item Number:</SPAN></TD>';
    echo '<TD><INPUT NAME="itemNumber" ID="itemNumber" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Item Description:</SPAN></TD>';
    echo '<TD><INPUT NAME="itemDescription" ID="itemDescription" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<input type="hidden" id="category" name="category" />';
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Category:</SPAN></TD>';
    echo '<TD><select ID="category_ddl" NAME="category_ddl" onchange="CategoryDropdownChanged();">';
    $dropDownValues = get_item_category_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        echo "<option value='$dropDownValue[0]'>$dropDownValue[0]</option>";
    }
    echo "<option value=''>Other..</option>";
    echo '</select><input type="text" id="other_category" name="other_category" value="Enter new category here"
    style="display: none;"
    /></TD>';
    echo '</tr>';

    echo '<input type="hidden" id="departmentName" name="departmentName" />';
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Department Name:</SPAN></TD>';
    echo '<TD><select ID="departmentName_ddl" onchange="DepartmentDropdownChanged();">';
    $dropDownValues = get_item_department_name_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        echo "<option value='$dropDownValue[0]'>$dropDownValue[0]</option>";
    }
    echo "<option value=''>Other..</option>";
    echo '</select><input type="text" id="other_department" name="other_department" value="Enter new Department Name here"
    style="display:
none;" />
    </TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Purchase Cost:</SPAN></TD>';
    echo '<TD><INPUT NAME="purchaseCost" ID="purchaseCost" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Full Retail Price:</SPAN></TD>';
    echo '<TD><INPUT NAME="retailPrice" ID="retailPrice" TYPE="text" SIZE=50/></TD>';
    echo '</tr>';

    echo '<tr>';  //
    echo '<TD align="right"><input type="reset" value="Reset" /></TD>';
    echo '<TD align="right"><input type="submit" value="Submit New Item Data" onclick="return setHiddenValues();"
    /></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();

}
