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

        <header>
            <section class="top-bar mobile-hide">
                <div class="custom-container">
                    <div class="left-side">
                        <span><img src="{{ asset('/img/map_marker.png') }}" >{{ getSetting('address') }}</span>
                    </div>
                    <div class="right-side">
                        <div class="top-bar-email">
                            <a href="mailto:{{ getSetting('email_address') }}" rel=”nofollow”><img src="{{ asset('/img/email_icon.png') }}">{{ getSetting('email_address') }}</a>
                        </div>
                        <div class="top-bar-phone">
                            <a href="tel:{{ getSetting('phone') }}" rel=”nofollow”><img src="{{ asset('/img/Phone_icon.png') }}">{{ getSetting('phone') }}</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="main-header">
                <div class="main-header-container">
                    <div class="main-header-left-side">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                          </button>
                          <ul class="dropdown-menu">
                              <div class="main-menu-container">
                                  <div class="menu-category">
                                      <span class="menu-category-title">ВСІ КАТЕГОРІЇ </span>
                                      @foreach(\App\Services\HomeServices::getCategoryLeftMenu() as $category)
                                          <li><a class="menu-dropdown-item" href={{ '/category/' . $category->slug }}>{{ $category->name }}</a></li>
                                      @endforeach
                                  </div>
                                  <div class="menu-category menu-sub-category">
                                      <p class="social-header">
                                          @if($facebookLink = getSetting('facebook_link'))
                                              <a href="{{ $facebookLink }}" rel=”nofollow” style="text-decoration: none !important;">
                                                  <span class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                              </a>
                                          @endif

                                          @if($youtubeLink = getSetting('youtube_link'))
                                              <a href="{{ $youtubeLink }}" rel=”nofollow” style="text-decoration: none !important;">
                                                  <span class="social-icon"><i class="fa fa-youtube" aria-hidden="true"></i></span>
                                              </a>
                                          @endif

                                          @if($telegramLink = getSetting('telegram_link'))
                                              <a href="{{ $telegramLink }}" rel=”nofollow” style="text-decoration: none !important;">
                                                  <span class="social-icon"><i class="fa fa-telegram" aria-hidden="true"></i></span>
                                              </a>
                                         @endif
                                      </p>
                                  </div>
                              </div>

                          </ul>
                        </div>
                       <!-- <div class="chose-lang">
                            <a class="language active" href="/">UA</a>
                            <a class="language" href="/">EN</a>
                        </div> -->
                    </div>
                    <div class="main-header-center">
                        <a href="/"><img src="{{ asset('/img/KD-Logo-UA-FIN-01.png')}} "></a>
                    </div>
                    <div class="main-header-right-side">
                        <form action="{{ route('search')  }}" method="get" style="float: right">
                            <div class="input-group header-search">
                                <input name="query" class="form-control search-input" type="text" placeholder="магате...." aria-label="магате...." aria-describedby="btnNavbarSearch" />
                                <span class="search-show"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="app-menu">
                @include('layouts.categoryMenu')
            </section>
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
