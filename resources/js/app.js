/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){

    $(function() {
        $(".home-big-news").each(function() {
            imgWidth = $(this).width() + 20;
            $(this).css("height", imgWidth / 2);
        });
    });

    $(function() {
        $(".home-news-container").each(function() {
            imgWidth = $(this).width();
            $(this).css("height", imgWidth / 2);
        });
    });

    $(function() {
        $(".card-img-top").each(function() {
            imgWidth = $(this).width();
            $(this).css("height", imgWidth / 2);
        });
    });


    $( window ).on( "resize", function() {
        $(function() {
            $(".card-img-top").each(function() {
                imgWidth = $(this).width();
                $(this).css("height", imgWidth / 2);
            });
        });

        $(function() {
            $(".home-big-news").each(function() {
                imgWidth = $(this).width() + 20;
                $(this).css("height", imgWidth / 2);
            });
        });

        $(function() {
            $(".home-news-container").each(function() {
                imgWidth = $(this).width();
                $(this).css("height", imgWidth / 2);
            });
        });
    } );

    $('.icon-menu').click(function () {
        if ($(window).width() < 1000) {
            $(this).toggleClass('active');
        }

        $('.navigation, .header__logo').toggleClass('active');

    });
    $('.js-search-toggle').click(function () {
        $('.search').toggleClass('active');
        if ($('.search').hasClass('active')) {
            setTimeout(function () {
                $('.search-form__input').focus();
            }, 50);
        }
    });
    $(document).click(function (event) {
        if ($(event.target).closest(".search").length) return;
        $('.search').removeClass('active');
        event.stopPropagation();
    });
    $(document).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.header').addClass('active');
        } else {
            $('.header').removeClass('active');
        }
    });


    if ($('.navigation__menu').length > 0) {
        $('.navigation__menu .menu-item-has-children').append('<span class="show-sub-menu"></span>');
    }
    $('.show-sub-menu').click(function (e) {
        e.preventDefault();
        $(this).prev().slideToggle(200);
        $(this).toggleClass('active');
    });

    //STICKY ASIDE
    if ($('#main').outerHeight() > $('#aside').outerHeight()) {
        $('#aside').stick_in_parent({
            inner_scrolling: true,
            offset_top: 155,
            spacer: false,
        });
    }



});



