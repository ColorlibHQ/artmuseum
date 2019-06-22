(function ($) {
    'use strict';

    //  Mailchimp ajax
    $('#mc_embed_signup').find('form').ajaxChimp();

    // About widget owlCarousel
    $('.active-about-carusel').owlCarousel({
        items:1,
        loop:true,
        margin:30,
        dots: true
    });

    // Exibition widget owlCarousel
    $('.active-exibition-carusel').owlCarousel({
        items:3,
        margin:30,
        autoplay:true,
        loop:true,
        dots: true,       
            responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1,
            },
            768: {
                items: 2,
            },
            900: {
                items: 3,
            }

        }
    });

    //  Gallery
    $("#grid-container").justifiedGallery({
    rowHeight : 200,
    captions : false,
    margins : 30
    });


})(jQuery);