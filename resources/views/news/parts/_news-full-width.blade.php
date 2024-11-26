@foreach ($news as $new)
    @if($new->isImportment())
        <a href="{{$new->getUrl()}}" class="lastnews__item lastnews__item_important_2">
            <span class="lastnews__time">
                {{\Carbon\Carbon::parse($new->date_of_publication)->format('h:i')}}
            </span>
            <span class="lastnews__title">
                <span class="lastnews__thumb">
                    <img width="400" height="400"
                         src="{{ $new->getImageUrl() }}"
                         class="attachment-medium size-medium wp-post-image"
                         alt="467673054 900191808873021 2713997016007249662 n"
                         decoding="async"
                         sizes="(max-width: 400px) 100vw, 400px"
                         title="Смертельна ДТП поблизу Пісочної на Львівщині: Стали відомі деталі 4"
                         loading="lazy">
                </span>
                {{ $new->title }}
                <span class="lastnews__desc">
                    {!! $new->mini_description !!}
                </span>
            </span>
        </a>
        @else
        <a href="{{$new->getUrl()}}" class="lastnews__item">
            <span class="lastnews__time">
                {{\Carbon\Carbon::parse($new->date_of_publication)->format('h:i')}}
            </span>
            <span class="lastnews__title">
                {{ $new->title }}
                <span class="lastnews__desc">
                    {!! $new->mini_description !!}
                </span>
            </span>
        </a>
    @endif
@endforeach
