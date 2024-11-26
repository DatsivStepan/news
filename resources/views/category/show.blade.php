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
            {{ Breadcrumbs::render('category' , $category) }}
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
            </aside>
        </div>
    </main>
@endsection
