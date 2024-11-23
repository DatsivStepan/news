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
           <a class="back-home-btn mobile-hide" href="{{ route('/') }}"><spann class="arrow-left"></spann> Повернутися на головну</a>
    <!-- {{ Breadcrumbs::render('news' , $news) }} -->

    <div class="container">
        <div class="row home-content">
            <div class="col-xl-3 col-lg-3 d-sm-none d-none d-md-none d-lg-block d-xl-block">
                <div class="main-widget-left">
                    <h3 class="main-widget-title">Стрічка новин</h3>
                    @widget('recentNews')
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="row single-news-container">
                    <div class="category">
                        <img class="card-img-top" title="{{ $news->getTitle() }}" src="{{ $news->getImageUrl() }}" alt="{{ $news->getTitle() }}">
                        <div class="top-left"><div class="triangle">{{ $news->getCategoryName() }}</div></div>
                    </div>
                    <div class="singl-news-body">
                       <h1 class="single-news-title">
                            {{$news->getTitle()}}
                        </h1>
                        <div class="row single-news-author" style="font-size:18px;">
                            <i>{{ $news->getPublicationDate() }}</i>
                        </div>
                        @if(($author = $news->getAuthor()) && $news->isShowAuthor())
                            <div class="row single-news-author">
                                <i>Автор: <b><a href= {{ $author->getUrl() }}>{{ $author->getFullName() }}</a></b></i>
                            </div>
                        @endif
                        <div class="row d-lg-none d-xl-none">
                            <div id="social-links">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $news->getUrl() }}" class="social-button " id="" title="" rel="">
                                        <span class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?text=fd&amp;url={{ $news->getUrl() }}" class="social-button " id="" title="" rel="">
                                            <span class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://telegram.me/share/url?url={{ $news->getUrl() . '&text=' . $news->getTitle() }}" class="social-button " id="" title="" rel="">
                                            <span class="social-icon"><i class="fa fa-telegram" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="mailto:news-demo.space?subject={{$news->getTitle() }}&amp;body={{ $news->getUrl() }}" data-provider="" data-share-link="{{ $news->getUrl() }}" data-share-title="{{ $news->getTitle() }}" class="social-button " id="" title="" rel="">
                                            <span class="social-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="social-button" id="copy-link" title="" rel="">
                                            <span class="social-icon"><i class="fa fa-clone" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row single-news-description">
                            {!! $news->getDescription() !!}
                        </div>
                    </div>
                    <div class="row similar-news-container">
                        @widget('SimilarNews', ['news_id' => $news->id])
                    </div>

                    <div class="row single-news-tags">
                        <div class="btn-group">
                            {{ 'Теги :' }}
                            @foreach($news->tags as $tag)
                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                <a href='/tag-search?query={{ $tag->name }}'>{{ mb_strtoupper($tag->name) . ' '}}  </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="data-loader"></div>
{{--                    <div id="fb-root"></div>--}}
{{--                    <div class="fb-comments" data-href="{{ $news->getUrl() }}" data-width="100%" data-numposts="5"></div>--}}
                </div>
            </div>
        </div>


{{--        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
{{--        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v17.0&appId= 255331274088195&autoLogAppEvents=1" nonce="znv8STtW" ></script>--}}


    </div>

    <script>
        var ENDPOINT = "{{ route('loader-news') }}";
        var page = 1;
        var ajaxproces = false;
        var lastNewId = '{{ $news->id }}';

        $(document).ready(function(){
            $(".gallery-block").each(function() {
                $(this).unitegallery();
            });

            $(document).on('click', '#copy-link', function(){
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val('{{ $news->getUrl() }}').select();
                document.execCommand("copy");
                $temp.remove();
                alert('Посилання успішно скопійовано у буфер обміну')
            });
        })

        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 20)) {
                page++;
                infinteLoadMore(page);
            }
        });
        function infinteLoadMore(page) {
        if ((ajaxproces == true) || (lastNewId == 0)) {
            return ;
        }
            ajaxproces = true
            $.ajax({
                url: ENDPOINT,
                data:{
                    lastNewId: lastNewId,
                    "_token": "{{ csrf_token() }}"
                },
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
                .done(function (response) {
                    lastNewId = response['newsId'];
                    ajaxproces = false;
                    if (response.html == '') {
                        $('.auto-load').html('');
                        return;
                    }

                    $('.auto-load').hide();
                    $(".data-loader").append(response.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    ajaxproces = false;
                    console.log('Server error occured');
                });
        }

    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "NewsArticle",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ $news->getUrl() }}"
          },
          "headline": "{{ $news->getTitle() }}",
          "description": "{{ $news->getMetaDescription() }}",
          "image": "{{ $news->getImageUrl() }}",
          "author": {
            "@type": "Person",
            "name": "{{ $author ? $author->getFullName() : '' }}",
            "url": "{{ $author ? $author->getUrl() : '' }}"
          },
          "publisher": {
            "@type": "Organization",
            "name": "Інформаційне агентство Король Данило",
            "logo": {
              "@type": "ImageObject",
              "url": "{{ asset('/img/KD-Logo-UA-FIN-01.png') }}"
            }
          },
          "datePublished": "{{ $news->getPublicationDate(false, 'Y-m-d') }}",
          "dateModified": "{{ $news->getPublicationDate(false, 'Y-m-d') }}"
        }
    </script>

@endsection
