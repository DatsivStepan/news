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
                    <a property="item" typeof="WebPage" title="Go to НТА." href="https://www.nta.ua" class="home">
                        <span property="name">НТА</span>
                    </a>
                    <meta property="position" content="1">
                </span> &gt;
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to the НОВИНИ category archives." href="https://www.nta.ua/news/" class="taxonomy category">
                        <span property="name">НОВИНИ</span>
                    </a>
                    <meta property="position" content="2">
                </span> &gt;
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to the Суспільство category archives." href="https://www.nta.ua/news/suspilstvo-news/" class="taxonomy category">
                        <span property="name">Суспільство</span>
                    </a>
                    <meta property="position" content="3">
                </span> &gt;
                <span property="itemListElement" typeof="ListItem">
                    <span property="name" class="post post-post current-item">
                        Збитки довкіллю України за 1000 днів війни: назвали суму
                    </span>
                    <meta property="url" content="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/">
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
                        <span class="single__date date-info"><time datetime="">{{ $news->getPublicationDate() }}</time></span>
                        <div class="single__view view-info icon-view nr-views-556530">103</div>
                        <a href="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/#respond" class="single__comments comments-info icon-comment">
                            <span class="fb-comments-count" data-href="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/"></span>
                        </a>
                        <div class="single__share">
                            <div class="addtoany_shortcode">
                                <div class="a2a_kit a2a_kit_size_40 addtoany_list" data-a2a-url="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/" data-a2a-title="Збитки довкіллю України за 1000 днів війни: назвали суму" style="line-height: 40px;">
                                    <a class="a2a_button_facebook" href="/#facebook" title="Facebook" rel="nofollow noopener" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(8, 102, 255); width: 40px; line-height: 40px; height: 40px; background-size: 40px; border-radius: 6px;">
                                            <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path fill="#fff" d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16c0 5.628 3.875 10.35 9.101 11.647v-7.98h-2.474V16H13.1v-1.58c0-4.085 1.849-5.978 5.859-5.978.76 0 2.072.15 2.608.298v3.325c-.283-.03-.775-.045-1.386-.045-1.967 0-2.728.745-2.728 2.683V16h3.92l-.673 3.667h-3.247v8.245C23.395 27.195 28 22.135 28 16"></path>
                                            </svg>
                                        </span>
                                        <span class="a2a_label">Facebook</span>
                                    </a>
                                    <a class="a2a_button_twitter" href="/#twitter" title="Twitter" rel="nofollow noopener" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(29, 155, 240); width: 40px; line-height: 40px; height: 40px; background-size: 40px; border-radius: 6px;">
                                            <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path fill="#FFF" d="M28 8.557a10 10 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.7 9.7 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.94 4.94 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a5 5 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174q-.476-.001-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.9 9.9 0 0 1-6.114 2.107q-.597 0-1.175-.068a13.95 13.95 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013q0-.32-.015-.637c.96-.695 1.795-1.56 2.455-2.55z"></path>
                                            </svg>
                                        </span>
                                        <span class="a2a_label">Twitter</span>
                                    </a>
                                    <a class="a2a_button_telegram" href="/#telegram" title="Telegram" rel="nofollow noopener" target="_blank">
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
                            <div class="wpra-reactions-wrap wpra-plugin-container wpra-regular wpra-rendered" style="justify-content: center;;">
                                <div class="wpra-reactions-container" data-ver="2.6.26" data-layout="regular" data-bind_id="556530" data-show_count="true" data-count_percentage="false" data-enable_share="onclick" data-animation="on_hover" data-ontop_align="" data-align="center" data-flying_type="label" data-react_secure="af65ff8a79" data-share_secure="81a58ea170" data-source="global">        <div class="wpra-call-to-action" style="color:#000000;font-size:25px;font-weight:600;display:block;">Оцініть новину</div>        <div class="wpra-reactions size-60px wpra-static-emojis wpra-shadow-light" style="border-color:#ffffff;border-width:0px;border-radius:50px;border-style:solid;background:transparent;">			                <div class="emoji-64 wpra-reaction" data-count="0" data-emoji_id="64">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Клас!</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/64.svg?v=2.6.26" alt="64.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 2" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="64" style="display: none;"></div>	</div>                </div>			                <div class="emoji-11 wpra-reaction" data-count="0" data-emoji_id="11">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Я це люблю</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/11.svg?v=2.6.26" alt="11.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 3" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="11" style="display: none;"></div>	</div>                </div>			                <div class="emoji-5 wpra-reaction" data-count="0" data-emoji_id="5">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Ха-ха</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/5.svg?v=2.6.26" alt="5.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 4" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="5" style="display: none;"></div>	</div>                </div>			                <div class="emoji-26 wpra-reaction" data-count="0" data-emoji_id="26">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Сумно</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/26.svg?v=2.6.26" alt="26.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 5" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="26" style="display: none;"></div>	</div>                </div>			                <div class="emoji-29 wpra-reaction" data-count="0" data-emoji_id="29">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Злість</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/29.svg?v=2.6.26" alt="29.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 6" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="29" style="display: none;"></div>	</div>                </div>			                <div class="emoji-36 wpra-reaction" data-count="0" data-emoji_id="36">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Обіймашки</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/36.svg?v=2.6.26" alt="36.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 7" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="36" style="display: none;"></div>	</div>                </div>			                <div class="emoji-35 wpra-reaction" data-count="0" data-emoji_id="35">                    <div class="wpra-flying" style="color:#000000;font-size:16px;font-weight:300;">Шооо?</div>					                        <div style="background-color: #ff0015" class="arrow-badge arrow-bottom-left hide-count">                            <span style="border-top-color: #ff0015" class="tail"></span>                            <span style="color: #ffffff" class="count-num">0</span>                        </div>					<div class="wpra-reaction-emoji">	        <div class="wpra-reaction-emoji-holder wpra-reaction-static-holder">            <img decoding="async" src="https://www.nta.ua/wp-content/plugins/wpreactions-pro/assets/emojis/svg/35.svg?v=2.6.26" alt="35.svg?v=2.6" title="Збитки довкіллю України за 1000 днів війни: назвали суму 8" loading="lazy">        </div>        <div class="wpra-reaction-emoji-holder wpra-reaction-animation-holder" data-emoji_id="35" style="display: none;"></div>	</div>                </div>			        </div>		    <div class="wpra-share-wrap wpra-share-expandable" style="display:none;">		            <div class="wpra-share-expandable-counts" style="font-size:30px;font-weight:700;color:#000000;">                <span>0</span>                <span>Shares</span>            </div>		        <div class="wpra-share-buttons  wpra-share-buttons-bordered">			        <a class="share-btn share-btn-facebook" data-platform="facebook" style="border-radius: 5px;">            <span class="share-btn-icon"><svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve" fill="#3b5998"><path fill-rule="evenodd" clip-rule="evenodd" d="M78.02,187.7l35.12,0l0-87.94l24.5,0l2.61-29.44l-27.11,0c0,0,0-11,0-16.77	c0-6.94,1.39-9.69,8.11-9.69c5.4,0,19.01,0,19.01,0V13.3c0,0-20.04,0-24.32,0c-26.13,0-37.91,11.51-37.91,33.54	c0,19.19,0,23.48,0,23.48l-18.27,0l0,29.82l18.27,0L78.02,187.7z"></path></svg></span>            <span class="share-btn-text">Facebook</span>        </a>		        <a class="share-btn share-btn-twitter" data-platform="twitter" style="border-radius: 5px;">            <span class="share-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve" fill="#00acee"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.45,159.41c17.17,11.01,37.56,17.43,59.47,17.43c72.03,0,112.73-60.84,110.28-115.41	c7.57-5.46,14.16-12.3,19.36-20.08c-6.96,3.09-14.44,5.17-22.28,6.11c8.01-4.79,14.16-12.39,17.05-21.46	c-7.49,4.45-15.8,7.68-24.63,9.42c-7.08-7.54-17.16-12.26-28.32-12.26c-25.04,0-43.45,23.37-37.79,47.64	c-32.25-1.62-60.83-17.07-79.96-40.54C8.45,47.7,13.34,70.52,30.63,82.06c-6.37-0.2-12.35-1.95-17.58-4.86	c-0.42,17.98,12.46,34.79,31.12,38.53c-5.47,1.49-11.45,1.82-17.51,0.66c4.92,15.42,19.25,26.63,36.23,26.94	C46.58,156.13,26.03,161.84,5.45,159.41z"></path></svg></span>            <span class="share-btn-text">Twitter</span>        </a>		        <a class="share-btn share-btn-gmail" data-platform="gmail" style="border-radius: 5px;">            <span class="share-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#D44638">    <g id="Page-1" fill-rule="evenodd">        <g stroke="null" id="gmail">            <path stroke="null" d="m17.343889,3.068752l-14.638252,0c-1.00638,0 -1.829782,0.784091 -1.829782,1.742424l0,10.454546c0,0.958333 0.823402,1.742424 1.829782,1.742424l14.638252,0c1.00638,0 1.829782,-0.784091 1.829782,-1.742424l0,-10.454546c0,-0.958333 -0.823402,-1.742424 -1.829782,-1.742424l0,0zm0,12.19697l-1.829782,0l0,-7.666667l-5.489345,3.310606l-5.489345,-3.310606l0,7.666667l-1.829782,0l0,-10.454546l1.097869,0l6.221257,3.659091l6.221257,-3.659091l1.097869,0l0,10.454546l0,0z"></path>        </g>    </g></svg></span>            <span class="share-btn-text">Gmail</span>        </a>		        <a class="share-btn share-btn-pinterest" data-platform="pinterest" style="border-radius: 5px;">            <span class="share-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve" fill="#bd081c"><path id="wpra_pinterest_icon" d="M51.7,118.02c2.36,0.96,4.47,0.04,5.15-2.57c0.48-1.81,1.6-6.37,2.1-8.27	c0.69-2.59,0.42-3.49-1.48-5.73c-4.14-4.9-6.79-11.23-6.79-20.2c0-26.02,19.47-49.31,50.7-49.31c27.65,0,42.84,16.9,42.84,39.47	c0,29.68-13.14,54.74-32.64,54.74c-10.78,0-18.84-8.91-16.26-19.83c3.1-13.04,9.09-27.13,9.09-36.54c0-8.43-4.52-15.46-13.89-15.46	c-11.01,0-19.86,11.4-19.86,26.66c0,9.72,3.29,16.3,3.29,16.3s-11.27,47.75-13.25,56.11c-3.93,16.65-0.59,37.06-0.31,39.12	c0.17,1.23,1.74,1.51,2.45,0.6c1.02-1.33,14.13-17.53,18.59-33.7c1.26-4.58,7.25-28.3,7.25-28.3c3.57,6.82,14.03,12.83,25.15,12.83	c33.1,0,55.56-30.17,55.56-70.57c0-30.54-25.87-58.99-65.19-58.99c-48.93,0-73.59,35.07-73.59,64.32	C30.61,96.4,37.31,112.16,51.7,118.02z"></path></svg></span>            <span class="share-btn-text">Pinterest</span>        </a>		        <a class="share-btn share-btn-messenger" data-platform="messenger" style="border-radius: 5px;">            <span class="share-btn-icon"><svg style="enable-background:new 0 0 56.7 56.7;" viewBox="0 0 56.7 56.7" fill="#0078FF" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">        <g>            <path d="M28.4342,3.8416c-13.4521,0-24.3571,10.1599-24.3571,22.693c0,7.1415,3.5419,13.5115,9.0772,17.6713v8.6525l8.2934-4.5799    c2.2133,0.6163,4.5581,0.949,6.9866,0.949c13.4521,0,24.3571-10.1599,24.3571-22.693S41.8863,3.8416,28.4342,3.8416z     M30.8548,34.4015l-6.2027-6.6566l-12.1029,6.6566l13.3132-14.2209l6.354,6.6566l11.9516-6.6566L30.8548,34.4015z"></path>        </g></svg></span>            <span class="share-btn-text">Messenger</span>        </a>		        <a class="share-btn share-btn-telegram" data-platform="telegram" style="border-radius: 5px;">            <span class="share-btn-icon"><svg viewBox="0 0 570 570" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill="#0088cc">    <g fill-rule="evenodd">        <path d="m51.328,253.722l291.59,-125.6c138.856,-57.755 167.708,-67.787 186.514,-68.118c4.137,-0.073 13.385,0.952 19.375,5.813c5.06,4.104 6.45,9.65 7.117,13.54s1.495,12.757 0.836,19.684c-7.525,79.06 -40.084,270.924 -56.648,359.474c-7.01,37.47 -20.8,50.033 -34.17,51.262c-29.036,2.672 -51.085,-19.19 -79.208,-37.624l-111.584,-74.953c-49.366,-32.53 -17.364,-50.41 10.77,-79.63c7.362,-7.65 135.295,-124.014 137.77,-134.57c0.3,-1.32 0.597,-6.24 -2.326,-8.84s-7.24,-1.7 -10.353,-1.003c-4.413,1.002 -74.714,47.468 -210.902,139.4c-19.955,13.703 -38.03,20.38 -54.223,20.03c-17.853,-0.386 -52.194,-10.094 -77.723,-18.393c-31.313,-10.178 -56.2,-15.56 -54.032,-32.846c1.128,-9.003 13.527,-18.21 37.196,-27.624l0.001,-0.002z"></path>    </g></svg></span>            <span class="share-btn-text">Telegram</span>        </a>					                <div class="wpra-share-expandable-popup">                    <div class="wpra-share-popup-overlay"></div>                    <div class="wpra-share-popup">                        <span class="wpra-share-popup-close">×</span>                        <h3>Share this post!</h3>                        <div class="wpra-share-buttons">							        <a class="share-btn share-btn-facebook" data-platform="facebook" style="border-radius: 5px;">            <span class="share-btn-icon"><svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve" fill="#3b5998"><path fill-rule="evenodd" clip-rule="evenodd" d="M78.02,187.7l35.12,0l0-87.94l24.5,0l2.61-29.44l-27.11,0c0,0,0-11,0-16.77	c0-6.94,1.39-9.69,8.11-9.69c5.4,0,19.01,0,19.01,0V13.3c0,0-20.04,0-24.32,0c-26.13,0-37.91,11.51-37.91,33.54	c0,19.19,0,23.48,0,23.48l-18.27,0l0,29.82l18.27,0L78.02,187.7z"></path></svg></span>            <span class="share-btn-text">Facebook</span>        </a>		        <a class="share-btn share-btn-twitter" data-platform="twitter" style="border-radius: 5px;">            <span class="share-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve" fill="#00acee"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.45,159.41c17.17,11.01,37.56,17.43,59.47,17.43c72.03,0,112.73-60.84,110.28-115.41	c7.57-5.46,14.16-12.3,19.36-20.08c-6.96,3.09-14.44,5.17-22.28,6.11c8.01-4.79,14.16-12.39,17.05-21.46	c-7.49,4.45-15.8,7.68-24.63,9.42c-7.08-7.54-17.16-12.26-28.32-12.26c-25.04,0-43.45,23.37-37.79,47.64	c-32.25-1.62-60.83-17.07-79.96-40.54C8.45,47.7,13.34,70.52,30.63,82.06c-6.37-0.2-12.35-1.95-17.58-4.86	c-0.42,17.98,12.46,34.79,31.12,38.53c-5.47,1.49-11.45,1.82-17.51,0.66c4.92,15.42,19.25,26.63,36.23,26.94	C46.58,156.13,26.03,161.84,5.45,159.41z"></path></svg></span>            <span class="share-btn-text">Twitter</span>        </a>		        <a class="share-btn share-btn-gmail" data-platform="gmail" style="border-radius: 5px;">            <span class="share-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#D44638">    <g id="Page-1" fill-rule="evenodd">        <g stroke="null" id="gmail">            <path stroke="null" d="m17.343889,3.068752l-14.638252,0c-1.00638,0 -1.829782,0.784091 -1.829782,1.742424l0,10.454546c0,0.958333 0.823402,1.742424 1.829782,1.742424l14.638252,0c1.00638,0 1.829782,-0.784091 1.829782,-1.742424l0,-10.454546c0,-0.958333 -0.823402,-1.742424 -1.829782,-1.742424l0,0zm0,12.19697l-1.829782,0l0,-7.666667l-5.489345,3.310606l-5.489345,-3.310606l0,7.666667l-1.829782,0l0,-10.454546l1.097869,0l6.221257,3.659091l6.221257,-3.659091l1.097869,0l0,10.454546l0,0z"></path>        </g>    </g></svg></span>            <span class="share-btn-text">Gmail</span>        </a>		        <a class="share-btn share-btn-pinterest" data-platform="pinterest" style="border-radius: 5px;">            <span class="share-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve" fill="#bd081c"><path id="wpra_pinterest_icon" d="M51.7,118.02c2.36,0.96,4.47,0.04,5.15-2.57c0.48-1.81,1.6-6.37,2.1-8.27	c0.69-2.59,0.42-3.49-1.48-5.73c-4.14-4.9-6.79-11.23-6.79-20.2c0-26.02,19.47-49.31,50.7-49.31c27.65,0,42.84,16.9,42.84,39.47	c0,29.68-13.14,54.74-32.64,54.74c-10.78,0-18.84-8.91-16.26-19.83c3.1-13.04,9.09-27.13,9.09-36.54c0-8.43-4.52-15.46-13.89-15.46	c-11.01,0-19.86,11.4-19.86,26.66c0,9.72,3.29,16.3,3.29,16.3s-11.27,47.75-13.25,56.11c-3.93,16.65-0.59,37.06-0.31,39.12	c0.17,1.23,1.74,1.51,2.45,0.6c1.02-1.33,14.13-17.53,18.59-33.7c1.26-4.58,7.25-28.3,7.25-28.3c3.57,6.82,14.03,12.83,25.15,12.83	c33.1,0,55.56-30.17,55.56-70.57c0-30.54-25.87-58.99-65.19-58.99c-48.93,0-73.59,35.07-73.59,64.32	C30.61,96.4,37.31,112.16,51.7,118.02z"></path></svg></span>            <span class="share-btn-text">Pinterest</span>        </a>		        <a class="share-btn share-btn-messenger" data-platform="messenger" style="border-radius: 5px;">            <span class="share-btn-icon"><svg style="enable-background:new 0 0 56.7 56.7;" viewBox="0 0 56.7 56.7" fill="#0078FF" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">        <g>            <path d="M28.4342,3.8416c-13.4521,0-24.3571,10.1599-24.3571,22.693c0,7.1415,3.5419,13.5115,9.0772,17.6713v8.6525l8.2934-4.5799    c2.2133,0.6163,4.5581,0.949,6.9866,0.949c13.4521,0,24.3571-10.1599,24.3571-22.693S41.8863,3.8416,28.4342,3.8416z     M30.8548,34.4015l-6.2027-6.6566l-12.1029,6.6566l13.3132-14.2209l6.354,6.6566l11.9516-6.6566L30.8548,34.4015z"></path>        </g></svg></span>            <span class="share-btn-text">Messenger</span>        </a>		        <a class="share-btn share-btn-telegram" data-platform="telegram" style="border-radius: 5px;">            <span class="share-btn-icon"><svg viewBox="0 0 570 570" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill="#0088cc">    <g fill-rule="evenodd">        <path d="m51.328,253.722l291.59,-125.6c138.856,-57.755 167.708,-67.787 186.514,-68.118c4.137,-0.073 13.385,0.952 19.375,5.813c5.06,4.104 6.45,9.65 7.117,13.54s1.495,12.757 0.836,19.684c-7.525,79.06 -40.084,270.924 -56.648,359.474c-7.01,37.47 -20.8,50.033 -34.17,51.262c-29.036,2.672 -51.085,-19.19 -79.208,-37.624l-111.584,-74.953c-49.366,-32.53 -17.364,-50.41 10.77,-79.63c7.362,-7.65 135.295,-124.014 137.77,-134.57c0.3,-1.32 0.597,-6.24 -2.326,-8.84s-7.24,-1.7 -10.353,-1.003c-4.413,1.002 -74.714,47.468 -210.902,139.4c-19.955,13.703 -38.03,20.38 -54.223,20.03c-17.853,-0.386 -52.194,-10.094 -77.723,-18.393c-31.313,-10.178 -56.2,-15.56 -54.032,-32.846c1.128,-9.003 13.527,-18.21 37.196,-27.624l0.001,-0.002z"></path>    </g></svg></span>            <span class="share-btn-text">Telegram</span>        </a>		        <a class="share-btn share-btn-email" data-platform="email" style="border-radius: 5px;">            <span class="share-btn-icon"><svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#424242">    <g fill-rule="evenodd" stroke="none" stroke-width="1">        <g transform="translate(-336.000000, 0.000000)">            <path d="M345.731959,8.48453617 L350.681755,12.7272182 C350.501681,12.8954635 350.259495,13 349.993155,13 L338.006845,13 C337.739189,13 337.496237,12.8970552 337.316068,12.7290845 L342.268041,8.48453617 L344,10.0000001 Z M344,9 L337.318245,3.27278178 C337.498319,3.10453648 337.740505,3 338.006845,3 L349.993155,3 C350.260811,3 350.503763,3.10294483 350.683932,3.27091553 Z M351,12.1856084 L346.167358,8.07885766 L351,3.875422 L351,12.1856084 L351,12.1856084 Z M337,12.1856079 L337,3.87815189 L341.832642,8.07885742 L337,12.1856079 L337,12.1856079 Z M337,12.1856079" id="Shape"></path>        </g>    </g></svg></span>            <span class="share-btn-text">Email</span>        </a>		                        </div>                    </div>                </div>			        </div>		            <div class="wpra-share-expandable-more" style="border-radius:5px;">                <i class="qa qa-share" title="More platforms"></i>            </div>		    </div>    </div> <!-- end of reactions container --></div> <!-- end of reactions wrap -->                </div>
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
                                <a id="linkk" href="https://t.me/newskoroldanylo" target="_blank" style="font-weight: bolder;">
                                    "Король Данило 👑 | Новини | Львів"
                                </a>
                            </p>
                        </div>

                        <div style="margin-top: 25px;">
                            <div class="social_item" style="display: flex; align-items: center; padding-bottom: 8px; font-weight: bold;">
                                <img style="border: #111 2px solid; border-radius: 50%;" src="https://nta.ua/telega.svg" alt="" loading="lazy">
                                <span style="padding: 0 0 0 9px; font-size: 14px; line-height: 1em;">
                                    Читайте нас у Telegram. Підписуйтесь на наш канал "
                                    <a href="https://t.me/newskoroldanylo" target="_blank" style="color: #ed1e24; border-bottom: #ed1e24 1px dashed;">
                                        "Король Данило 👑 | Новини | Львів"
                                    </a>"
                                </span>
                            </div>
                            <div class="social_item" style="display: flex; align-items: center; padding-bottom: 8px; font-weight: bold;">
                                <img style="/* border: #111 2px solid; */border-radius: 50%;width: 35px;height: 35px;" alt="" data-src="https://nta.ua/facebook.png" class=" lazyloaded" src="https://nta.ua/facebook.png">
                                <noscript><img style="border: #111 2px solid; border-radius: 50%;" src="https://nta.ua/facebook.png" alt=""></noscript>
                                <span style="padding: 0 0 0 9px; font-size: 14px; line-height: 1em; font-weight: bold;">Підписуйтеся на
                                    <a href="https://www.facebook.com/profile.php?id=61552278753518" target="_blank" style="color: #ed1e24; border-bottom: #ed1e24 1px solid;">
                                        нашу сторінку у Facebook
                                    </a>
                                </span>
                            </div>
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
