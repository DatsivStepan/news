
<div class="lastnews__list">
    <a href="{{$news->getUrl()}}" class="lastnews__item {{$news->isImportment() ? 'lastnews__item_important' : '' }}">
     <span class="lastnews__time">{{ \Carbon\Carbon::parse($news->getPublicationDate())->format('H:i') }}</span>
     <span class="lastnews__title">{{$news->getTitle()}}<i class="qas qa-camera"></i></span>
    </a>
</div>

