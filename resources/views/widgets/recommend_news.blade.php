<div class="widget-title">Рекомендації</div>
@foreach($recommendedNews as $news)
    <div class="article-item">
        <a href="{{ $news->getUrl() }}" class="article-thumb">
            <img width="400" height="225"
               src="{{ $news->getImageUrl() }}"
               class="attachment-medium size-medium wp-post-image"
               alt="5923539459679303176" decoding="async"
               sizes="(max-width: 400px) 100vw, 400px"
               title="{{ $news->getTitle() }}"
               loading="lazy"></a>
        <div class="article-entry">
            <div class="article-title">
                <a href="{{ $news->getUrl() }}">{{ $news->getTitle() }}</a>
            </div>
        </div>
    </div>
@endforeach

