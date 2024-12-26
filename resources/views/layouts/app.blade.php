<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/0ff4885dcd.js" crossorigin="anonymous"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="f0keE2RFQFMrpYgtuv84yqvMN8JOHswSe5tl9bsvetU"/>

        <title>
            @yield('pageTitle', 'Новини НТА | NTA - онлайн новини за сьогодні в Україні, світу')
        </title>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="/favicon.ico">
        <link rel="stylesheet" href="{{ asset("/css/app.css") }}">

        @yield('meta_tags')
        <style>
            .social-header {
                padding-top: 15px;
            }
            .social-header a .social-icon {
                fill: #56564f;
                align-items: center;
                border: 1px solid #56564f;
                border-radius: 50%;
                color: #56564f;
                display: flex;
                justify-content: center;
                margin-bottom: 5px;
                margin-right: 5px;
                height: 30px;
                width: 30px;
                font-size: 18px;
            }
            @media (max-width:640px){
                .social-header a .social-icon {
                    display: inline-block;
                    text-align: center;
                    height: 35px;
                    width: 35px;
                    font-size: 22px;
                }
            }
            @media screen and (min-width: 992px) {
                .main-header .main-header-container .main-header-left-side .dropdown-menu.show {
                    width: 20vw;
                }
            }
        </style>
    </head>
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SYYQ5EWE81"></script>--}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SYYQ5EWE81');
    </script>
    @php
        \Carbon\Carbon::setLocale('uk');
    @endphp
    <body class="{{ app(\Illuminate\Routing\Route::class)->getActionMethod() == 'contacts' ? 'contact-bg' : ''  }}">

    @php
        $menuOptions = \App\Services\HomeServices::getPopupMenuOptions();
    @endphp
        <header class="header mobile-hidden">
            <div class="content header__content">
                <div class="header__col header__col_1">
                    <a href="/" title="НТА" class="logo header__logo">
                        <img src="/img/logo.svg" alt="НТА" loading="lazy">
                        <img src="/img/logo-red.svg" alt="НТА" class="logo__hide" loading="lazy">
                    </a>
                    <div class="header__date icon-calendar" data-da="navigation__row-mobile,1,1000" data-da-index="0"><span><?= \Carbon\Carbon::now()->translatedFormat('l, j F, Y');?></span></div>
                </div>
                @include('layouts._category-menu')
            </div>
            <nav class="navigation">
                <div class="content">
                    <div class="icon-menu navigation__icon-menu active">
                        <div class="sw-topper"></div>
                        <div class="sw-bottom"></div>
                        <div class="sw-footer"></div>
                    </div>
                </div>
                <div class="content navigation__content">
                    <div class="navigation__row-mobile"></div>
                    <div class="navigation__row">
                        @foreach($menuOptions as $option)
                            <ul id="menu-col-1-menu" class="navigation__menu">
                                <li id="menu-item-311291" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-311291">
                                    <a href="{{ $option['info']['url'] }}">{{ $option['info']['name'] }}</a>
                                    @if($option['child'])
                                        <ul class="sub-menu">
                                            @foreach($option['child'] as $cOption)
                                                <li id="menu-item-311455" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311455">
                                                    <a href="{{ $cOption['url'] }}">{{ $cOption['name']  }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <span class="show-sub-menu"></span>
                                    @endif
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </nav>
        </header>

        <section class="main">
            <div class="wrapper">
                <header class="header active desctop-hidden">
                    <div class="content header__content">
                        <div class="header__col header__col_1">
                            <a href="/" title="НТА" class="logo header__logo">
                                <img src="/img/logo.svg" alt="НТА" loading="lazy">
                                <img src="/img/logo-red.svg" alt="НТА" class="logo__hide" loading="lazy">
                            </a>
                        </div>
                        <div class="header__col header__col_2">
                            <div class="header__row"></div>
                            <div class="header__row header__row_middle">
                                <a href="/page/divitisia_onlain" class="header__online online-link icon-play">дивитися онлайн</a>
                                <div class="header__search search">
                                    <div class="search__toggle icon-search js-search-toggle"></div>
                                </div>
                                <div class="icon-menu header__icon-menu">
                                    <div class="sw-topper"></div>
                                    <div class="sw-bottom"></div>
                                    <div class="sw-footer"></div>
                                </div>
                            </div>
                            <div class="header__row"></div>
                        </div>
                    </div>
                    <nav class="navigation">
                        <div class="content">
                            <div class="icon-menu navigation__icon-menu active">
                                <div class="sw-topper"></div>
                                <div class="sw-bottom"></div>
                                <div class="sw-footer"></div>
                            </div>
                        </div>
                        <div class="content navigation__content">
                            <div class="navigation__row-mobile">
                                <div class="_dynamic_adapt_1000" data-da="navigation__row-mobile,1,1000" data-da-index="0">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    <span><?= \Carbon\Carbon::now()->translatedFormat('l, j F, Y');?></span>
                                </div>

                                @if($wData = getWeatherData())
                                    <div class="header__weather _dynamic_adapt_1000" data-da="navigation__row-mobile,2,1000" title="хмарно" data-da-index="1">
                                        <div class="weather-icon" style="background-image: url('{{ $wData['icon'] }}');"></div>
                                        <span>{{ $wData['temperature'] }}<sup>0</sup> {{ $wData['city'] }}</span>
                                    </div>
                                    <style>
                                        .weather-icon {
                                            display: inline-block;
                                            width: 20px;
                                            height: 17px;
                                            background-size: 120%;
                                            background-repeat: no-repeat;
                                        }
                                    </style>
                                @endif

                            </div>
                            <form method="get" id="searchform" class="search__form search-form _dynamic_adapt_1000" data-da="navigation__content,1,1000" action="{{ route('search')  }}" data-da-index="3">
                                <input type="text" placeholder="Пошук по сайту" name="query" class="search-form__input">
                                <button type="submit" class="search-form__button button-style">Знайти</button>
                            </form>
                            <div class="navigation__row">
                                @php $lastKey = $menuOptions ? array_key_last($menuOptions) : null; @endphp
                                @foreach($menuOptions as $key => $option)
                                    <ul class="navigation__menu">
                                    @if($lastKey == $key)
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                            <a href="{{ $option['info']['url'] }}">{{ $option['info']['name'] }}</a>
                                        </li>
                                        @if($option['child'])
                                            @foreach($option['child'] as $cOption)
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                    <a href="{{ $cOption['url'] }}">{{ $cOption['name']  }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    @else
                                        <li id="menu-item-311291" class="menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor current-menu-parent current-post-parent menu-item-has-children menu-item-311291">
                                            <a href="{{ $option['info']['url'] }}">{{ $option['info']['name'] }}</a>
                                            @if($option['child'])
                                                <ul class="sub-menu">
                                                    @foreach($option['child'] as $cOption)
                                                        <li id="menu-item-311455" class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                                            <a href="{{ $cOption['url'] }}">{{ $cOption['name']  }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                    </ul>
                                @endforeach
                            </div>
                            <div data-da="navigation__content,3,1000" data-da-index="4" class="_dynamic_adapt_1000">
                                @if($tags = \App\Services\HomeServices::getMainMenuTags())
                                    <ul id="menu-themes-menu" class="header__tags tags">
                                        @foreach($tags as $tag)
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag">
                                            <a href="/tag-search?query={{$tag}}">#&nbsp;{{$tag}}</a>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <div class="header__social _dynamic_adapt_1000" data-da="navigation__content,4,1000"  data-da-index="2">

                                <ul class="social ">
                                    @if($facebookLink = getSetting('facebook_link'))
                                        <li>
                                            <a href="{{ $facebookLink }}" class="social__link" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($twitterLink = getSetting('twitter_link'))
                                        <li>
                                            <a href="{{ $twitterLink }}" class="social__link" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($instagramLink = getSetting('instagram_link'))
                                        <li>
                                            <a href="{{ $instagramLink }}" class="social__link" target="_blank" rel="nofollow">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($youtubeLink = getSetting('youtube_link'))
                                        <li>
                                            <a href="{{ $youtubeLink }}" class="social__link" target="_blank" rel="nofollow">
                                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if($emailLink = getSetting('email_address'))
                                        <li>
                                            <a href="{{ $emailLink }}" class="social__link icon-email"
                                               target="_blank" rel="nofollow">
                                                <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                                     fill="#000000">
                                                    <polygon points="339.392,258.624 512,367.744 512,144.896"></polygon>
                                                    <polygon points="0,144.896 0,367.744 172.608,258.624"></polygon>
                                                    <path
                                                        d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"></path>
                                                    <path
                                                        d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856	L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <main>
                    @yield('content')
                </main>
            </div>
        </section>

        @include('layouts.footer')
    </body>
    <script>
        $(document).ready(function(){
          $( ".search-show" ).on( "click", function() {
            $(".header-search").toggleClass("show");
          } );

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
    </script>

    {!! getSetting('other_scripts') !!}

    {{-- Підрахунок відвідувань на сайт --}}
    @php
        if ($site = \App\Models\Page::where(['slug' => 'site'])->first()) {
            views($site)->record();
        }
    @endphp
</html>
