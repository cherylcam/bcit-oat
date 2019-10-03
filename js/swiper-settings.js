let todaysSlide ;
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
    $("#" + todaysDate).css("border","5px solid rgb(255, 166, 0)" );

    // Getting today slide
    let todaysSlide = $(".swiper-slide").find("#"+todaysDate).parent().parent().attr("slide_index");
    mySwiper.slideToLoop(todaysSlide, 800,false);
})

let mySwiper = new Swiper ('.swiper-container', 
{
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    initialSlide: 0,
    
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    
  })

  // mySwiper.slideTo(4)

