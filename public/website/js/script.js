
$('.main-slider').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    rtl: true,
    autoplay: false,
    pagination: true,
    autoplayTimeout: 7000,
    smartSpeed: 2200,
    dragEndSpeed: 1000,
    animate: true,
    animateOut: 'fadeOut',
    animateIn: 'slideInDown',
    navText: [
        "<i class='fa fa-angle-right'></i> ",
        "<i class='fa fa-angle-left'></i>"
    ],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});


$('.testimonials-slider').owlCarousel({
    loop: false,
    margin: 30,
    nav: false,
    rtl: true,
    autoplay: false,
    pagination: true,
    autoplayTimeout: 7000,
    smartSpeed: 2200,
    dragEndSpeed: 1000,
    animate: true,
    animateOut: 'fadeOut',
    animateIn: 'slideInDown',
    navText: [
        "<i class='fa fa-angle-right'></i> ",
        "<i class='fa fa-angle-left'></i>"
    ],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});


function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0%";
}




$(document).ready(function() {

    $('.main-header .hidden-xx i ').click(function () {
        $('.the-after').fadeIn(500);
    });


    $('.the-after').click(function () {
        $('.searching-bar').fadeOut(500),
            $('.the-after').fadeOut(500);
    });
    $('.main-header .searching').click(function () {
        $('.searching-bar').fadeToggle(500),
            $('.the-after').fadeIn(500);
    });


});
