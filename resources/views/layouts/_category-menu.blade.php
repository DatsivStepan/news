<div class="header__col header__col_2">
    <div class="header__row">
        <div class="header__weather" data-da="navigation__row-mobile,2,1000" title="сніг" data-da-index="1">
            <i class="wi wi-snowflake-cold"></i><span>-0<sup>0</sup> Львів</span>
        </div>
        <div class="header__social" data-da="navigation__content,4,1000" data-da-index="2">
            <ul class="social">
                  @if($telegramLink = getSetting('telegram_link'))
                      <a href="{{ $telegramLink }}" rel=”nofollow” style="text-decoration: none !important;">
                          <span class="social-icon"><i class="fa fa-telegram" aria-hidden="true"></i></span>
                      </a>
                 @endif

                @if($facebookLink = getSetting('facebook_link'))
                    <li>
                        <a href="{{ $facebookLink }}" class="social__link icon-facebook" target="_blank" rel="nofollow"></a>
                    </li>
                @endif
                @if($twitterLink = getSetting('twitter_link'))
                    <li>
                        <a href="{{ $twitterLink }}" class="social__link icon-twitter" target="_blank" rel="nofollow"></a>
                    </li>
                @endif
                @if($instagramLink = getSetting('instagram_link'))
                    <li>
                        <a href="{{ $instagramLink }}" class="social__link icon-instagram" target="_blank" rel="nofollow"></a>
                    </li>
                @endif

                @if($youtubeLink = getSetting('youtube_link'))
                    <li>
                        <a href="{{ $youtubeLink }}" class="social__link icon-youtube" target="_blank" rel="nofollow"></a>
                    </li>
                @endif
                @if($emailLink = getSetting('email_address'))
                    <li>
                        <a href="mailto:{{ $emailLink }}" class="social__link icon-email" target="_blank" rel="nofollow">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <polygon points="339.392,258.624 512,367.744 512,144.896"></polygon>
                                <polygon points="0,144.896 0,367.744 172.608,258.624"></polygon>
                                <path
                                    d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"></path>
                                <path
                                    d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856	L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"></path>
                            </svg>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="header__row header__row_middle">
        <div class="header__nav">
            <ul id="menu-header-menu" class="header__menu">
                @foreach(\App\Services\HomeServices::getMainMenuOptions() as $option)
                    <li id="menu-item-311239" class="menu-item menu-item-type-taxonomy menu-item-object-category @if(!empty($option['child'])) menu-item-has-children @endif menu-item-311239">
                        <a href="{{ $option['info']['url'] }}">{{ $option['info']['name'] }}</a>
                        @if(!empty($option['child']))
                            <ul class="sub-menu">
                                @foreach($option['child'] as $cCategory)
                                    <li id="menu-item-311446" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311446">
                                        <a href="{{ $cCategory['url'] }}">{{ $cCategory['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <a href="/page/divitis_onlain" class="header__online online-link icon-play">дивитися онлайн</a>
        <div class="header__search search">
            <div class="search__toggle icon-search js-search-toggle"></div>

            <form method="get" id="searchform" class="search__form search-form" data-da="navigation__content,1,1000" action="{{ route('search')  }}" data-da-index="3">
                <input type="text" placeholder="Пошук по сайту" name="query" class="search-form__input">
                <button type="submit" class="search-form__button button-style">Знайти</button>
            </form>
        </div>
        <div class="icon-menu header__icon-menu">
            <div class="sw-topper"></div>
            <div class="sw-bottom"></div>
            <div class="sw-footer"></div>
        </div>
    </div>
    <div class="header__row">
        <div data-da="navigation__content,3,1000" data-da-index="4">
            @if($tags = \App\Services\HomeServices::getMainMenuTags())
                <ul id="menu-themes-menu" class="header__tags tags">
                    @foreach($tags as $tag)
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag">
                            <a href="/tag-search?query={{$tag}}">#&nbsp;{{$tag}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
