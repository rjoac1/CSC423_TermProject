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
    $script = "<script type='text/javascript' src='../../Javascript/NewItemValidation.js'> </script>";
    ui_print_header_with_head_elements("ADD NEW ITEM", $script);

    echo <<<END
    <script type='text/javascript'>
    function CategoryDropdownChanged(oDDL)
    {
            var oTextBox = oDDL.form.elements["other_category"];
            if(oTextBox){
                    oTextBox.style.display = (oDDL.value == "") ? "" : "none";
                    if(oDDL.value == "")
                    {
                            oTextBox.focus();
                    }
            }
    }
    function DepartmentDropdownChanged(oDDL)
    {
            var oTextBox = oDDL.form.elements["other_department"];
            if(oTextBox){
                    oTextBox.style.display = (oDDL.value == "") ? "" : "none";
                    if(oDDL.value == "")
                    {
                            oTextBox.focus();
                    }
            }
    }
    function setHiddenValues(oButton)
    {
            var oCategoryHidden = oButton.form.elements["category"];
            var oCategoryDDL = oButton.form.elements["category_ddl"];
            var oCategoryTextBox = oButton.form.elements["other_category"];
            if(oCategoryHidden && oCategoryDDL && oCategoryTextBox)
            {
                    oCategoryHidden.value = (oCategoryDDL.value == '') ? oCategoryTextBox.value : oCategoryDDL.value;
            }

            var oDepartmentHidden = oButton.form.elements["departmentName"];
            var oDepartmentDDL = oButton.form.elements["departmentName_ddl"];
            var oDepartmentTextBox = oButton.form.elements["other_department"];
            if(oDepartmentHidden && oDepartmentDDL && oDepartmentTextBox)
            {
                    oDepartmentHidden.value = (oDepartmentDDL.value == '') ? oDepartmentTextBox.value : oDepartmentDDL.value;
            }
            return validateItemData();
    }
    </script>
END;


    echo "<div class='center'>";
    echo "<FORM action='../Elements/insert_item.php' method='post'>";
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
    echo '<TD><select ID="category_ddl" NAME="category_ddl" onchange="CategoryDropdownChanged(this);">';
    $dropDownValues = get_item_category_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        echo "<option value='$dropDownValue[0]'>$dropDownValue[0]</option>";
    }
    echo "<option value=''>Other..</option>";
    echo '</select><input type="text" name="other_category" value="Enter new category here" style="display: none;"
    /></TD>';
    echo '</tr>';

    echo '<input type="hidden" id="departmentName" name="departmentName" />';
    echo '<tr>';  //
    echo '<TD><SPAN ALIGN=RIGHT>Department Name:</SPAN></TD>';
    echo '<TD><select ID="departmentName_ddl" onchange="DepartmentDropdownChanged(this);">';
    $dropDownValues = get_item_department_name_dropdown_values();
    while($dropDownValue = mysql_fetch_array($dropDownValues)){
        echo "<option value='$dropDownValue[0]'>$dropDownValue[0]</option>";
    }
    echo "<option value=''>Other..</option>";
    echo '</select><input type="text" name="other_department" value="Enter new Department Name here" style="display: none;" />
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
    echo '<TD align="right"><input type="submit" value="Submit New Item Data" onclick="return setHiddenValues(this);"
    /></TD>';
    echo '</tr>';

    echo "</table>";
    echo "</FORM>";
    echo "</div>";

    ui_print_footer_with_main_menu_button();

}
