@foreach ($news as $new)
    <div class="news-item">
        <a href="{{$new->getUrl()}}" class="news-item__thumb news-thumb">
            <img width="400" height="228" src="{{ $new->getImageUrl() }}"
                 class="attachment-medium size-medium wp-post-image"
                 alt="210118 1 large"
                 decoding="async"
                 sizes="(max-width: 400px) 100vw, 400px"
                 title="Україна має посилити мобілізацію, – Салліван 9"
                 loading="lazy">
            <span class="play-mask"></span>
        </a>
        <div class="news-item__content">
            <ul class="news-item__cat">
                <li>
                    <a href="{{ $new->getCategory()->getUrl()}}">{{ $new->getcategoryName() }}</a>
                </li>
            </ul>
            <a href="{{$new->getUrl()}}" class="news-item__title">{{ $new->title }}</a>
            <div class="news-item__info">
                <span class="news-item__date date-info">
                    <time datetime="2024-11-19 20:56">
                        {{ \Carbon\Carbon::parse($new->date_of_publication)->format('d.m.Y') }}
                    </time>
                </span>
                <div class="news-item__view view-info icon-view nr-views-556546">175</div>
                <a href="{{$new->getUrl()}}" class="newslist__comments comments-info icon-comment">
                    <span class="fb-comments-count" data-href="{{$new->getUrl()}}"></span>
                </a>
            </div>
        </div>
    </div>
@endforeach
