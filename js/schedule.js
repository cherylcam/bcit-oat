jQuery(document).ready(function($){

    // Indicate todays class
    let d       = new Date();
    let month   = d.getMonth();
    let day     = d.getDate();
    let year    = d.getFullYear()

    if (day < 10 ){
        day = "0" + day;
    }

    month = month+1
    let todaysDate = year + "-" + month + "-" + day;   
    $("#" + todaysDate).css("border","3px solid rgb(255, 166, 0)" );

})