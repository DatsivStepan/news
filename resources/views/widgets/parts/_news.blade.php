
<div class="lastnews__list">
    <a href="{{$news->getUrl()}}" class="lastnews__item {{$news->isImportment() ? 'lastnews__item_important' : '' }}">
         <span class="lastnews__time">{{ \Carbon\Carbon::parse($news->getPublicationDate())->format('H:i') }}</span>
         <span class="lastnews__title">
             {{$news->getTitle()}}
             @switch($news->show_type)
                 @case(\App\Models\News::SHOW_TYPE_IMAGE)
                     <i class="qas qa-camera"></i>
                 @break
                 @case(\App\Models\News::SHOW_TYPE_VIDEO)
                     <i class="qas qa-play-circle"></i>
                 @break
             @endswitch
         </span>
    </a>
</div>

