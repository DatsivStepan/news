@extends('layouts.app')

@section('content')

    <br><div class="container">
        <div class="row">
            <div class="col-sm-3">
                <hr>
                <h3>Стрічка новин</h3>
                <hr>
                @widget('recentNews')
            </div>
            <div class="col-sm-9">
                <div class="row">
                    @foreach($sliderNews as $key => $slide)
                        @if ($key == 0)
                            <div class="col-sm-12" style="margin-bottom: 15px">
                                <a  href="{{$slide->news->getUrl()}}" style="text-decoration: none; color:black">
                                    <div class="category">
                                        <img class="card-img-top" src="{{ $slide->news->getImageUrl() }}"  width="200" height="400" alt="Card image cap" title=";ddfdf"/>
                                        <div style="background-color:coral "class="top-left">{{ $slide->getcategoryName() }}</div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $slide->news->title }}</h5>
                                            <p class="card-text">{{ $slide->news->mini_description }}</p>
                                            <b>Джерело :</b> {{ $slide->news->subtitle }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @elseif(in_array($key, [1,2,3]))
                            <div class="col-sm-4">
                                <a href="{{$slide->news->getUrl()}}" style="text-decoration: none; color:black">
                                    <div class="category">
                                        <img class="card-img-top" src="{{ $slide->news->getImageUrl() }}" width="200" height="200" alt="Card image cap">
                                        <div style="background-color:coral "class="top-left">{{ $slide->getcategoryName() }}</div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $slide->news->title }}</h5>
                                            <p class="card-text">{{ $slide->news->mini_description }}</p>
                                            <b>Джерело :</b> {{ $slide->news->subtitle }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @if ($mainBlock)
                <div class="col-sm-12" style="margin-bottom: 15px">
                    <a  href="{{$mainBlock->getUrl()}}" style="text-decoration: none; color:black">
                        <div class="category">
                            <img class="card-img-top" src="{{ $mainBlock->getImageUrl() }}"  width="200" height="400" alt="Card image cap" title=";ddfdf"/>
                            <div style="background-color:coral "class="top-left">{{ $mainBlock->getCategoryName()}}</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $mainBlock->title }}</h5>
                                <b>Джерело :</b> {{ $mainBlock->subtitle }}
                                {{--<p class="card-text">{{ $mainBlock->mini_description }}</p>--}}
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if ($mainBlocktwo)
                @foreach($mainBlocktwo as $news)
                    <div class="col-sm-6">
                        <a href="{{ $news->getUrl() }}" style="text-decoration: none; color:black">
                            <div class="category">
                                <div style="background-color:coral "class="top-left">{{ $news->getcategoryName() }}</div>
                                <img class="card-img-top" src="{{ $news->getImageUrl() }}" width="200" height="200" alt="Card image cap">
                                <div style="background-color:coral" class="top-left"></div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $news->title }}</h5>
                                    <p class="card-text"></p>
                                    <b>Джерело :</b> {{ $news->subtitle }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
