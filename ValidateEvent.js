/**
 * Created by Maximus on 10/25/2015.
 */
$(document).ready(function() {
// Datepicker Popups calender to Choose date.
    $(function() {
        $("#startDate, #endDate").datepicker({
            dateFormat: "yy-mm-dd",
            changeYear: true
        });
        $("#startDate, #endDate").keypress(function(event) {event.preventDefault();});
    });
});


function validateForm(){
    //alert("works");
    return validateEventCode() && validateName() && validateBothDates();
}

//Event Code
function validateEventCode(){
    //alert("Event Code validation");
    var eventCode = document.getElementById("eventCode").value;
    //alert("Value eventcode = " + eventCode);
    if(dataEnteredIntoField(eventCode)){
        //alert("Data entered event code");
        return isEventCodeValid(eventCode);
    }else{
        alert("Event code is a required field.");
        return false;
    }
}

//Validates the event code string
function isEventCodeValid(eventCode){
    if(!(eventCode.match(/^[A-Z]{3}\d{8}[A-Z]$/))) {
        alert("Event codes must be 3 upper case characters followed by the " +
            "numeric date and lastly an uppercase identifier character, " +
            "such as ABC01022015A");
        return false;
    }else if(eventCode.match(/^[A-Z]{3}\d{8}[A-Z]$/)){ return true; }
}

//Javascript of the event name
function validateName(){
    //Need to know form ID --MW
    var inputName = document.getElementById("eventName").value;
    if(dataEnteredIntoField(inputName)){
        //alert("Data entered");
        //What are the requirements for an event's name? -MW
        return true;
    }else{
        alert("Must supply event Name");
        return false;
    }
}

//Date Javascript
function validateBothDates(){
    return validateStartDate() && validateEndDate();
}

function validateStartDate(){
    //Need to know form ID --MW
    var startDate = document.getElementById("startDate").value;
    if(dataEnteredIntoField(startDate) && validateDateFormat(startDate) ){
        //alert("data entered is valid");
        return true;
    }else if(!(dataEnteredIntoField(startDate))){
        alert("Must enter a starting date for a promotion.");
        return false;
    }else if(!(validateDateFormat(startDate))){
        alert("Invalid date format for start date, please use the following format yyyy-mm-dd");
        return false;
    }
}

function validateEndDate(){
    //Need to know form ID --MW
    var endDate = document.getElementById("endDate").value;
    if(dataEnteredIntoField(endDate) && validateDateFormat(endDate) && validateStartDateBeforeEndDate() ){
        return true;
    }else if(!(dataEnteredIntoField(endDate))){
        alert("Must enter a ending date for a promotion.");
        return false;
    }else if(!(validateDateFormat(endDate))){
        alert("Invalid date format for end date, please use the following format yyyy-mm-dd");
        return false;
    }else if(!(validateStartDateBeforeEndDate())){
        alert("End date must not be before the start date for an event.");
        return false;
    }
}


//Generic validation functions

//Is there data in a field, if input is not null or empty
function dataEnteredIntoField(inputData){
    return (!(inputData == null || inputData == ""));
}

//Generic Date Javascript, does not care which form element is from
function validateDateFormat(dateString) {
    if (dateString.match(/^\d{4}-\d{1,2}-\d{1,2}$/)) {
        //alert("Propper date format");
        return true;
    } else {
        return false;
    }
}

function validateStartDateBeforeEndDate() {
    var startDate = document.getElementById("startDate").value;
    startDate = startDate.replace(/\D/g,'');
    var endDate = document.getElementById("endDate").value;
    endDate = endDate.replace(/\D/g,'');
    //alert("start = " + startDate + "  :  end = " + endDate);

    if(parseInt(endDate) >= parseInt(startDate)){
        //alert("Start date before end date");
        return true;
    }else{ return false; }


}/*

function validateDateInRange(dateString){
    var dateArray = dateString.split("-");
    //validation of year requirements?

    //31 Day Months
    if (memberOfArray([1, 3, 5, 7, 8, 10, 12], parseInt(dateArray[1]))){
        return validateDateDay(dateArray[2], 31);
    }
    //30 Day Months
    else if (memberOfArray([4, 6, 9, 11], dateArray[1])){
        return validateDateDay(dateArray[2], 30);
    }
    //February
    else if (dateArray[1] == 2){
        return validateDateDay(dateArray[2], 29);

    }
}

function validateDateDay(day, upperBound){
    if(parseInt(day) < 0 || parseInt(day) > upperBound){
        alert("Day can only range from 1-" + upperBound + " for selected month");
        return false;
    }else if(parseInt(day) > 0 || parseInt(day) <= upperBound){
        return true;
    }else{
        alert("Wrong case");
        return false;
    }
}

function memberOfArray(arr, obj) {
    //alert("Range: " +  arr + "  object: " + obj);
    //alert("index at " + arr.indexOf(obj));
    return (arr.indexOf(obj) != -1);
}



/**/