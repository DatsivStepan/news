@extends('layouts.app')

@include('meta._tags')

@section('content')

    <div class="container mobile-hide">
        <div class="row home-content">
            <div class="content">
                @if($topNews)
                    <div class="home-importants">
                        <div class="row">
                            @if($topFirstNews = $topNews->first())
                                <div class="col-lg-6">
                                    <div class="newslist__item">
                                        <div class="newslist__thumb">
                                            <img width="1024" height="576"
                                                 src="{{ $topFirstNews->getImageUrl() }}"
                                                 class="attachment-large size-large wp-post-image"
                                                 alt="465590487 1227210765004364 8232227407550713649 n" decoding="async"
                                                 fetchpriority="high"
                                                 sizes="(max-width: 1024px) 100vw, 1024px"
                                                 title="{{ $topFirstNews->getTitle() }}">
                                            <a href="{{ $topFirstNews->getUrl() }}" class="newslist__link"></a>
                                            <span class="play-mask-reverse"></span>
                                        </div>
                                        <div class="newslist__content">
                                            <ul class="newslist__cat">
                                                <li><a href="{{ $topFirstNews->getCategory()->getUrl() }}">{{ $topFirstNews->getCategoryName() }}</a></li>
                                            </ul>
                                            <div class="newslist__title">
                                                <a href="{{ $topFirstNews->getUrl() }}">{{ $topFirstNews->getTitle() }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($topLstNews = $topNews->skip(1))
                                @foreach($topLstNews as $topLstNew)
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="article-item">
                                            <a href="{{ $topLstNew->getUrl() }}" class="article-thumb">
                                                <img width="400" height="326"
                                                  src="{{ $topLstNew->getImageUrl() }}"
                                                  class="attachment-medium size-medium wp-post-image"
                                                  alt="54423" decoding="async"
                                                  sizes="(max-width: 400px) 100vw, 400px"
                                                  title="{{ $topLstNew->getTitle() }}"
                                                  loading="lazy">
                                            </a>
                                            <div class="article-entry">
                                                <div class="article-title">
                                                    <a href="{{ $topLstNew->getUrl() }}">{{ $topLstNew->getTitle() }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="content">
                {!! $blockTopBanner !!}
            </div>

            <div class="content main__row">

                <aside class="main__aside aside">
                    <aside id="news-widget-3" class="aside__widget widget lastnews">
                        @widget('recentNews')
                    </aside>
                </aside>

                <div class="main__content">
                    <div class="newslist">
                        @foreach($sliderNews as $key => $slide)
                            @if ($key == 0)
                                <div class="newslist__item">
                                    <div class="newslist__thumb">
                                        <img width="1024" height="576"
                                             src="{{ $slide->news->getImageUrl() }}"
                                             class="attachment-large size-large wp-post-image" alt="5330364623100177813"
                                             decoding="async"
                                             sizes="(max-width: 1024px) 100vw, 1024px"
                                             title="{{ $slide->news->title }}" loading="lazy">
                                        <a href="{{$slide->news->getUrl()}}" class="newslist__link"></a>
                                        <span class="play-mask-reverse"></span>
                                    </div>
                                    <div class="newslist__content">
                                        <ul class="newslist__cat">
                                            <li><a href="{{ $slide->news->getCategory()->getUrl() }}">{{ $slide->news->getCategoryName() }}</a></li>
                                        </ul>
                                        <div class="newslist__title">
                                            <a href="{{$slide->news->getUrl()}}">{{ $slide->news->title }}</a></div>
                                        <div class="newslist__desc">
                                            {{ $slide->news->getShortDescription(150) }}
                                        </div>
                                    </div>
                                </div>
                            @elseif(in_array($key, [1,2]))
                                <div class="newslist__item">
                                    <div class="newslist__thumb">
                                        <img width="1024" height="576"
                                             src="{{ $slide->news->getImageUrl() }}"
                                             class="attachment-large size-large wp-post-image"
                                             alt="462645494 2293652817678484 7445686377461554990 n" decoding="async"
                                             sizes="(max-width: 1024px) 100vw, 1024px"
                                             title="{{ $slide->news->title }}" loading="lazy"> <a
                                            href="{{$slide->news->getUrl()}}"
                                            class="newslist__link"></a>
                                        <span class="play-mask-reverse"></span>
                                    </div>
                                    <div class="newslist__content">
                                        <ul class="newslist__cat">
                                            <li><a href="{{ $slide->news->getCategory()->getUrl() }}">{{ $slide->news->getCategoryName() }}</a></li>
                                        </ul>
                                        <div class="newslist__title">
                                            <a href="{{$slide->news->getUrl()}}">{{ $slide->news->title }}</a>
                                        </div>
                                        <div class="newslist__desc">
                                            {{ $slide->news->getShortDescription() }}
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    </div>

                    <div class="row">
                        @if($firstsCentralNews = $topCentralBlockNews->take(3))
                            <div class="col-md-8">
                                @if($firstsCentralNew = $firstsCentralNews->first())
                                    <div class="article-item article-big">
                                        <a href="{{ $firstsCentralNew->getUrl() }}" class="article-thumb">
                                            <img width="843" height="500"
                                                  src="{{ $firstsCentralNew->getImageUrl() }}"
                                                  class="attachment-large size-large wp-post-image"
                                                  alt="200 1" decoding="async"
                                                  sizes="(max-width: 843px) 100vw, 843px"
                                                  title="{{ $firstsCentralNew->getTitle() }}"
                                                  loading="lazy">
                                            <span class="cat-badge">{{ $firstsCentralNew->getCategoryName() }}</span>
                                        </a>
                                        <div class="article-entry">
                                            <div class="article-title">
                                                <a href="{{ $firstsCentralNew->getUrl() }}">
                                                    {{ $firstsCentralNew->getTitle() }}
                                                </a>
                                            </div>
                                            <div class="article-desc">
                                                {{ $firstsCentralNew->getShortDescription(150) }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    @if($lastsCentralNews = $firstsCentralNews->slice(1))
                                        @foreach($lastsCentralNews as $lastsCentralNew)
                                            <div class="col-sm-6">
                                                <div class="article-item">
                                                    <a href="{{ $lastsCentralNew->getUrl() }}" class="article-thumb">
                                                        <img width="400" height="225"
                                                              src="{{ $lastsCentralNew->getImageUrl() }}"
                                                              class="attachment-medium size-medium wp-post-image"
                                                              alt="shvydka" decoding="async"
                                                              sizes="(max-width: 400px) 100vw, 400px"
                                                              title="{{ $lastsCentralNew->getTitle() }}"
                                                              loading="lazy">
                                                        <span class="cat-badge">{{ $lastsCentralNew->getCategoryName() }}</span>
                                                    </a>
                                                    <div class="article-entry">
                                                        <div class="article-title">
                                                            <a href="{{ $lastsCentralNew->getUrl() }}">{{ $lastsCentralNew->getTitle() }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($lastCentralNews = $topCentralBlockNews->slice(3))
                            <div class="col-md-4">
                                <div class="row">
                                    @foreach($lastCentralNews as $lastCentralNew)
                                        <div class="col-sm-6 col-md-12">
                                            <div class="article-item">
                                                <a href="{{ $lastCentralNew->getUrl() }}" class="article-thumb">
                                                    <img width="253" height="120"
                                                          src="{{ $lastCentralNew->getImageUrl() }}"
                                                          class="attachment-medium size-medium wp-post-image"
                                                          alt="debaty" decoding="async"
                                                          sizes="(max-width: 253px) 100vw, 253px"
                                                          title="{{ $lastCentralNew->getTitle() }}"
                                                          loading="lazy">
                                                    <span class="cat-badge">{{ $lastCentralNew->getCategoryName() }}</span>
                                                </a>
                                                <div class="article-entry">
                                                    <div class="article-title">
                                                        <a href="{{ $lastCentralNew->getUrl() }}">{{ $lastCentralNew->getTitle() }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if($bottomPageBlockNews)
        <div class="content">
            <div class="slider-container">
                <div class="slider-wrapper">
                        @foreach($bottomPageBlockNews as $bottomPageBlockNew)
                            @if (!$bottomPageBlockNew->news->isEmpty())
                            <div class="slider-item">
                                <div class="home-articles-bottom">
                                    <h2 class="title">{{ $bottomPageBlockNew->getName() }}</h2>
                                    <div class="row">
                                        @if ($firstBottom = $bottomPageBlockNew->news->first())
                                            <div class="col-md-6">
                                                <div class="article-item article-big">
                                                    <a href="{{ $firstBottom->getUrl() }}" class="article-thumb">
                                                        <img width="1024" height="768"
                                                              src="{{ $firstBottom->getImageUrl() }}"
                                                              class="attachment-large size-large wp-post-image"
                                                              alt="photo 2024 08 19 06 32 06" decoding="async"
                                                              sizes="(max-width: 1024px) 100vw, 1024px"
                                                              title="{{ $firstBottom->getTitle() }}"
                                                              loading="lazy">
                                                    </a>
                                                    <div class="article-entry">
                                                        <div class="article-title">
                                                            <a href="{{ $firstBottom->getUrl() }}">{{ $firstBottom->getTitle() }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($lastBottomNews = $bottomPageBlockNew->news->slice(1))
                                            @foreach($lastBottomNews as $lastBottomNew)
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="article-item">
                                                        <a href="{{ $lastBottomNew->getUrl() }}" class="article-thumb">
                                                            <img width="400" height="223"
                                                                  src="{{ $lastBottomNew->getImageUrl() }}"
                                                                  class="attachment-medium size-medium wp-post-image"
                                                                  alt="04023bmh ca15 1376x768 1" decoding="async"
                                                                  sizes="(max-width: 400px) 100vw, 400px"
                                                                  title="{{ $lastBottomNew->getTitle() }}"
                                                                  loading="lazy">
                                                        </a>
                                                        <div class="article-entry">
                                                            <div class="article-title">
                                                                <a href="{{ $lastBottomNew->getUrl() }}">{{ $lastBottomNew->getTitle() }}</a>
                                                            </div>
                                                            <div class="article-desc">
                                                                {{ $lastBottomNew->getShortDescription(150) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
        <div class="navigation-slider">
            <button class="nav-button prev">
                <img src="/img/left-arrow.png" alt="">
            </button>
            <button class="nav-button next">
                <img src="/img/right-arrow.png" alt="">
            </button>
        </div>
    @endif
    <script>
        const sliderWrapper = document.querySelector('.slider-wrapper');
        const slides = document.querySelectorAll('.slider-item');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        let currentSlide = 0;

        function updateSlider() {
            sliderWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
            prevButton.disabled = currentSlide === 0;
            nextButton.disabled = currentSlide === slides.length - 1;
        }

        prevButton.addEventListener('click', () => {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlider();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentSlide < slides.length - 1) {
                currentSlide++;
                updateSlider();
            }
        });

        // Ініціалізація
        updateSlider();
    </script>
@endsection
