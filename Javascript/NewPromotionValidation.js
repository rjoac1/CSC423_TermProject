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

    if(name.length == 0 || name == "" || name.length > 50){
        alert("Please enter in Promotion Name. Name must be less than 50 characters in length.");
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

    if (description.length == 0 || description == "" || description.length > 50) {
        alert("Please enter in the Promotion Description. Description must be less than 50 characters in length.");
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

    var amountOff = document.getElementById("amountOff").value;
    var promoType = document.getElementById("promotionType").value;
    //alert("Amount Off: " + amountOff);

    if(amountOff.length == 0 || amountOff == ""){
        alert("Please enter in a value for the amount off");
        return false
    }
    else if((promoType == "Dollar") && (amountOff.match(/^[\d]+$/)!= null))
    {
        document.getElementById("amountOff").value = amountOff + ".00";
        return true;
    }//begin fixing here
    else if((promoType == "Percent") && (amountOff.match(/^[\d]+$/)!= null))
    {
        if((amountOff>100) || (amountOff<0))
        {
            alert("Percent amount off must be between 0 and 100");
            return false;
        }
        document.getElementById("amountOff").value = amountOff/100;
        return true;
    }
    else if(amountOff.match(/^[\d]+\.[\d][\d]?$/) == null) {
        alert("Amount off for promotion must be a numberical value. If using a decimal, value must be rounded to two" +
            " decimal" +
            " places. (i.e. 0.00)");
        return false;
    }
    return true;


}//end method
