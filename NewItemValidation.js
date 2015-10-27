
alert();
function validate()
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

}

