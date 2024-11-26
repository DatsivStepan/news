@unless ($breadcrumbs->isEmpty())
    <div class="bread">
        <span property="itemListElement" typeof="ListItem">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <a property="item" typeof="WebPage" href="{{ $breadcrumb->url }}" class="home">
                        <span property="name">{{ $breadcrumb->title }}</span>
                    </a>
                @else
                    <span property="name" class="post post-post current-item">
                        {{ $breadcrumb->title }}
                    </span>
                @endif

            @endforeach
        </span>
    </div>
@endunless
