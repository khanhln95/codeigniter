//slideshow for clothing
$(document).ready(function() {
  $('.owl-clothing').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    responsive: {
      0: {
        items: 1,
      },
      400: {
        items: 2,
      },
      1200: {
        items: 2,
      }
    }
  })
})
//slideshow for shoe
$(document).ready(function() {
  $('.owl-shoe').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      400: {
        items: 2
      },
    }
  })
})
//slideshow for bag
$(document).ready(function() {
  $('.owl-bag').owlCarousel({
    loop: true,
    margin: 10,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      1000: {
        items: 1,
        nav: true
      }
    }
  })
})
//slideshow for bestSeller
$(document).ready(function() {
  $('.owl-bestSeller').owlCarousel({
    loop: true,
    margin: 10,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      400: {
        items: 2,
        nav: true
      },
      600: {
        items: 3,
        nav: true
      },
      992: {
        items: 4,
        nav: true
      },
      1200: {
        items: 5,
        nav: true
      }
    }
  })
})

//slideshow for blog
$(document).ready(function() {
  $('.owl-blog').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      400: {
        items: 1
      },
      600: {
        items: 2
      },
      992: {
        items: 3
      },
      1000: {
        items: 3
      }
    }
  })
})
//slideshow for advertise
$(document).ready(function() {
  $('.owl-adv').owlCarousel({
    loop: true,
    margin: 50,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      400: {
        items: 2
      },
      600: {
        items: 3
      },
      992: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  })
})

//button back to top
window.onscroll = function() {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("btnBackToTop").style.display = "block";
  } else {
    document.getElementById("btnBackToTop").style.display = "none";
  }
}

function topFunction() { // When the user clicks on the button, scroll to the top of the document
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
//------------------------------------------------
//fixed navbar
$(window).scroll(function() {
  var sticky = $('#head-nav'),
    scroll = $(window).scrollTop();
  if (screen.width>=992 && scroll >= 120) sticky.addClass('fixed');
  else if (screen.width>=471 && screen.width<992 && scroll >=262) sticky.addClass('fixed');
  else if (screen.width<471 && scroll >=300) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
