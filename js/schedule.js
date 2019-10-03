// Creating a namespace so variable can be accesed globally (outside (jQuery(document)))
// let todaysSlide ;

// jQuery(document).ready(function($){

//     // Indicate todays class
//     let d       = new Date();
//     let month   = d.getMonth();
//     let day     = d.getDate();
//     let year    = d.getFullYear()

//     if (day < 10 ){
//         day = "0" + day;
//     }

//     month = month+1
//     let todaysDate = year + "-" + month + "-" + day;   
//     $("#" + todaysDate).css("border","5px solid rgb(255, 166, 0)" );

//     // Getting today slide
//     // todaysSlide = $(".swiper-slide").find("#"+todaysDate).parent().parent().attr("data-swiper-slide-index");
//     todaysSlide = 3
//     console.log(todaysSlide)
// })

    // console.log(todaysSlide)

// swiper-slide-active

// set data-swiper-slide-index

// $(".swiper-slide").find("#" + todaysDate).addClass("swiper-slide-active");