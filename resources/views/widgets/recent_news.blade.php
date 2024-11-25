<div class="widget-title">
    Останні новини
</div>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active " id="home{{$type}}" role="tabpanel" aria-labelledby="home-tab">
        @if ($lastNews)
            @php
                $date = '';
            @endphp
            @foreach($lastNews as $news)
                @if(empty($date))
                @endif

                @if((\Carbon\Carbon::parse($date)->format('Y-m-d')  != \Carbon\Carbon::parse($news->date_of_publication)->format('Y-m-d')))

                @endif

                @include('widgets.parts._news', compact('news'))
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

                @endif

                @include('widgets.parts._news', compact('news'))
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
            @endforeach
        @else
            <p>Відсутні</p>
        @endif
    </div>
    <div class="lastnews__more">
        <a href="/news" class="button-style">більше</a>
    </div>
</div>

