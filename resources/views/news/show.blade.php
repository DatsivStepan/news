@extends('layouts.app')

@section('pageTitle', $news->getMetaTitle())

@include('meta._tags', [
    'meta' => [
        'title' => $news->getMetaTitle(),
        'description' => $news->getMetaDescription(),
        'image' => $news->getImageUrl(),
        'url' => $news->getUrl(),
    ]
])

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
@section('template_title')
    {{ $news->getTitle() }}
@endsection

@section('content')

    <script type='text/javascript' src='/js/gallery/ug-common-libraries.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-functions.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-thumbsgeneral.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-thumbsstrip.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-touchthumbs.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-panelsbase.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-strippanel.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-gridpanel.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-thumbsgrid.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-tiles.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-tiledesign.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-avia.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-slider.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-sliderassets.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-touchslider.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-zoomslider.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-video.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-gallery.js'></script>
    <!--	<script type='text/javascript' src='unitegallery/js/ug-lightbox.js'></script>-->
    <!--	<script type='text/javascript' src='unitegallery/js/ug-carousel.js'></script>-->
    <script type='text/javascript' src='/js/gallery/ug-api.js'></script>
    <script type='text/javascript' src='/js/gallery/ug-theme-default.js'></script>

    <link rel='stylesheet' href='/css/unite-gallery.css' type='text/css' />

    <style>
        .single-news-description img {
            max-width: 100%;
            /*height: auto;*/
        }
        div#social-links ul {
            display: inline-block;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
        }
        @media (max-width:640px){
            .single-news-description img {
                height: auto;
            }
        }
    </style>
    <main class="main">
        <div class="content">
            <div class="bread">

                <!-- Breadcrumb NavXT 7.3.1 -->
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to НТА." href="/" class="home">
                        <span property="name">НТА</span>
                    </a>
                    <meta property="position" content="1">
                </span> &gt;

                @if($news->getCategory() && ($lists = $news->getCategory()->getParentsList()))
                    @foreach($lists as $item)
                        <span property="itemListElement" typeof="ListItem">
                            <a property="item" typeof="WebPage" title="Go to the {{ $item['name'] }} category archives." href="{{ $item['url'] }}" class="taxonomy category">
                                <span property="name">{{ $item['name'] }}</span>
                            </a>
                            <meta property="position" content="2">
                        </span> &gt;
                    @endforeach
                @endif

                <span property="itemListElement" typeof="ListItem">
                    <span property="name" class="post post-post current-item">
                        {{$news->getTitle()}}
                    </span>
                    <meta property="url" content="{{$news->getUrl()}}">
                    <meta property="position" content="4">
                </span>
            </div>
        </div>


        <!--content-->
        <div class="content main__row main__row_reverse">
            <div class="main__content" id="main">
                <div class="single">
                    <h1 class="single__title">{{$news->getTitle()}}</h1>
                    <ul class="single__cat">
                        <li><a href="#">{{ $news->getCategoryName() }}</a></li>
                    </ul>
                    <div class="single__info">
                        <span class="single__date date-info"><time datetime="">{{ $news->getPublicationDate(false) }}</time></span>
                        <div class="single__view view-info icon-view nr-views-556530">103</div>
                        <div class="single__share">

                            <div class="addtoany_shortcode">
                                <div class="a2a_kit a2a_kit_size_40 addtoany_list">
                                    <a class="a2a_button_facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ $news->getUrl() }}" title="Facebook" rel="nofollow noopener" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(8, 102, 255); width: 40px; line-height: 40px; height: 40px; background-size: 40px; border-radius: 6px;">
                                            <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path fill="#fff" d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16c0 5.628 3.875 10.35 9.101 11.647v-7.98h-2.474V16H13.1v-1.58c0-4.085 1.849-5.978 5.859-5.978.76 0 2.072.15 2.608.298v3.325c-.283-.03-.775-.045-1.386-.045-1.967 0-2.728.745-2.728 2.683V16h3.92l-.673 3.667h-3.247v8.245C23.395 27.195 28 22.135 28 16"></path>
                                            </svg>
                                        </span>
                                        <span class="a2a_label">Facebook</span>
                                    </a>
                                    <a class="a2a_button_twitter" href="https://twitter.com/intent/tweet?text=fd&amp;url={{ $news->getUrl() }}" title="Twitter" rel="nofollow noopener" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(29, 155, 240); width: 40px; line-height: 40px; height: 40px; background-size: 40px; border-radius: 6px;">
                                            <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path fill="#FFF" d="M28 8.557a10 10 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.7 9.7 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.94 4.94 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a5 5 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174q-.476-.001-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.9 9.9 0 0 1-6.114 2.107q-.597 0-1.175-.068a13.95 13.95 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013q0-.32-.015-.637c.96-.695 1.795-1.56 2.455-2.55z"></path>
                                            </svg>
                                        </span>
                                        <span class="a2a_label">Twitter</span>
                                    </a>
                                    <a class="a2a_button_telegram" href="https://telegram.me/share/url?url={{ $news->getUrl() . '&text=' . $news->getTitle() }}" title="Telegram" rel="nofollow noopener" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_telegram" style="background-color: rgb(44, 165, 224); width: 40px; line-height: 40px; height: 40px; background-size: 40px; border-radius: 6px;">
                                            <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path fill="#FFF" d="M25.515 6.896 6.027 14.41c-1.33.534-1.322 1.276-.243 1.606l5 1.56 1.72 5.66c.226.625.115.873.77.873.506 0 .73-.235 1.012-.51l2.43-2.363 5.056 3.734c.93.514 1.602.25 1.834-.863l3.32-15.638c.338-1.363-.52-1.98-1.41-1.577z"></path>
                                            </svg>
                                        </span>
                                        <span class="a2a_label">Telegram</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="single__content entry-content">
                        <div class="single-thumb">
                            <img width="1024" height="683" src="{{ $news->getImageUrl() }}"
                                 class="attachment-large size-large wp-post-image"
                                 alt="{{ $news->getTitle() }}"
                                 decoding="async"
                                 fetchpriority="high"
                                 title="{{ $news->getTitle() }}">
                        </div>

                        <div class="single-inner-content">
                            {!! $news->getDescription() !!}
                            <ul class="tags single__tags">
                                @foreach($news->tags as $tag)
                                    <li>
                                        <a href="/tag-search?query={{ $tag->name }}" rel="tag">
                                            {{ mb_strtoupper($tag->name) . ' '}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @include('news.parts._reactions')
                        </div>

                        @if($telegramLink = getSetting('telegram_link'))
                            <div id="telega" style="
        margin: 1.4em auto;
        padding: 5px 15px;
        border: #eeeff0 15px solid;
        background: #eeeff0;
        font-weight: 500;
        text-align: center;

    ">
                                <p id="telrext">
                                    Читайте нас у Telegram. Підписуйтесь на наш канал
                                    <a id="linkk" href="{{ $telegramLink }}" target="_blank" style="font-weight: bolder;">
                                        "Говорить великий Львів"
                                    </a>
                                </p>
                            </div>
                        @endif

                        <div style="margin-top: 25px;">
                            @if($telegramLink = getSetting('telegram_link'))
                                <div class="social_item" style="display: flex; align-items: center; padding-bottom: 8px; font-weight: bold;">
                                    <img style="border: #111 2px solid; border-radius: 50%;" src="/images/telega.svg" alt="" loading="lazy">
                                    <span style="padding: 0 0 0 9px; font-size: 14px; line-height: 1em;">
                                        Читайте нас у Telegram. Підписуйтесь на наш канал
                                        <a href="{{ $telegramLink }}" target="_blank" style="color: #ed1e24; border-bottom: #ed1e24 1px dashed;">
                                            "Говорить великий Львів"
                                        </a>
                                    </span>
                                </div>
                            @endif

                            @if($facebookLink = getSetting('facebook_link'))
                                <div class="social_item" style="display: flex; align-items: center; padding-bottom: 8px; font-weight: bold;">
                                    <img style="/* border: #111 2px solid; */border-radius: 50%;width: 35px;height: 35px;" alt="" data-src="/images/facebook.png" class=" lazyloaded" src="https://nta.ua/facebook.png">
                                    <noscript><img style="border: #111 2px solid; border-radius: 50%;" src="/images/facebook.png" alt=""></noscript>
                                    <span style="padding: 0 0 0 9px; font-size: 14px; line-height: 1em; font-weight: bold;">Підписуйтеся на
                                        <a href="{{ $facebookLink }}" target="_blank" style="color: #ed1e24; border-bottom: #ed1e24 1px solid;">
                                            нашу сторінку у Facebook
                                        </a>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="other-news">
                        <div class="title title_left">Інші новини</div>
                        <div class="other-news__list">
                            @widget('SimilarNews', ['news_id' => $news->id])
                        </div>
                    </div>

                </div>
            </div>
            <aside class="main__aside aside aside_left" id="aside" style="">
                <aside id="news-widget-2" class="aside__widget widget lastnews">
                    @widget('recentNews')
                </aside>

                @if(($link = getSetting(\App\Models\Setting::SPECIAL_BLOCK_LINK)) && ($image = getSetting(\App\Models\Setting::SPECIAL_BLOCK_IMAGE)))
                    <aside class="widget_text aside__widget widget widget_custom_html">
                        <div class="textwidget custom-html-widget">
                            <a href="{{ $link }}" class="live-link" style="padding: 0px">
                                <img src="{{ $image }}" alt="" class="live-link__logo" loading="lazy" style="width: 100%">
                            </a>
                        </div>
                    </aside>
                @endif
            </aside>
        </div>
    </main>

{{--    <script>--}}
{{--        var ENDPOINT = "{{ route('loader-news') }}";--}}
{{--        var page = 1;--}}
{{--        var ajaxproces = false;--}}
{{--        var lastNewId = '{{ $news->id }}';--}}

{{--        $(document).ready(function(){--}}
{{--            $(".gallery-block").each(function() {--}}
{{--                $(this).unitegallery();--}}
{{--            });--}}

{{--            $(document).on('click', '#copy-link', function(){--}}
{{--                var $temp = $("<input>");--}}
{{--                $("body").append($temp);--}}
{{--                $temp.val('{{ $news->getUrl() }}').select();--}}
{{--                document.execCommand("copy");--}}
{{--                $temp.remove();--}}
{{--                alert('Посилання успішно скопійовано у буфер обміну')--}}
{{--            });--}}
{{--        })--}}

{{--        $(window).scroll(function () {--}}
{{--            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 20)) {--}}
{{--                page++;--}}
{{--                infinteLoadMore(page);--}}
{{--            }--}}
{{--        });--}}
{{--        function infinteLoadMore(page) {--}}
{{--        if ((ajaxproces == true) || (lastNewId == 0)) {--}}
{{--            return ;--}}
{{--        }--}}
{{--            ajaxproces = true--}}
{{--            $.ajax({--}}
{{--                url: ENDPOINT,--}}
{{--                data:{--}}
{{--                    lastNewId: lastNewId,--}}
{{--                    "_token": "{{ csrf_token() }}"--}}
{{--                },--}}
{{--                datatype: "html",--}}
{{--                type: "get",--}}
{{--                beforeSend: function () {--}}
{{--                    $('.auto-load').show();--}}
{{--                }--}}
{{--            })--}}
{{--                .done(function (response) {--}}
{{--                    lastNewId = response['newsId'];--}}
{{--                    ajaxproces = false;--}}
{{--                    if (response.html == '') {--}}
{{--                        $('.auto-load').html('');--}}
{{--                        return;--}}
{{--                    }--}}

{{--                    $('.auto-load').hide();--}}
{{--                    $(".data-loader").append(response.html);--}}
{{--                })--}}
{{--                .fail(function (jqXHR, ajaxOptions, thrownError) {--}}
{{--                    ajaxproces = false;--}}
{{--                    console.log('Server error occured');--}}
{{--                });--}}
{{--        }--}}

