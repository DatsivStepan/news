@php
    $colCounter = 0; // Лічильник контейнерів
@endphp

@foreach ($news->chunk(6) as $newsChunk)
    @php
        $colCounter++;
    @endphp

    <div class="news__col">
        @foreach ($newsChunk as $key => $new)
            <div class="news-item {{ ($colCounter % 2 === 0 ? ($key % 2 === 0 ? 'news-item_text' : '') : ($key % 2 === 0 ? '' : 'news-item_text')) }}">
                @if(($colCounter % 2 !== 0 && $key % 2 === 0) || ($colCounter % 2 === 0 && $key % 2 !== 0))
                    {{-- Структура для блоку news-item --}}
                    <a href="{{ $new->getUrl() }}" class="news-item__thumb news-thumb">
                        <img width="400" height="267"
                             src="{{ $new->getImageUrl() }}"
                             class="attachment-medium size-medium wp-post-image" alt="Image Alt"
                             decoding="async" fetchpriority="high"
                             sizes="(max-width: 400px) 100vw, 400px"
                             title="{{ $new->title }}">
                        <span class="play-mask"></span>
                    </a>
                @endif
                {{-- Загальний контент для обох типів блоків --}}
                <div class="news-item__content">
                    <ul class="news-item__cat">
                        @foreach($new->tags as $tag)
                            <li>
                                <a href="/tag-search?query={{ $tag->name }}" rel="tag">
                                    {{ mb_strtoupper($tag->name) . ' ' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ $new->getUrl() }}" class="news-item__title">
                        {{ $new->title }}
                    </a>
                    <div class="news-item__info">
                        <span class="news-item__date date-info">
                            <time datetime="{{ $new->date_of_publication }}">
                                {{ \Carbon\Carbon::parse($new->date_of_publication)->format('d.m.Y') }}
                            </time>
                        </span>
                        <div class="news-item__view view-info icon-view">102</div>
                        <a href="{{ $new->getUrl() }}" class="newslist__comments comments-info icon-comment">
                            <span class="fb-comments-count" data-href="{{ $new->getUrl() }}"></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
