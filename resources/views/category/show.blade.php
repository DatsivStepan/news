@extends('layouts.app')

@section('pageTitle', $category->getMetaTitle())

@include('meta._tags', [
    'meta' => [
        'title' => $category->getMetaTitle(),
        'description' => $category->getMetaDescription()
    ]
])

@section('template_title')
    {{ $category->name }}
@endsection

@section('content')

    <main class="main">
        <div class="content">
            <div class="bread">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="/" class="home">
                        <span property="name">Головна сторінка</span>
                    </a>

                    @foreach($category->getParentsList() as $item)
                        ><span property="name" class="post post-post current-item">
                            <a href="{{$item['url']}}">{{$item['name']}}</a>
                        </span>
                    @endforeach

                </span>
            </div>
        </div>
        <div class="content main__row">
            <div class="main__content main__content_pt" id="main">
                <h1 class="title">{{$category->getName()}}</h1>
                <div class="news">
                        @include('news.parts._list-news')
                </div>
                {!! $news->links() !!}
            </div>
            <aside class="main__aside aside" id="aside">
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
@endsection
