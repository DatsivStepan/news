@extends('layouts.app')

@section('template_title')

@endsection

@section('content')
    <main class="main">
        <div class="content">
            {{ Breadcrumbs::render('category' , $category) }}
        </div>

        <div class="content main__row">
            <div class="main__content main__content_pt" id="main">
                <h1 class="title">НОВИНИ</h1>
                <div class="lastnews cat-news">
                    <div class="lastnews__list news">
                        @include('news.parts._news-full-width',['date' => ''])
                    </div>
                </div>
            </div>
{{--            <aside class="main__aside aside" id="aside" style="">--}}
{{--                <aside id="top-articles-widget-2" class="aside__widget widget top-articles-widget">--}}
{{--                    @widget('recentNews')--}}
{{--                </aside>--}}
{{--            </aside>--}}
            <aside class="main__aside aside" id="aside" style="">
                <aside id="top-articles-widget-2" class="aside__widget widget top-articles-widget"><div class="widget-title">Статті</div><div class="article-item"><a href="https://www.nta.ua/udar-po-ternopolyu-dali-lviv-informaczijnyj-strim/" class="article-thumb"><img width="400" height="225" src="https://www.nta.ua/wp-content/uploads/2024/11/5923539459679303176-400x225.jpg" class="attachment-medium size-medium wp-post-image" alt="5923539459679303176" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/11/5923539459679303176-400x225.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/11/5923539459679303176-1024x576.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/11/5923539459679303176-200x113.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/11/5923539459679303176-768x432.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/11/5923539459679303176.jpg 1280w" sizes="(max-width: 400px) 100vw, 400px" title="Удар по Тернополю. Далі Львів? - Інформаційний стрім 14" loading="lazy"></a><div class="article-entry">
                            <div class="article-title"><a href="https://www.nta.ua/udar-po-ternopolyu-dali-lviv-informaczijnyj-strim/">Удар по Тернополю. Далі Львів? – Інформаційний стрім</a></div>
                        </div>
                    </div><div class="article-item"><a href="https://www.nta.ua/koly-demobilizacziya-vidpovid-narodnogo-deputata/" class="article-thumb"><img width="400" height="225" src="https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n-400x225.jpg" class="attachment-medium size-medium wp-post-image" alt="462645494 2293652817678484 7445686377461554990 n" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n-400x225.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n-1024x576.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n-200x113.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n-768x432.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n-1536x864.jpg 1536w, https://www.nta.ua/wp-content/uploads/2024/11/462645494_2293652817678484_7445686377461554990_n.jpg 1920w" sizes="(max-width: 400px) 100vw, 400px" title="Коли демобілізація: відповідь народного депутата 15" loading="lazy"></a><div class="article-entry">
                            <div class="article-title"><a href="https://www.nta.ua/koly-demobilizacziya-vidpovid-narodnogo-deputata/">Коли демобілізація: відповідь народного депутата</a></div>
                        </div>
                    </div><div class="article-item"><a href="https://www.nta.ua/motoroshne-dtp-bilya-vinnyczi-zagynulo-shestero-lyudej-z-yakyh-dvoye-nepovnolitni/" class="article-thumb"><img width="400" height="300" src="https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3-400x300.jpg" class="attachment-medium size-medium wp-post-image" alt="eccbc87e4b5ce2fe28308fd9f2a7baf3" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3-400x300.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3-1024x768.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3-200x150.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3-768x576.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3-1536x1152.jpg 1536w, https://www.nta.ua/wp-content/uploads/2024/10/eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg 1600w" sizes="(max-width: 400px) 100vw, 400px" title="Моторошна ДТП біля Вінниці: загинуло шестеро людей, з яких двоє – неповнолітні 16" loading="lazy"></a><div class="article-entry">
                            <div class="article-title"><a href="https://www.nta.ua/motoroshne-dtp-bilya-vinnyczi-zagynulo-shestero-lyudej-z-yakyh-dvoye-nepovnolitni/">Моторошна ДТП біля Вінниці: загинуло шестеро людей, з яких двоє – неповнолітні</a></div>
                        </div>
                    </div></aside><aside id="custom_html-13" class="widget_text aside__widget widget widget_custom_html"><div class="widget-title">банер прямий ефір</div><div class="textwidget custom-html-widget"><a href="http://nta.ua/%d0%bd%d0%b0%d0%b6%d0%b8%d0%b2%d0%be/" class="live-link">
                            <img src="http://nta.ua/wp-content/themes/nta/images/logo/logo-nta-2.svg" alt="" class="live-link__logo" loading="lazy">
                            <span class="live-link__text">Прямий <span>ефір</span></span>
                        </a></div></aside>    </aside>
        </div>


    </main>

{{--    <h1 class="text-center news-category-title">--}}
{{--        {{ 'Новини' }}--}}
{{--    </h1>--}}

    {{--    @include('layouts.filterMenu')--}}

{{--    <div class="container">--}}
{{--        <div class="row home-content">--}}
{{--            <div class="col-xl-3 col-lg-3 d-sm-none d-none d-md-none">--}}
{{--                <div class="main-widget-left">--}}
{{--                    @widget('recentNews')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                <div class="news row all-new-list">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<br>
    @if($news->hasMorePages())
        <div class="more text-center">
            <button class="btn btn-success load-more-data">Переглянути більше</button>
        </div>
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var ENDPOINT = "{{ route('allNews') }}";
        var page = 1;
        var type = '{{$_GET['type'] ?? ''}}'
        $(".load-more-data").click(function () {
            page++;
            infinteLoadMore(page);
        });

        function infinteLoadMore(page) {
            var date = $('.date-news').last().data('date');
            $.ajax({
                url: ENDPOINT + "?page=" + page,
                data: {
                    type: type,
                    date: date,
                    "_token": "{{ csrf_token() }}"
                },
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();

                }
            })
                .done(function (response) {
                    if (!response.pagin) {
                        $('.more').remove();
                    }
                    $('.auto-load').hide();
                    $(".news").append(response.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>

@endsection

