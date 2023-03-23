function bike_rental_shop_openNav() {
  jQuery(".sidenav").addClass('show');
}
function bike_rental_shop_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function bike_rental_shop_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const bike_rental_shop_nav = document.querySelector( '.sidenav' );

      if ( ! bike_rental_shop_nav || ! bike_rental_shop_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...bike_rental_shop_nav.querySelectorAll( 'input, a, button' )],
        bike_rental_shop_lastEl = elements[ elements.length - 1 ],
        bike_rental_shop_firstEl = elements[0],
        bike_rental_shop_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && bike_rental_shop_lastEl === bike_rental_shop_activeEl ) {
        e.preventDefault();
        bike_rental_shop_firstEl.focus();
      }

      if ( shiftKey && tabKey && bike_rental_shop_firstEl === bike_rental_shop_activeEl ) {
        e.preventDefault();
        bike_rental_shop_lastEl.focus();
      }
    } );
  }
  bike_rental_shop_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#scroll-button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      // autoHeight: true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

jQuery(document).ready(function() {
  var owl = jQuery('#slider-product .owl-carousel');
    owl.owlCarousel({
      margin: 15,
      nav: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      // autoHeight: true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 2
        },
        600: {
          items: 3
        },
        1024: {
          items: 3
      }
    }
  })
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});