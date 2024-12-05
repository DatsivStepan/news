@extends('layouts.app')

@section('template_title')

@endsection

@section('content')
    <main class="main">
        <div class="content">
            <div class="bread">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="Go to НТА." href="/" class="home">
                        <span property="name">НТА</span></a>
                </span> &gt;
                <span property="itemListElement" typeof="ListItem">
                    <span property="name" class="archive taxonomy category current-item">НОВИНИ</span>
                </span>
            </div>
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
            <aside class="main__aside aside" id="aside" style="">
                <aside id="top-articles-widget-2" class="aside__widget widget top-articles-widget">
                    @widget('recommendNews')
                </aside>

                @if(($link = getSetting(\App\Models\Setting::SPECIAL_BLOCK_LINK)) && ($image = getSetting(\App\Models\Setting::SPECIAL_BLOCK_IMAGE)))
                    <aside id="custom_html-13" class="widget_text aside__widget widget widget_custom_html">
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

