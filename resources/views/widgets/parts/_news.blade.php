 <a href="{{$news->getUrl()}}" class="widget-news-link" style="text-decoration: none; color:#131313">
     <div class="{{$news->getNewsType() ? 'main' : '' }} ">
         <p class="news-description">{{$news->getTitle()}}</p>
         <p class="news-time">{{ \Carbon\Carbon::parse($news->getPublicationDate())->format('h:i') }}</p>
     </div>
 </a>
