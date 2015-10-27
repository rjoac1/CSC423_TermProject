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
    //alert("Name: " + name);

    if(name.length == 0 || name == ""){
        alert("Please enter in Promotion Name");
        return false;
    }
    return true;
    //Removed this because we think other symbols are allowed. Not sure at this point if there are any other validation rules for this field. ~VL and RJ
    /*else if(name.match(/^[\w\s\$]*$/) == null) {
        alert("Incorrect Promotion Name format");
        return false;
    }
    else{
        return true;
    }*/
//pq
}//end method

function checkDescription() {

    var description = document.getElementById("promotionDescription").value;
    //alert("Description: " + description);

    if (description.length == 0 || description == "") {
        alert("Please enter in the Promotion Description.");
        return false
    }
    return true;
    //Removed for same reason as above.. ~VL and RJ
    /*
    else if (description.match(/^[\w\s\$]*$/) == null) {
        alert("Incorrect Promotion Description format");
        return false;
    }
    else {
        return true;
    }*/

}//end method

function checkAmountOff(){

    var amountOff = document.getElementById("promotionValue").value;
    //alert("Amount Off: " + amountOff);

    if(amountOff.length == 0 || amountOff == ""){
        alert("Please enter in a value for the amount off");
        return false
    }
    //Changed regular expression here to require number to be 0.00 form.
    //The Project description stated otherwise but the database had values in the 0.00 form.
    //Asked mitra about this and he said it was our choice. Since we need a common form for the calculations later on, Van and I decided to go with this form. ~RJ and VL
    else if(amountOff.match(/^[\d]+\.[\d]{2}$/) == null) {
        alert("Amount off for promotion must be a number rounded to two decimal places. (i.e. 0.00)");
        return false;
    }
    return true;


}//end method
