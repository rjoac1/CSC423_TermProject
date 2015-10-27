/**
 * Created by Maximus on 10/25/2015.
 */
function validateForm(){
    return validateEventCode() && validateName() && validateBothDates();
}

//Event Code
function validateEventCode(){
    //Need to know form ID --MW
    var eventCode = document.getElementById("eventCode");
    if(dataEnteredIntoField(eventCode)){
        alert("Data entered event code");
        return isEventCodeValid(eventCode);
    }else{
        alert("Event code is a required field.");
        return false;
    }
}

//Validates the event code string
function isEventCodeValid(eventCode){
    if(!(eventCode.match(/^[A-Z]{3}\d{8}[a-z]$/))) {
        alert("Event codes must be 3 upper case characters followed by the " +
            "numeric date and lastly as a lowercase identifier character, " +
            "such as ABC01022015a");
    }
    return eventCode.match(/^[A-Z]{3}\d{8}[a-z]$/);
}

//Validation of the event name
function validateName(){
    //Need to know form ID --MW
    var inputName = document.getElementById("eventName");
    if(dataEnteredIntoField(inputName)){
        alert("Data entered");
        //What are the requirements for an event's name? -MW
        return true;
    }else{
        alert("Must supply event Name");
    }
}


//Date Validation
function validateBothDates(){
    return validateStartDate() && validateEndDate();
}

function validateStartDate(){
    //Need to know form ID --MW
    var startDate = document.getElementById("startDate");
    if(dataEnteredIntoField(startDate) && validateDateFormat(startDate)){
        alert("data entered is valid");
    }else if(!(dataEnteredIntoField(startDate))){
        alert("Must enter a starting date for a promotion.");
    }else if(!(validateDateFormat(startDate))){
        alert("Invalid date format, please use the following format yyyy-mm-dd")
    }else{
        return true;
    }
}

function validateEndDate(){
    //Need to know form ID --MW
    var endDate = document.getElementById("endDate");
    if(dataEnteredIntoField(endDate) && validateDateFormat(endDate)){
        alert("data entered is valid");
    }else if(!(dataEnteredIntoField(endDate))){
        alert("Must enter a ending date for a promotion.");
    }else if(!(validateDateFormat(endDate))){
        alert("Invalid date format, please use the following format yyyy-mm-dd");
    }else{
        return true;
    }
}

//Generic validation functions

//Is data input
function dataEnteredIntoField(inputData){
    return (inputData == null || inputData == "");
}

//Generic Date Validation, does not care which form element is from
function validateDateFormat(dateString) {
    if (dateString.match(/^\d{4}-\d{2}-\d{2}$/)) {
        alert("Propper date format");
        return true;
    } else {
        alert("Date format must be in yyyy-mm-dd and all numeric values");
        return false;
    }
}


