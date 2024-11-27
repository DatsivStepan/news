@extends('layouts.app')

@section('meta_tags')
    <meta name="robots" content="noindex,nofollow,noarchive" />
@endsection

@section('template_title')

@endsection

@section('content')
<main class="main">
    <div class="content">
        <div class="bread">

            <!-- Breadcrumb NavXT 7.3.1 -->
            <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to НТА." href="https://www.nta.ua" class="home"><span property="name">НТА</span></a><meta property="position" content="1"></span> &gt; <span class="search current-item">Search results for 'Джон'</span></div>	   </div>



    <div class="content main__row">
        <div class="main__content main__content_pt" id="main">
            <h1 class="title">Результати пошуку для: <span>Джон</span></h1>

            <div class="news">
                @include('news.parts._news-search', ['type' => 1])
            </div>
            {!! $news->links() !!}
        </div>
        <aside class="main__aside aside" id="aside">
            <aside id="news-widget-2" class="aside__widget widget lastnews">
                @widget('recentNews')
            </aside>
        </aside>
    </div>
</main>


    @if($news->hasMorePages())
        <div class="more text-center">
            <button class="btn btn-success load-more-data">Переглянути більше</button>
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        var ENDPOINT = "{{ route('search') }}";
        var page = 1;
        var type = '{{$_GET['type'] ?? ''}}'

        $(".load-more-data").click(function () {
            page++;
            infinteLoadMore(page);
        });

        function infinteLoadMore(page) {

            $.ajax({
                url: ENDPOINT + "?page=" + page,
                data: {
                    type: type,
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

