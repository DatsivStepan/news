<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home{{$type}}" type="button"
                role="tab" aria-controls="home" aria-selected="true">Останнє
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile{{$type}}" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Головне
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact{{$type}}" type="button"
                role="tab" aria-controls="contact" aria-selected="false">Популярне
        </button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active " id="home{{$type}}" role="tabpanel" aria-labelledby="home-tab">
        @if ($lastNews)
            @php
                $date = '';
            @endphp
            @foreach($lastNews as $news)
                @if(empty($date))
                    <p class="widget-news-date">
                        @php {{ $date = $news->date_of_publication; }} @endphp
                        {{ \App\Helpers\DateHelper::getMonthByDay($date) }}
                    </p>
                @endif

                @if((\Carbon\Carbon::parse($date)->format('Y-m-d')  != \Carbon\Carbon::parse($news->date_of_publication)->format('Y-m-d')))
                    <p class="widget-news-date">
                        @php {{ $date = $news->date_of_publication; }} @endphp
                        {{ \App\Helpers\DateHelper::getMonthByDay($date) }}
                    </p>
                @endif

                @include('widgets.parts._news', compact('news'))
                <hr>
            @endforeach
        @else
            <p>Відсутні</p>
        @endif
    </div>
    <div class="tab-pane fade" id="profile{{$type}}" role="tabpanel" aria-labelledby="profile-tab">
        @if($mainNews)
            @php
                $date = '';
            @endphp
            @foreach($mainNews as $news)
                @if(empty($date))
                    <p class="widget-news-date">
                        @php {{ $date = $news->date_of_publication; }} @endphp
                        {{ \App\Helpers\DateHelper::getMonthByDay($date) }}
                    </p>
                @endif

                @if((\Carbon\Carbon::parse($date)->format('Y-m-d')  != \Carbon\Carbon::parse($news->date_of_publication)->format('Y-m-d')))
                    <p class="widget-news-date">
                        @php {{ $date = $news->date_of_publication; }} @endphp
                        {{ \App\Helpers\DateHelper::getMonthByDay($date) }}
                    </p>
                @endif

                @include('widgets.parts._news', compact('news'))
                <hr>
            @endforeach
        @else
            <p>Відсутні</p>
        @endif
    </div>
    <div class="tab-pane fade" id="contact{{$type}}" role="tabpanel" aria-labelledby="contact-tab">
        @if ($popularNews)
            <?php $type = 'popular' ?>
            @foreach($popularNews as $news)
                @include('widgets.parts._news', compact('news','type'))
                <hr>
            @endforeach
        @else
            <p>Відсутні</p>
        @endif
    </div>
    <a class="read-all-news" href="/news"> Читати всі новини </a>
</div>

