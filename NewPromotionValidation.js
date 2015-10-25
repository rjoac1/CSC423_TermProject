/**
 * Created by Allan on 10/25/2015.
 */
/**
 * Created by Van on 10/25/2015.
 */

function validate(){
    //checkName() && checkDescription() && checkAmountOff()
    return checkName() && checkDescription() && checkAmountOff();
}//end method

function checkName(){

    var name = document.getElementById("promotionName").value;

    if(name.length == 0){
        alert("Please enter in Promotion Name");
        return false;
    }
    else if(name.match(/^[\w\s\$]*$/) == null) {
        alert("Incorrect Promotion Name format");
        return false;
    }
    else{
        alert("Test success");
        return true;
    }

}//end method

function checkDescription() {

    var description = document.getElementById("promotionDescription").value;

    if (description.length == 0) {
        alert("Please enter in Promotion Name");
        return false
    }
    else if (description.match(/^[\w\s\$]*$/) == null) {
        alert("Incorrect Promotion Description format");
        return false;
    }
    else {
        alert("Test success");
        return true;
    }

}//end method

function checkAmountOff(){

    var amountOff = document.getElementById("promotionValue").value;

    if(amountOff.length == 0){
        alert("Please enter in Promotion Name");
        return false
    }
    else if(amountOff.match(/^[\d]*$/) == null) {
        alert("Incorrect promotion amount off format");
        return false;
    }
    else{
        alert("Test success");
        return true;
    }

}//end method
