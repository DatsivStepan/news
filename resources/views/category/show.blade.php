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
    <a class="back-home-btn mobile-hide" href="{{ route('/') }}">
        <span class="arrow-left"></span> Повернутися на головну
    </a>

    {{ Breadcrumbs::render('category' , $category) }}

    <div class="container">
        <div class="row home-content">
        <h1 class="text-center news-category-title">
            {{$category->getName()}}
        </h1>
            <div class="col-xl-3 col-lg-3 d-sm-none d-none d-md-none d-xl-block d-lg-block">
                <div class="main-widget-left">
                    <h3 class="main-widget-title">Стрічка новин</h3>
                    @widget('recentNews')
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="news row">
                    @include('news.parts._list-news')
                </div>
                {!! $news->links() !!}
            </div>
        </div>
    </div>
@endsection
