
//alert();
function validateItemData()
{
        //setHiddenValues();
        //alert();
        return checkItemNumber() && checkItemDescription() && checkCategory() && checkDepartmentName() && checkPurchaseCost() && checkRetailPrice();
//        checkItemNumber();

//        checkItemDescription();

//        checkCategory();

//        checkDepartmentName();

//        checkPurchaseCost();

//        checkRetailPrice();

}

function CategoryDropdownChanged()
{
        var categoryDDL = document.getElementById("category_ddl");
        var oTextBox = document.getElementById("other_category");
        if(oTextBox){
                oTextBox.style.display = (categoryDDL.value == "") ? "" : "none";
                if(categoryDDL.value == "")
                {
                        oTextBox.focus();
                }
        }
}
function DepartmentDropdownChanged()
{
        var oDDL = document.getElementById("departmentName_ddl")
        var oTextBox = document.getElementById("other_department");
        if(oTextBox){
                oTextBox.style.display = (oDDL.value == "") ? "" : "none";
                if(oDDL.value == "")
                {
                        oTextBox.focus();
                }
        }
}
function setHiddenValues()
{
        var oCategoryHidden = document.getElementById("category");
        var oCategoryDDL = document.getElementById("category_ddl");
        var oCategoryTextBox = document.getElementById("other_category");
        if(oCategoryHidden && oCategoryDDL && oCategoryTextBox)
        {
                oCategoryHidden.value = (oCategoryDDL.value == '') ? oCategoryTextBox.value : oCategoryDDL.value;
        }

        var oDepartmentHidden = document.getElementById("departmentName");
        var oDepartmentDDL = document.getElementById("departmentName_ddl");
        var oDepartmentTextBox = document.getElementById("other_department");
        if(oDepartmentHidden && oDepartmentDDL && oDepartmentTextBox)
        {
                oDepartmentHidden.value = (oDepartmentDDL.value == '') ? oDepartmentTextBox.value : oDepartmentDDL.value;
        }
        return validateItemData();
}

function checkItemNumber()
{
        var itemNo = document.getElementById("itemNumber");
        var enteredItemNumber = itemNo.value;
        //alert(enteredItemNumber);
        if(enteredItemNumber.length == 0 || enteredItemNumber == "" || enteredItemNumber.length > 7)
        {
                alert("Please enter an Item Number up to 7 digits.");
                return false;
        }
        else if (enteredItemNumber.match(/^[0-9]{1,7}$/) == null)
        {
                alert("Item Number must be a numerical value up to 7 digits.");
                return false;
        }
        return true;
}
function checkItemDescription()
{
        var itemDescript = document.getElementById("itemDescription");
        var enteredItemDescription = itemDescript.value;
        if(enteredItemDescription.length == 0 || enteredItemDescription == "")
        {
                alert("Please enter an Item Description.");
                return false;
        }
        else if (enteredItemDescription.length > 50) {
                alert("Item Description must not exceed 50 characters.");
                return false;
        }
        return true;
}
function checkCategory()
{

        var category = document.getElementById("category");
        var enteredCategory = category.value;
        if(enteredCategory.length == 0 || enteredCategory == "")
        {
                alert("Please enter a Category for the Item.");
                return false;
        }
        else if (enteredCategory.length > 30)
        {
                alert("Item Category must not exceed 30 characters.");
                return false;
        }
        return true;
}
function checkDepartmentName()
{

        var departName = document.getElementById("departmentName");
        var enteredDepartmentName = departName.value;
        if(enteredDepartmentName.length == 0 || enteredDepartmentName == "")
        {
                alert("Please enter a Department Name for the Item.");
                return false;
        }
        else if (enteredDepartmentName.length > 20)
        {
                alert("Department Name must not exceed 20 characters.");
                return false;
        }
        return true;

}
function checkPurchaseCost()
{
        //alert();
        var purchCost = document.getElementById("purchaseCost");
        var enteredPurchaseCost = purchCost.value;
        //alert(enteredPurchaseCost);
        if(enteredPurchaseCost.length == 0 || enteredPurchaseCost == "")
        {
                alert("Please enter a Purchase Cost for the Item.");
                return false;
        }
        else if(enteredPurchaseCost.match(/^[\d]+\.[\d]{2}$/) == null) {
                alert("Purchase Cost for Item must be a number rounded to two decimal places. (i.e. 0.00)");
                return false;
        }
        return true;
}
function checkRetailPrice()
{
        var retPrice = document.getElementById("retailPrice");
        var enteredRetailPrice = retPrice.value;
        //alert(enteredRetailPrice);
        if(enteredRetailPrice.length == 0 || enteredRetailPrice == "")
        {
                alert("Please enter a Retail Price for the Item.");
                return false;
        }
        else if(enteredRetailPrice.match(/^[\d]+\.[\d]{2}$/) == null) {
                alert("Retail Price for Item must be a number rounded to two decimal places. (i.e. 0.00)");
                return false;
        }
        return true;
}