{{--    </script>--}}

{{--    <script type="application/ld+json">--}}
{{--        {--}}
{{--          "@context": "https://schema.org",--}}
{{--          "@type": "NewsArticle",--}}
{{--          "mainEntityOfPage": {--}}
{{--            "@type": "WebPage",--}}
{{--            "@id": "{{ $news->getUrl() }}"--}}
{{--          },--}}
{{--          "headline": "{{ $news->getTitle() }}",--}}
{{--          "description": "{{ $news->getMetaDescription() }}",--}}
{{--          "image": "{{ $news->getImageUrl() }}",--}}
{{--          "author": {--}}
{{--            "@type": "Person",--}}
{{--            "name": "{{ $author ? $author->getFullName() : '' }}",--}}
{{--            "url": "{{ $author ? $author->getUrl() : '' }}"--}}
{{--          },--}}
{{--          "publisher": {--}}
{{--            "@type": "Organization",--}}
{{--            "name": "Інформаційне агентство Король Данило",--}}
{{--            "logo": {--}}
{{--              "@type": "ImageObject",--}}
{{--              "url": "{{ asset('/img/KD-Logo-UA-FIN-01.png') }}"--}}
{{--            }--}}
{{--          },--}}
{{--          "datePublished": "{{ $news->getPublicationDate(false, 'Y-m-d') }}",--}}
{{--          "dateModified": "{{ $news->getPublicationDate(false, 'Y-m-d') }}"--}}
{{--        }--}}
{{--    </script>--}}

@endsection
