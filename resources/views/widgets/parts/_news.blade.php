 <a href="{{$news->getUrl()}}" class="widget-news-link" style="text-decoration: none; color:#131313">
     <div class="widget-news-container {{$news->isImportment() ? 'main' : '' }} ">
         @if(isset($type) && $type == 'popular')
             <span class="news-time">{{ \Carbon\Carbon::parse($news->getPublicationDate())->format('H:i') }} {{ \Carbon\Carbon::parse($news->getPublicationDate())->format('d-m-Y ') }}</span>
         @else
             <spam class="news-time">{{ \Carbon\Carbon::parse($news->getPublicationDate())->format('H:i') }}</spam>
         @endif
         <p class="news-description">{{$news->getTitle()}}</p>
     </div>
 </a>
