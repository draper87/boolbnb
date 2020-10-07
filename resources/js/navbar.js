// Change style navbar on scroll
$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
     $('.counter').html(scrollTop);

    if (scrollTop >= 80) {
      $('#navigator_my').addClass('scrolled-nav');
    } else if (scrollTop < 80) {
      $('#navigator_my').removeClass('scrolled-nav');
    }

  });

});

// Change style navbar on scroll
$(document).ready(function(){
  var scrollHead = 0;
  $(window).scroll(function(){
    scrollHead = $(window).scrollTop();
    $('.counter').html(scrollHead);

    if (scrollHead >= 50) {
      $('#special_my_navigator').addClass('jumbo_scroll');
    } else if (scrollHead < 50) {
      $('#special_my_navigator').removeClass('jumbo_scroll');
    }

  });

});




// Scroll back to the top function
var mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};


function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
$("#myBtn").on('click',function(){
  topFunction();
});

function topFunction(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
