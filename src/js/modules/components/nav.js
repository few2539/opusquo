
$(window).on('scroll', function () {
    if ($(window).scrollTop() > 1) {
        console.log('addclass');
        
        $('.navbar').addClass('black');
        $('.menu.lang').addClass('blacktextscroll');
    }
    
    else {
      
        console.log('removeClass');
        $('.navbar').removeClass('black');
        $('.menu.lang').removeClass('blacktextscroll');
    }
    // console.log($(window).scrollTop());
})

// $(window).on('scroll', function () {
//     if ($(window).scrollTop() > 150) {
//         console.log('addclass');
        
//         $('.menu lang').addClass('blacktextscroll');
//     } else {
//         console.log('removeClass');
//         $('.menu lang').removeClass('blacktextscroll');
//     }
//     // console.log($(window).scrollTop());
// })







$(this).ready(function(){
    $('.toggle').click(function(){
    //    $('.menubar').toggleClass('active') 
       console.log('1');     
       if($('.menubar').is(":visible")){
        // hide
        $('.menubar').delay(300).hide(0);
        $('.menubar').removeClass('active');
       }else{
        // show
            $('.menubar').show(0, function(){
                $('.menubar').addClass('active');
            });
       }
    })
})

//language btn
$(this).ready(function(){
    $('.menu.lang').click(function(){
       $('.dropdown-content').toggleClass('show') 
       console.log('1');       
    })
})

$(document).ready(function(){
    $(".menu").on('click',function(){
      $(this).find(".hambergerIcon").toggleClass("open");
    });
  })

