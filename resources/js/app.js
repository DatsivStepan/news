/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

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

});

jQuery(document).ready(function($) {
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



