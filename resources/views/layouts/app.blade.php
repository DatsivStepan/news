<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <link style="height:20px" rel="icon" type="image/x-icon" href="{{ asset('/img/KD-Logo.ico') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="f0keE2RFQFMrpYgtuv84yqvMN8JOHswSe5tl9bsvetU"/>

        <title>
            @yield('pageTitle', 'Інформаційне агентство “Король Данило” | Найсвіжіші новини України і Світу')
        </title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset("/css/app.css") }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SYYQ5EWE81"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SYYQ5EWE81');
    </script>
    <body class="{{ app(\Illuminate\Routing\Route::class)->getActionMethod() == 'contacts' ? 'contact-bg' : ''  }}">
    <div class="container">

{{--        <header>--}}
{{--            <section class="top-bar mobile-hide">--}}
{{--                <div class="custom-container">--}}
{{--                    <div class="left-side">--}}
{{--                        <span><img src="{{ asset('/img/map_marker.png') }}" >{{ getSetting('address') }}</span>--}}
{{--                    </div>--}}
{{--                    <div class="right-side">--}}
{{--                        <div class="top-bar-email">--}}
{{--                            <a href="mailto:{{ getSetting('email_address') }}" rel=”nofollow”><img src="{{ asset('/img/email_icon.png') }}">{{ getSetting('email_address') }}</a>--}}
{{--                        </div>--}}
{{--                        <div class="top-bar-phone">--}}
{{--                            <a href="tel:{{ getSetting('phone') }}" rel=”nofollow”><img src="{{ asset('/img/Phone_icon.png') }}">{{ getSetting('phone') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}

{{--            <section class="main-header">--}}
{{--                <div class="main-header-container">--}}
{{--                    <div class="main-header-left-side">--}}
{{--                        <div class="dropdown">--}}
{{--                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>--}}
{{--                          </button>--}}
{{--                          <ul class="dropdown-menu">--}}
{{--                              <div class="main-menu-container">--}}
{{--                                  <div class="menu-category">--}}
{{--                                      <span class="menu-category-title">ВСІ КАТЕГОРІЇ </span>--}}
{{--                                      @foreach(\App\Services\HomeServices::getCategoryLeftMenu() as $category)--}}
{{--                                          <li><a class="menu-dropdown-item" href={{ '/category/' . $category->slug }}>{{ $category->name }}</a></li>--}}
{{--                                      @endforeach--}}
{{--                                  </div>--}}
{{--                                  <div class="menu-category menu-sub-category">--}}
{{--                                      <p class="social-header">--}}
{{--                                          @if($facebookLink = getSetting('facebook_link'))--}}
{{--                                              <a href="{{ $facebookLink }}" rel=”nofollow” style="text-decoration: none !important;">--}}
{{--                                                  <span class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>--}}
{{--                                              </a>--}}
{{--                                          @endif--}}

{{--                                          @if($youtubeLink = getSetting('youtube_link'))--}}
{{--                                              <a href="{{ $youtubeLink }}" rel=”nofollow” style="text-decoration: none !important;">--}}
{{--                                                  <span class="social-icon"><i class="fa fa-youtube" aria-hidden="true"></i></span>--}}
{{--                                              </a>--}}
{{--                                          @endif--}}

{{--                                          @if($telegramLink = getSetting('telegram_link'))--}}
{{--                                              <a href="{{ $telegramLink }}" rel=”nofollow” style="text-decoration: none !important;">--}}
{{--                                                  <span class="social-icon"><i class="fa fa-telegram" aria-hidden="true"></i></span>--}}
{{--                                              </a>--}}
{{--                                         @endif--}}
{{--                                      </p>--}}
{{--                                  </div>--}}
{{--                              </div>--}}

{{--                          </ul>--}}
{{--                        </div>--}}
{{--                       <!-- <div class="chose-lang">--}}
{{--                            <a class="language active" href="/">UA</a>--}}
{{--                            <a class="language" href="/">EN</a>--}}
{{--                        </div> -->--}}
{{--                    </div>--}}
{{--                    <div class="main-header-center">--}}
{{--                        <a href="/"><img src="{{ asset('/img/KD-Logo-UA-FIN-01.png')}} "></a>--}}
{{--                    </div>--}}
{{--                    <div class="main-header-right-side">--}}
{{--                        <form action="{{ route('search')  }}" method="get" style="float: right">--}}
{{--                            <div class="input-group header-search">--}}
{{--                                <input name="query" class="form-control search-input" type="text" placeholder="магате...." aria-label="магате...." aria-describedby="btnNavbarSearch" />--}}
{{--                                <span class="search-show"><i class="fa fa-search" aria-hidden="true"></i></span>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--            <section class="app-menu">--}}
{{--                @include('layouts.categoryMenu')--}}
{{--            </section>--}}
{{--        </header>--}}
        <header class="header">
            <div class="content header__content">
                <div class="header__col header__col_1">
                    <a href="/" title="НТА" class="logo header__logo">
                        <img src="https://www.nta.ua/wp-content/themes/nta/images/logo/logo.svg" alt="НТА" loading="lazy">
                        <img src="https://www.nta.ua/wp-content/themes/nta/images/logo/logo-red.svg" alt="НТА" class="logo__hide" loading="lazy">
                    </a>
                    <div class="header__date icon-calendar" data-da="navigation__row-mobile,1,1000" data-da-index="0"><span>Неділя, 24 Листопада, 2024</span></div>
                </div>
                <div class="header__col header__col_2">
                    <div class="header__row">
                        <div class="header__weather" data-da="navigation__row-mobile,2,1000" title="сніг" data-da-index="1"><i class="wi wi-snowflake-cold"></i><span>-0<sup>0</sup> Львів</span></div>
                        <div class="header__social" data-da="navigation__content,4,1000" data-da-index="2">
                            <ul class="social "><li><a href="https://www.facebook.com/NTAchannel" class="social__link icon-facebook" target="_blank" rel="nofollow"></a></li><li><a href="https://twitter.com/TelekanalNTA" class="social__link icon-twitter" target="_blank" rel="nofollow"></a></li><li><a href="https://www.instagram.com/nta_tv_channel/" class="social__link icon-instagram" target="_blank" rel="nofollow"></a></li><li><a href="http://www.youtube.com/c/NtaLvivUa" class="social__link icon-youtube" target="_blank" rel="nofollow"></a></li><li><a href="mailto:TelekanalNTA@gmail.com" class="social__link icon-email" target="_blank" rel="nofollow">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000"><polygon points="339.392,258.624 512,367.744 512,144.896"></polygon><polygon points="0,144.896 0,367.744 172.608,258.624"></polygon><path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"></path><path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856	L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"></path></svg>
                                    </a></li></ul>                    </div>
                    </div>
                    <div class="header__row header__row_middle">
                        <div class="header__nav"><ul id="menu-header-menu" class="header__menu"><li id="menu-item-311239" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-311239"><a href="https://www.nta.ua/news/">НОВИНИ</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-311446" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311446"><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li>
                                        <li id="menu-item-311240" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311240"><a href="https://www.nta.ua/news/events/">Надзвичайні події</a></li>
                                        <li id="menu-item-311241" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311241"><a href="https://www.nta.ua/news/politics/">Новини політики</a></li>
                                        <li id="menu-item-311244" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311244"><a href="https://www.nta.ua/news/economy/">Економіка</a></li>
                                        <li id="menu-item-311242" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311242"><a href="https://www.nta.ua/news/calture/">Культура</a></li>
                                        <li id="menu-item-311243" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311243"><a href="https://www.nta.ua/news/sport/">Спорт</a></li>
                                        <li id="menu-item-311447" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311447"><a href="https://www.nta.ua/news/svit/">Новини світу</a></li>
                                        <li id="menu-item-311448" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311448"><a href="https://www.nta.ua/news/kryminal/">Кримінал</a></li>
                                        <li id="menu-item-311449" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311449"><a href="https://www.nta.ua/news/helth/">Медицина та здоров’я</a></li>
                                        <li id="menu-item-311450" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311450"><a href="https://www.nta.ua/news/tech/">Технології та ІТ</a></li>
                                        <li id="menu-item-311451" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311451"><a href="https://www.nta.ua/news/kuriozy/">Курйози</a></li>
                                        <li id="menu-item-311452" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311452"><a href="https://www.nta.ua/news/miscia/">Місця</a></li>
                                        <li id="menu-item-319174" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-319174"><a href="https://www.nta.ua/news/shoubiznes/">Шоу бізнес</a></li>
                                        <li id="menu-item-345745" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-345745"><a href="https://www.nta.ua/news/strimy/">Стріми</a></li>
                                        <li id="menu-item-365492" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365492"><a href="https://www.nta.ua/news/nauka/">Новини науки</a></li>
                                        <li id="menu-item-365493" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365493"><a href="https://www.nta.ua/news/osvita/">Освіта</a></li>
                                        <li id="menu-item-365495" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365495"><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li>
                                        <li id="menu-item-365496" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365496"><a href="https://www.nta.ua/news/novyny-turyzmu/">Новини туризму</a></li>
                                        <li id="menu-item-365494" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365494"><a href="https://www.nta.ua/news/pogoda/">Погода</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-311245" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-311245"><a href="https://www.nta.ua/teleproekty/">Проєкти</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-311247" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311247"><a href="https://www.nta.ua/tok-shou/govoryt-velykyj-lviv/">ГОВОРИТЬ ВЕЛИКИЙ ЛЬВІВ</a></li>
                                        <li id="menu-item-311246" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311246"><a href="https://www.nta.ua/tok-shou/narodne-tolk-shou/">НАРОДНЕ ТОЛК-ШОУ</a></li>
                                        <li id="menu-item-311248" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311248"><a href="https://www.nta.ua/projects/gen-ukrayincziv/">ГЕН УКРАЇНЦІВ</a></li>
                                        <li id="menu-item-311250" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311250"><a href="https://www.nta.ua/projects/yurkevych-akczenty/">ЮРКЕВИЧ. АКЦЕНТИ</a></li>
                                        <li id="menu-item-311249" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311249"><a href="https://www.nta.ua/projects/pryama-mova-lvova/">ПРЯМА МОВА ЛЬВОВА</a></li>
                                        <li id="menu-item-311842" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311842"><a href="https://www.nta.ua/teleproekty/pravda-nagyvo/">ПРАВДА.НАЖИВО</a></li>
                                        <li id="menu-item-311252" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311252"><a href="https://www.nta.ua/projects/formula-zdorovya/">ФОРМУЛА ЗДОРОВ`Я</a></li>
                                        <li id="menu-item-311253" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311253"><a href="https://www.nta.ua/projects/vse-mozhlyvo/">ВСЕ МОЖЛИВО</a></li>
                                        <li id="menu-item-311255" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311255"><a href="https://www.nta.ua/projects/bez-grymu-z-mariyeyu-shymanskoyu/">БЕЗ ГРИМУ</a></li>
                                        <li id="menu-item-311256" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311256"><a href="https://www.nta.ua/projects/hvylyna-pravdy/">ХВИЛИНА ПРАВДИ</a></li>
                                        <li id="menu-item-311843" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311843"><a href="https://www.nta.ua/projects/formula-zdorovya/">ФОРМУЛА ЗДОРОВ`Я</a></li>
                                        <li id="menu-item-350811" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350811"><a href="https://www.nta.ua/teleproekty/pidsumky-nazhyvo/">ПІДСУМКИ. НАЖИВО</a></li>
                                        <li id="menu-item-350812" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350812"><a href="https://www.nta.ua/projects/ukrayinska-istoriya-iks/">УКРАЇНСЬКА ІСТОРІЯ ІКС</a></li>
                                        <li id="menu-item-350810" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350810"><a href="https://www.nta.ua/projects/zmovy/">ЗМОВИ</a></li>
                                        <li id="menu-item-484834" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-484834"><a href="https://www.nta.ua/ukrzdol/">УКРАЇНСЬКОЮ_ЗДОЛАЄМ</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-311841" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311841"><a href="https://www.nta.ua/statti/">Статті</a></li>
                                <li id="menu-item-366571" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-366571"><a href="https://www.nta.ua/telekanal/">Телеканал НТА</a></li>
                                <li id="menu-item-382368" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-382368"><a href="https://www.nta.ua/donate/">Підтримка</a></li>
                                <li id="menu-item-427784" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-427784"><a href="https://www.nta.ua/teleshkola-nta/">Телешкола</a></li>
                            </ul></div>                                        <a href="https://www.nta.ua/nazhyvo/" class="header__online online-link icon-play">дивитися онлайн</a>
                        <div class="header__search search">
                            <div class="search__toggle icon-search js-search-toggle"></div>
                            <form method="get" id="searchform" class="search__form search-form" data-da="navigation__content,1,1000" action="https://www.nta.ua/" data-da-index="3">
                                <input type="text" placeholder="Пошук по сайту" name="s" class="search-form__input">
                                <button type="submit" class="search-form__button button-style">Знайти</button>
                            </form>                    </div>
                        <div class="icon-menu header__icon-menu">
                            <div class="sw-topper"></div>
                            <div class="sw-bottom"></div>
                            <div class="sw-footer"></div>
                        </div>
                    </div>
                    <div class="header__row">
                        <div data-da="navigation__content,3,1000" data-da-index="4">
                            <ul id="menu-themes-menu" class="header__tags tags"><li id="menu-item-311263" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-311263"><a href="https://www.nta.ua/tag/koronavirus/">#&nbsp;Коронавірус</a></li>
                                <li id="menu-item-311265" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-311265"><a href="https://www.nta.ua/tag/vijna/">#&nbsp;Війна</a></li>
                            </ul>                    </div>
                    </div>
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
                    <div class="navigation__row-mobile"></div>
                    <div class="navigation__row">
                        <ul id="menu-col-1-menu" class="navigation__menu"><li id="menu-item-311291" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-311291"><a href="https://www.nta.ua/news/">НОВИНИ</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-311455" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311455"><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li>
                                    <li id="menu-item-311293" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311293"><a href="https://www.nta.ua/news/politics/">Новини політики</a></li>
                                    <li id="menu-item-311292" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311292"><a href="https://www.nta.ua/news/events/">Надзвичайні події</a></li>
                                    <li id="menu-item-311294" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311294"><a href="https://www.nta.ua/news/calture/">Культура</a></li>
                                    <li id="menu-item-311295" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311295"><a href="https://www.nta.ua/news/sport/">Спорт</a></li>
                                    <li id="menu-item-311296" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311296"><a href="https://www.nta.ua/news/economy/">Економіка</a></li>
                                    <li id="menu-item-311456" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311456"><a href="https://www.nta.ua/news/svit/">Новини світу</a></li>
                                    <li id="menu-item-311457" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311457"><a href="https://www.nta.ua/news/kryminal/">Кримінал</a></li>
                                    <li id="menu-item-311458" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311458"><a href="https://www.nta.ua/news/helth/">Медицина та здоров’я</a></li>
                                    <li id="menu-item-311459" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311459"><a href="https://www.nta.ua/news/tech/">Технології та ІТ</a></li>
                                    <li id="menu-item-311460" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311460"><a href="https://www.nta.ua/news/kuriozy/">Курйози</a></li>
                                    <li id="menu-item-311461" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311461"><a href="https://www.nta.ua/news/miscia/">Місця</a></li>
                                    <li id="menu-item-365779" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365779"><a href="https://www.nta.ua/news/nauka/">Новини науки</a></li>
                                    <li id="menu-item-365780" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365780"><a href="https://www.nta.ua/news/shoubiznes/">Шоу бізнес</a></li>
                                    <li id="menu-item-365781" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365781"><a href="https://www.nta.ua/news/osvita/">Освіта</a></li>
                                    <li id="menu-item-365782" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365782"><a href="https://www.nta.ua/news/pogoda/">Погода</a></li>
                                    <li id="menu-item-365783" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365783"><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li>
                                    <li id="menu-item-365784" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365784"><a href="https://www.nta.ua/news/novyny-turyzmu/">Новини туризму</a></li>
                                    <li id="menu-item-365785" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365785"><a href="https://www.nta.ua/news/strimy/">Стріми</a></li>
                                </ul>
                                <span class="show-sub-menu"></span></li>
                        </ul><ul id="menu-col-2-menu" class="navigation__menu"><li id="menu-item-311306" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-311306"><a href="https://www.nta.ua/teleproekty/">Проєкти</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-311309" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311309"><a href="https://www.nta.ua/tok-shou/govoryt-velykyj-lviv/">ГОВОРИТЬ ВЕЛИКИЙ ЛЬВІВ</a></li>
                                    <li id="menu-item-311308" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311308"><a href="https://www.nta.ua/tok-shou/narodne-tolk-shou/">НАРОДНЕ ТОЛК-ШОУ</a></li>
                                    <li id="menu-item-311310" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311310"><a href="https://www.nta.ua/projects/gen-ukrayincziv/">ГЕН УКРАЇНЦІВ</a></li>
                                    <li id="menu-item-350809" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350809"><a href="https://www.nta.ua/projects/ukrayinska-istoriya-iks/">УКРАЇНСЬКА ІСТОРІЯ ІКС</a></li>
                                    <li id="menu-item-311311" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311311"><a href="https://www.nta.ua/projects/yurkevych-akczenty/">ЮРКЕВИЧ. АКЦЕНТИ</a></li>
                                    <li id="menu-item-312023" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-312023"><a href="https://www.nta.ua/teleproekty/pravda-nagyvo/">ПРАВДА.НАЖИВО</a></li>
                                    <li id="menu-item-350808" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350808"><a href="https://www.nta.ua/teleproekty/pidsumky-nazhyvo/">ПІДСУМКИ. НАЖИВО</a></li>
                                    <li id="menu-item-312152" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-312152"><a href="https://www.nta.ua/projects/govoryt-velykyj-lviv-intervyu/">ГОВОРИТЬ ВЕЛИКИЙ ЛЬВІВ. ІНТЕРВ’Ю</a></li>
                                    <li id="menu-item-311307" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311307"><a href="https://www.nta.ua/projects/pryama-mova-lvova/">ПРЯМА МОВА ЛЬВОВА</a></li>
                                    <li id="menu-item-311313" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311313"><a href="https://www.nta.ua/projects/formula-zdorovya/">ФОРМУЛА ЗДОРОВ`Я</a></li>
                                    <li id="menu-item-311314" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311314"><a href="https://www.nta.ua/projects/vse-mozhlyvo/">ВСЕ МОЖЛИВО</a></li>
                                    <li id="menu-item-311316" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311316"><a href="https://www.nta.ua/projects/bez-grymu-z-mariyeyu-shymanskoyu/">БЕЗ ГРИМУ</a></li>
                                    <li id="menu-item-311317" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311317"><a href="https://www.nta.ua/projects/hvylyna-pravdy/">ХВИЛИНА ПРАВДИ</a></li>
                                    <li id="menu-item-350814" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350814"><a href="https://www.nta.ua/projects/zmovy/">ЗМОВИ</a></li>
                                    <li id="menu-item-484835" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-484835"><a href="https://www.nta.ua/ukrzdol/">УКРАЇНСЬКОЮ_ЗДОЛАЄМ</a></li>
                                </ul>
                                <span class="show-sub-menu"></span></li>
                        </ul><ul id="menu-col-3-menu" class="navigation__menu"><li id="menu-item-311297" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-311297"><a href="#">Архів</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-311300" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311300"><a href="https://www.nta.ua/tok-shou/drozdov-pryamym-tekstom/">Drozdov</a></li>
                                    <li id="menu-item-311299" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311299"><a href="https://www.nta.ua/projects/pravda-u-hrysti/">ПРАВДА У ХРИСТІ</a></li>
                                    <li id="menu-item-312025" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-312025"><a href="https://www.nta.ua/projects/pravda-investigation/">ТЕОРІЯ ПРАВДИ</a></li>
                                    <li id="menu-item-311298" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311298"><a href="https://www.nta.ua/projects/pravova-revolyucziya/">ПРАВОВА [Р]ЕВОЛЮЦІЯ</a></li>
                                    <li id="menu-item-311301" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311301"><a href="https://www.nta.ua/projects/nagolo/">NАГОЛО</a></li>
                                    <li id="menu-item-311302" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311302"><a href="https://www.nta.ua/projects/antykryza/">АНТИКРИЗА</a></li>
                                    <li id="menu-item-311303" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311303"><a href="https://www.nta.ua/projects/realnyj-futbol/">РЕАЛЬНИЙ ФУТБОЛ</a></li>
                                    <li id="menu-item-311304" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311304"><a href="https://www.nta.ua/projects/kulturnyj_blog/">КУЛЬТУРНИЙ БЛОГ</a></li>
                                    <li id="menu-item-311305" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311305"><a href="https://www.nta.ua/teleproekty/nagolos/">НАГОЛОС</a></li>
                                    <li id="menu-item-350758" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350758"><a href="https://www.nta.ua/projects/vse-mozhlyvo/">ВСЕ МОЖЛИВО</a></li>
                                    <li id="menu-item-350757" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350757"><a href="https://www.nta.ua/projects/otakoyi/">ОТАКОЇ</a></li>
                                </ul>
                                <span class="show-sub-menu"></span></li>
                        </ul><ul id="menu-col-4-menu" class="navigation__menu"><li id="menu-item-366866" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-366866"><a href="https://www.nta.ua/telekanal/">Телеканал НТА</a></li>
                            <li id="menu-item-311988" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311988"><a href="https://www.nta.ua/statti/">Статті</a></li>
                            <li id="menu-item-314656" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-314656"><a href="https://www.nta.ua/blogy/">Блоги</a></li>
                            <li id="menu-item-311463" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-311463"><a href="https://www.nta.ua/pro-nas/">ПРО НАС</a></li>
                            <li id="menu-item-312681" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-312681"><a href="https://www.nta.ua/struktura-vlasnosti/">Структура власності</a></li>
                            <li id="menu-item-311465" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-311465"><a href="https://www.nta.ua/kontakty/">Контакти НТА</a></li>
                            <li id="menu-item-311464" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-311464"><a href="https://www.nta.ua/reklama/">Реклама</a></li>
                            <li id="menu-item-427785" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-427785"><a href="https://www.nta.ua/teleshkola-nta/">Телешкола «NTA»</a></li>
                        </ul>                </div>
                </div>
            </nav>
        </header>

        <section class="main">
            <div class="wrapper">
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
