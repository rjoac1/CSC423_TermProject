
//alert();
function validateItemData()
{
        return checkItemNumber() && checkItemDescription() && checkCategory() && checkDepartmentName() && checkPurchaseCost() && checkRetailPrice();
//        checkItemNumber();

//        checkItemDescription();

//        checkCategory();

//        checkDepartmentName();

//        checkPurchaseCost();

//        checkRetailPrice();

}

function checkItemNumber()
{
        var itemNo = document.getElementById("itemNumber");
        var enteredItemNumber = itemNo.value;
        //alert(enteredItemNumber);
        if(enteredItemNumber.length == 0 || enteredItemNumber == "")
        {
                alert("Please enter an Item Number up to 7 digits.");
                return false;
        }
        else if (enteredItemNumber.match(/^[0-9]{1,7}$/) == null)
        {
                alert("Item Number must be a numerical value.");
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
/* Previous version
function checkItemNumber()
{

        var itemNo = document.getElementById("itemNumber");
        var enteredItemNumber = itemNo.value;
        if (/[0-9]{6,7}/.test(enteredItemNumber))
        {
                return true;
                //alert('good Item Number');
        }

        else
        {
                alert('You entered a wrong Item Number');
                return false;
        }

}
function checkItemDescription()
{

        var itemDescript = document.getElementById("itemDescription");
        var enteredItemDescription = itemDescript.value;
        if (/^.{1,50}/.test(enteredItemDescription))
        {
                return true;
                //alert('good Item Description');
        }

        else
        {
                alert('You entered a wrong Item Description');
                return false;
        }

}
function checkCategory()
{

        var category = document.getElementById("category");
        var enteredCategory = category.value;
        if (/^.{1,30}/.test(enteredCategory))
        {
                return true;
                //alert('good Category');
        }

        else
        {
                alert('You entered a wrong Category');
                return false;
        }

}
function checkDepartmentName()
{

        var departName = document.getElementById("departmentName");
        var enteredDepartmentName = departName.value;
        if (/^.{1,20}/.test(enteredDepartmentName))
        {
                return true;
                //alert('good Department Name');
        }

        else
        {
                alert('You entered an invalid department name');
                return false;
        }

}
function checkPurchaseCost()
{

        var purchCost = document.getElementById("purchaseCost");
        var enteredPurchaseCost = purchCost.value;
        if (/^[1-9]{1,7}\.[0-9]{2}$|^[0]\.[0-9]{2}$/.test(enteredPurchaseCost))
        {
                return true;
                //alert('good Purchase Cost');
        }

        else
        {
                alert('You entered an invalid Purchase Cost');
                return false;
        }

}
function checkRetailPrice()
{

        var retPrice = document.getElementById("retailPrice");
        var enteredRetailPrice = retPrice.value;
        if (/^[1-9]{1,7}\.[0-9]{2}$|^[0]\.[0-9]{2}$/.test(enteredRetailPrice))
        {
                return true;
                //alert('good Retail Price');
        }

        else
        {
                alert('You entered an invalid Retail Price');
                return false;
        }

}*/