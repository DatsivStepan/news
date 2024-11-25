@extends('layouts.app')

@section('pageTitle', $category->getMetaTitle())

@include('meta._tags', [
    'meta' => [
        'title' => $category->getMetaTitle(),
        'description' => $category->getMetaDescription()
    ]
])

@section('template_title')
    {{ $category->name }}
@endsection

@section('content')

    <main class="main">
        <div class="content">
            <div class="bread">

                <!-- Breadcrumb NavXT 7.3.1 -->
                <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to НТА." href="https://www.nta.ua" class="home"><span property="name">НТА</span></a><meta property="position" content="1"></span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name" class="archive taxonomy post_tag current-item">Війна</span><meta property="url" content="https://www.nta.ua/tag/vijna/"><meta property="position" content="2"></span></div>	   </div>



        <div class="content main__row">
            <div class="main__content main__content_pt" id="main">
                <h1 class="title">Війна</h1>
                <div class="news">
                    <div class="news__col">
                        <div class="news-item"><a href="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/" class="news-item__thumb news-thumb"><img width="400" height="267" src="https://www.nta.ua/wp-content/uploads/2024/11/193458-1_large-400x267.jpg" class="attachment-medium size-medium wp-post-image" alt="193458 1 large" decoding="async" fetchpriority="high" srcset="https://www.nta.ua/wp-content/uploads/2024/11/193458-1_large-400x267.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/11/193458-1_large-1024x683.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/11/193458-1_large-200x133.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/11/193458-1_large-768x512.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/11/193458-1_large.jpg 1140w" sizes="(max-width: 400px) 100vw, 400px" title="Збитки довкіллю України за 1000 днів війни: назвали суму 1"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li><li><a href="https://www.nta.ua/news/vijna/">Війна</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/" class="news-item__title">Збитки довкіллю України за 1000 днів війни: назвали суму</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-19 19:50">19.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-556530">102</div>
                                    <a href="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/zbytky-dovkillyu-ukrayiny-za-1000-dniv-vijny-nazvaly-sumu/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/vijna/">Війна</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/na-donechchyni-okupanty-posered-vulyczi-rozstrilyaly-czyvilnu-zhinku/" class="news-item__title">На Донеччині окупанти посеред вулиці розстріляли цивільну жінку</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-14 22:16">14.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-555418">157</div>
                                    <a href="https://www.nta.ua/na-donechchyni-okupanty-posered-vulyczi-rozstrilyaly-czyvilnu-zhinku/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/na-donechchyni-okupanty-posered-vulyczi-rozstrilyaly-czyvilnu-zhinku/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/udar-po-bagatopoverhivczi-u-kryvomu-rozi-z-pid-zavaliv-distaly-tilo-zhinky-shukayut-shhe-troh-ditej/" class="news-item__thumb news-thumb"><img width="400" height="266" src="https://www.nta.ua/wp-content/uploads/2024/11/photo_2024-11-12_00-01-02-400x266.jpg" class="attachment-medium size-medium wp-post-image" alt="photo 2024 11 12 00 01 02" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/11/photo_2024-11-12_00-01-02-400x266.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/11/photo_2024-11-12_00-01-02-1024x682.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/11/photo_2024-11-12_00-01-02-200x133.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/11/photo_2024-11-12_00-01-02-768x511.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/11/photo_2024-11-12_00-01-02.jpg 1280w" sizes="(max-width: 400px) 100vw, 400px" title="Удар по багатоповерхівці у Кривому Розі: з-під завалів дістали тіло жінки, шукають ще трьох дітей 2" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li><li><a href="https://www.nta.ua/news/vijna/">Війна</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/udar-po-bagatopoverhivczi-u-kryvomu-rozi-z-pid-zavaliv-distaly-tilo-zhinky-shukayut-shhe-troh-ditej/" class="news-item__title">Удар по багатоповерхівці у Кривому Розі: з-під завалів дістали тіло жінки, шукають ще трьох дітей</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-12 07:05">12.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-554788">133</div>
                                    <a href="https://www.nta.ua/udar-po-bagatopoverhivczi-u-kryvomu-rozi-z-pid-zavaliv-distaly-tilo-zhinky-shukayut-shhe-troh-ditej/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/udar-po-bagatopoverhivczi-u-kryvomu-rozi-z-pid-zavaliv-distaly-tilo-zhinky-shukayut-shhe-troh-ditej/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/u-kurskij-oblasti-zagynuv-ryatuvalnyk-z-lvivshhyny/" class="news-item__title">У Курській області загинув рятувальник з Львівщини</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-05 14:21">05.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-553352">313</div>
                                    <a href="https://www.nta.ua/u-kurskij-oblasti-zagynuv-ryatuvalnyk-z-lvivshhyny/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/u-kurskij-oblasti-zagynuv-ryatuvalnyk-z-lvivshhyny/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-zi-shhe-dvoma-zahysnykamy/" class="news-item__thumb news-thumb"><img width="400" height="263" src="https://www.nta.ua/wp-content/uploads/2024/11/54-1-400x263.jpg" class="attachment-medium size-medium wp-post-image" alt="54 1" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/11/54-1-400x263.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/11/54-1-1024x673.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/11/54-1-200x132.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/11/54-1-768x505.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/11/54-1.jpg 1040w" sizes="(max-width: 400px) 100vw, 400px" title="Сьогодні Львівщина прощається зі ще двома захисниками 3" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-zi-shhe-dvoma-zahysnykamy/" class="news-item__title">Сьогодні Львівщина прощається зі ще двома захисниками</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-05 12:38">05.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-553337">365</div>
                                    <a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-zi-shhe-dvoma-zahysnykamy/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-zi-shhe-dvoma-zahysnykamy/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/lvivshhyna-proshhayetsya-iz-desyatma-zahysnykamy/" class="news-item__title">Львівщина прощається із десятьма захисниками</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-05 09:40">05.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-553288">1019</div>
                                    <a href="https://www.nta.ua/lvivshhyna-proshhayetsya-iz-desyatma-zahysnykamy/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/lvivshhyna-proshhayetsya-iz-desyatma-zahysnykamy/"></span></a>
                                </div></div></div></div><div class="news__col"><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li><li><a href="https://www.nta.ua/news/vijna/">Війна</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/ukrayina-ne-vede-zhodnyh-peremovyn-iz-rf-yermak/" class="news-item__title">Україна не веде жодних перемовин із РФ, – Єрмак</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-04 16:20">04.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-553183">91</div>
                                    <a href="https://www.nta.ua/ukrayina-ne-vede-zhodnyh-peremovyn-iz-rf-yermak/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/ukrayina-ne-vede-zhodnyh-peremovyn-iz-rf-yermak/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-shistma-zahysnykamy-5/" class="news-item__thumb news-thumb"><img width="400" height="221" src="https://www.nta.ua/wp-content/uploads/2024/11/95-400x221.jpg" class="attachment-medium size-medium wp-post-image" alt="95" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/11/95-400x221.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/11/95-1024x566.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/11/95-200x111.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/11/95-768x424.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/11/95.jpg 1140w" sizes="(max-width: 400px) 100vw, 400px" title="Сьогодні Львівщина прощається з шістьма захисниками 4" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-shistma-zahysnykamy-5/" class="news-item__title">Сьогодні Львівщина прощається з шістьма захисниками</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-04 09:27">04.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-553097">1424</div>
                                    <a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-shistma-zahysnykamy-5/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-shistma-zahysnykamy-5/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/na-pokrovskomu-napryamku-zagynuv-voyin-z-lvivshhyny/" class="news-item__title">На Покровському напрямку загинув воїн з Львівщини</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-03 13:20">03.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552982">536</div>
                                    <a href="https://www.nta.ua/na-pokrovskomu-napryamku-zagynuv-voyin-z-lvivshhyny/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/na-pokrovskomu-napryamku-zagynuv-voyin-z-lvivshhyny/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/zsu-strymuyut-odyn-z-najpotuzhnishyh-nastupiv-vid-pochatku-povnomasshtabnogo-vtorgnennya-syrskyj/" class="news-item__thumb news-thumb"><img width="400" height="267" src="https://www.nta.ua/wp-content/uploads/2024/04/syrskyj-400x267.jpg" class="attachment-medium size-medium wp-post-image" alt="syrskyj" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/04/syrskyj-400x267.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/04/syrskyj-1024x683.jpg 1024w, https://www.nta.ua/wp-content/uploads/2024/04/syrskyj-200x133.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/04/syrskyj-768x512.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/04/syrskyj.jpg 1140w" sizes="(max-width: 400px) 100vw, 400px" title="ЗСУ стримують один з найпотужніших наступів від початку повномасштабного вторгнення, –&nbsp;Сирський 5" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/vijna/">Війна</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/zsu-strymuyut-odyn-z-najpotuzhnishyh-nastupiv-vid-pochatku-povnomasshtabnogo-vtorgnennya-syrskyj/" class="news-item__title">ЗСУ стримують один з найпотужніших наступів від початку повномасштабного вторгнення, –&nbsp;Сирський</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-02 12:39">02.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552824">95</div>
                                    <a href="https://www.nta.ua/zsu-strymuyut-odyn-z-najpotuzhnishyh-nastupiv-vid-pochatku-povnomasshtabnogo-vtorgnennya-syrskyj/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/zsu-strymuyut-odyn-z-najpotuzhnishyh-nastupiv-vid-pochatku-povnomasshtabnogo-vtorgnennya-syrskyj/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/vijna/">Війна</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/ukrayinski-voyiny-urazyly-punkt-upravlinnya-ta-sklad-z-rosijskymy-dronamy/" class="news-item__title">Українські воїни уразили пункт управління та склад з російськими дронами</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-02 10:22">02.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552793">86</div>
                                    <a href="https://www.nta.ua/ukrayinski-voyiny-urazyly-punkt-upravlinnya-ta-sklad-z-rosijskymy-dronamy/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/ukrayinski-voyiny-urazyly-punkt-upravlinnya-ta-sklad-z-rosijskymy-dronamy/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-chotyrma-zahysnykamy-8/" class="news-item__thumb news-thumb"><img width="400" height="230" src="https://www.nta.ua/wp-content/uploads/2024/11/dyzajn-bez-nazvy-94-e1730531619322-400x230.png" class="attachment-medium size-medium wp-post-image" alt="dyzajn bez nazvy 94 e1730531619322" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/11/dyzajn-bez-nazvy-94-e1730531619322-400x230.png 400w, https://www.nta.ua/wp-content/uploads/2024/11/dyzajn-bez-nazvy-94-e1730531619322-200x115.png 200w, https://www.nta.ua/wp-content/uploads/2024/11/dyzajn-bez-nazvy-94-e1730531619322-768x441.png 768w, https://www.nta.ua/wp-content/uploads/2024/11/dyzajn-bez-nazvy-94-e1730531619322.png 940w" sizes="(max-width: 400px) 100vw, 400px" title="Сьогодні Львівщина прощається з чотирма захисниками 6" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-chotyrma-zahysnykamy-8/" class="news-item__title">Сьогодні Львівщина прощається з чотирма захисниками</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-11-02 09:25">02.11.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552776">548</div>
                                    <a href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-chotyrma-zahysnykamy-8/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/sogodni-lvivshhyna-proshhayetsya-z-chotyrma-zahysnykamy-8/"></span></a>
                                </div></div></div></div><div class="news__col"><div class="news-item"><a href="https://www.nta.ua/lviv-poproshhayetsya-z-vidomym-pysmennykom-yakyj-zagynuv-na-vijni/" class="news-item__thumb news-thumb"><img width="400" height="244" src="https://www.nta.ua/wp-content/uploads/2024/10/kanyuk1-1-400x244.png" class="attachment-medium size-medium wp-post-image" alt="kanyuk1 1" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/10/kanyuk1-1-400x244.png 400w, https://www.nta.ua/wp-content/uploads/2024/10/kanyuk1-1-200x122.png 200w, https://www.nta.ua/wp-content/uploads/2024/10/kanyuk1-1-768x469.png 768w, https://www.nta.ua/wp-content/uploads/2024/10/kanyuk1-1.png 892w" sizes="(max-width: 400px) 100vw, 400px" title="Львів попрощається з відомим письменником, який загинув на війні 7" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/lviv-poproshhayetsya-z-vidomym-pysmennykom-yakyj-zagynuv-na-vijni/" class="news-item__title">Львів попрощається з відомим письменником, який загинув на війні</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-10-30 16:23">30.10.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552194">366</div>
                                    <a href="https://www.nta.ua/lviv-poproshhayetsya-z-vidomym-pysmennykom-yakyj-zagynuv-na-vijni/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/lviv-poproshhayetsya-z-vidomym-pysmennykom-yakyj-zagynuv-na-vijni/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/u-seredu-lviv-poproshhayetsya-z-dvoma-zahysnykamy/" class="news-item__title">У середу Львів попрощається з двома захисниками</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-10-29 22:00">29.10.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552026">276</div>
                                    <a href="https://www.nta.ua/u-seredu-lviv-poproshhayetsya-z-dvoma-zahysnykamy/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/u-seredu-lviv-poproshhayetsya-z-dvoma-zahysnykamy/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/stalo-vidomo-pro-zagybel-shhe-odnogo-voyina-z-lvivshhyny/" class="news-item__thumb news-thumb"><img width="400" height="222" src="https://www.nta.ua/wp-content/uploads/2024/10/debyak-400x222.jpg" class="attachment-medium size-medium wp-post-image" alt="debyak" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/10/debyak-400x222.jpg 400w, https://www.nta.ua/wp-content/uploads/2024/10/debyak-200x111.jpg 200w, https://www.nta.ua/wp-content/uploads/2024/10/debyak-768x427.jpg 768w, https://www.nta.ua/wp-content/uploads/2024/10/debyak.jpg 810w" sizes="(max-width: 400px) 100vw, 400px" title="Стало відомо про загибель ще одного воїна з Львівщини 8" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/stalo-vidomo-pro-zagybel-shhe-odnogo-voyina-z-lvivshhyny/" class="news-item__title">Стало відомо про загибель ще одного воїна з Львівщини</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-10-29 20:39">29.10.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552029">251</div>
                                    <a href="https://www.nta.ua/stalo-vidomo-pro-zagybel-shhe-odnogo-voyina-z-lvivshhyny/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/stalo-vidomo-pro-zagybel-shhe-odnogo-voyina-z-lvivshhyny/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/suspilstvo-news/">Суспільство</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/do-zbrojnyh-syl-ukrayiny-planuyut-pryzvaty-shhe-160-tysyach-osib/" class="news-item__title">До Збройних сил України планують призвати ще 160 тисяч осіб</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-10-29 19:40">29.10.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552020">137</div>
                                    <a href="https://www.nta.ua/do-zbrojnyh-syl-ukrayiny-planuyut-pryzvaty-shhe-160-tysyach-osib/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/do-zbrojnyh-syl-ukrayiny-planuyut-pryzvaty-shhe-160-tysyach-osib/"></span></a>
                                </div></div></div><div class="news-item"><a href="https://www.nta.ua/na-vijni-zagynuv-31-richnyj-zahysnyk-z-lvivshhyny/" class="news-item__thumb news-thumb"><img width="400" height="260" src="https://www.nta.ua/wp-content/uploads/2024/10/23-400x260.png" class="attachment-medium size-medium wp-post-image" alt="23" decoding="async" srcset="https://www.nta.ua/wp-content/uploads/2024/10/23-400x260.png 400w, https://www.nta.ua/wp-content/uploads/2024/10/23-200x130.png 200w, https://www.nta.ua/wp-content/uploads/2024/10/23.png 727w" sizes="(max-width: 400px) 100vw, 400px" title="На війні загинув 31-річний захисник з Львівщини 9" loading="lazy"><span class="play-mask"></span></a><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/na-vijni-zagynuv-31-richnyj-zahysnyk-z-lvivshhyny/" class="news-item__title">На війні загинув 31-річний захисник з Львівщини</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-10-29 19:22">29.10.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-552015">351</div>
                                    <a href="https://www.nta.ua/na-vijni-zagynuv-31-richnyj-zahysnyk-z-lvivshhyny/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/na-vijni-zagynuv-31-richnyj-zahysnyk-z-lvivshhyny/"></span></a>
                                </div></div></div><div class="news-item news-item_text"><div class="news-item__content"><ul class="news-item__cat"><li><a href="https://www.nta.ua/news/lviv/">Львівські новини</a></li><li><a href="https://www.nta.ua/news/">НОВИНИ</a></li></ul><a href="https://www.nta.ua/na-donechchyni-zagynuv-30-richnyj-zahysnyk-iz-lvivshhyny/" class="news-item__title">На Донеччині загинув 30-річний захисник із Львівщини</a><div class="news-item__info">
                                    <span class="news-item__date date-info"><time datetime="2024-10-28 22:45">28.10.2024</time></span>
                                    <div class="news-item__view view-info icon-view nr-views-551831">481</div>
                                    <a href="https://www.nta.ua/na-donechchyni-zagynuv-30-richnyj-zahysnyk-iz-lvivshhyny/#respond" class="newslist__comments comments-info icon-comment"><span class="fb-comments-count" data-href="https://www.nta.ua/na-donechchyni-zagynuv-30-richnyj-zahysnyk-iz-lvivshhyny/"></span></a>
                                </div></div></div>                </div>
                </div>
                <div class="wp-pagenavi" role="navigation">
                    <span aria-current="page" class="current">1</span><a class="page larger" title="Сторінка 2" href="https://www.nta.ua/tag/vijna/page/2/">2</a><a class="page larger" title="Сторінка 3" href="https://www.nta.ua/tag/vijna/page/3/">3</a><a class="page larger" title="Сторінка 4" href="https://www.nta.ua/tag/vijna/page/4/">4</a><a class="page larger" title="Сторінка 5" href="https://www.nta.ua/tag/vijna/page/5/">5</a><span class="extend">...</span><a class="nextpostslink" rel="next" aria-label="Наступна сторінка" href="https://www.nta.ua/tag/vijna/page/2/">&nbsp;<i></i></a><a class="last" aria-label="Last Page" href="https://www.nta.ua/tag/vijna/page/360/">360</a>
                </div>            </div>
            <aside class="main__aside aside" id="aside">
                <aside id="news-widget-2" class="aside__widget widget lastnews"><div class="widget-title">Новини</div><div class="lastnews__list"><a href="https://www.nta.ua/ssha-pidtverdyly-dozvil-ukrayini-vykorystovuvaty-atacms-dlya-udariv-po-rosiyi/" class="lastnews__item">

                            <span class="lastnews__time">21:06</span>
                            <span class="lastnews__title">США підтвердили дозвіл Україні використовувати ATACMS для ударів по Росії</span>
                        </a><a href="https://www.nta.ua/u-kyyivskomu-shpytali-vid-vazhkyh-poranen-pomer-voyin-zi-lvivshhyny/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">20:55</span>
                            <span class="lastnews__title">У київському шпиталі від важких поранень помер воїн зі Львівщини<i class="qas qa-camera"></i></span>
                        </a><a href="https://www.nta.ua/na-volyni-pyanyj-vodij-zbyv-lyudynu-v-invalidnomu-krisli-shho-vyrishyv-sud/" class="lastnews__item">

                            <span class="lastnews__time">20:44</span>
                            <span class="lastnews__title">На Волині п’яний водій збив людину в інвалідному кріслі: що вирішив суд</span>
                        </a><a href="https://www.nta.ua/na-lvivshhyni-onovyly-grafik-vidklyuchen-svitla-na-26-lystopada/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">20:24</span>
                            <span class="lastnews__title">На Львівщині оновили графік відключень світла на 26 листопада</span>
                        </a><a href="https://www.nta.ua/verhovnyj-lider-iranu-vymagaye-smertnoyi-kary-dlya-izrayilskogo-premyera-netanyagu/" class="lastnews__item">

                            <span class="lastnews__time">20:20</span>
                            <span class="lastnews__title">Верховний лідер Ірану вимагає смертної кари для ізраїльського прем’єра Нетаньягу</span>
                        </a><a href="https://www.nta.ua/u-lvovi-ozbroyenyj-cholovik-pogrozhuvav-u-banku/" class="lastnews__item">

                            <span class="lastnews__time">19:46</span>
                            <span class="lastnews__title">У Львові озброєний чоловік погрожував у банку<i class="qas qa-play-circle"></i></span>
                        </a><a href="https://www.nta.ua/u-moskvi-goryt-sklad-iz-freonom-zmi/" class="lastnews__item">

                            <span class="lastnews__time">19:36</span>
                            <span class="lastnews__title">У Москві горить склад із фреоном – ЗМІ<i class="qas qa-play-circle"></i></span>
                        </a><a href="https://www.nta.ua/na-zakarpatti-pyanyj-cholovik-do-smerti-pobyv-odnoselczya/" class="lastnews__item">

                            <span class="lastnews__time">19:23</span>
                            <span class="lastnews__title">На Закарпатті п’яний чоловік до смерті побив односельця</span>
                        </a><a href="https://www.nta.ua/na-donechchyni-zagynuv-zhurnalist-i-zahysnyk-ukrayiny-andrij-buchak/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">19:00</span>
                            <span class="lastnews__title">На Донеччині загинув журналіст і захисник України Андрій Бучак</span>
                        </a><a href="https://www.nta.ua/peremovyny-nastupnogo-roku-informaczijnyj-strim/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">18:50</span>
                            <span class="lastnews__title">Перемовини наступного року – Інформаційний стрім<i class="qas qa-play-circle"></i></span>
                        </a><a href="https://www.nta.ua/26-lystopada-na-lvivshhyni-zastosuyut-grafiky-vidklyuchen-svitla/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">18:41</span>
                            <span class="lastnews__title">26 листопада на Львівщині застосують графіки відключень світла</span>
                        </a><a href="https://www.nta.ua/pidryadnyka-yakyj-restavruvav-lvivskyj-universytet-zasudyly-do-5-rokiv-uvyaznennya/" class="lastnews__item">

                            <span class="lastnews__time">18:20</span>
                            <span class="lastnews__title">Підрядника, який реставрував львівський університет, засудили до 5 років ув’язнення</span>
                        </a><a href="https://www.nta.ua/u-rumuniyi-zavershyvsya-pershyj-tur-prezydentskyh-vyboriv-yak-vony-vplynut-na-ukrayinu/" class="lastnews__item">

                            <span class="lastnews__time">17:54</span>
                            <span class="lastnews__title">У Румунії завершився перший тур президентських виборів: Як вони вплинуть на Україну</span>
                        </a><a href="https://www.nta.ua/nezakonne-polyuvannya-na-lvivshhyni-u-myslyvskyh-ugiddyah-poblyzu-lagodova-vbyly-troh-kozul/" class="lastnews__item">

                            <span class="lastnews__time">17:40</span>
                            <span class="lastnews__title">Незаконне полювання на Львівщині: у мисливських угіддях поблизу Лагодова вбили трьох козуль<i class="qas qa-camera"></i></span>
                        </a><a href="https://www.nta.ua/na-prykarpatti-policziya-vstanovlyuye-osobu-zagybloyi-u-dtp/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">17:17</span>
                            <span class="lastnews__title">На Прикарпатті поліція встановлює особу загиблої у ДТП</span>
                        </a><a href="https://www.nta.ua/na-odeshhyni-vykryly-spivrobitnykiv-tczk-yaki-vymagaly-habari-za-vidstrochku-vid-mobilizacziyi/" class="lastnews__item">

                            <span class="lastnews__time">16:55</span>
                            <span class="lastnews__title">На Одещині викрили співробітників ТЦК, які вимагали хабарі за відстрочку від мобілізації</span>
                        </a><a href="https://www.nta.ua/na-bukovyni-vstanovlyuyut-prychynu-smerti-cholovika-pislya-dtp/" class="lastnews__item">

                            <span class="lastnews__time">16:40</span>
                            <span class="lastnews__title">На Буковині встановлюють причину смерті чоловіка після ДТП</span>
                        </a><a href="https://www.nta.ua/u-hmelnyczkomu-cholovik-pograbuvav-budynok-majzhe-na-piv-miljona-gryven/" class="lastnews__item">

                            <span class="lastnews__time">16:20</span>
                            <span class="lastnews__title">У Хмельницькому чоловік пограбував будинок майже на пів мільйона гривень</span>
                        </a><a href="https://www.nta.ua/na-lvivshhyni-serzhanta-zasudyly-do-145-rokiv-tyurmy-za-vbyvstvo-tovarysha-po-sluzhbi/" class="lastnews__item">

                            <span class="lastnews__time">15:59</span>
                            <span class="lastnews__title">На Львівщині сержанта засудили до 14,5 років тюрми за вбивство товариша по службі</span>
                        </a><a href="https://www.nta.ua/vodij-vidvoliksya-pid-chas-ruhu-na-odeshhyni-u-dtp-postrazhdalo-11-cholovik/" class="lastnews__item lastnews__item_important">

                            <span class="lastnews__time">15:47</span>
                            <span class="lastnews__title">Водій відволікся під час руху: На Одещині у ДТП постраждало 11 чоловік<i class="qas qa-camera"></i></span>
                        </a></div><div class="lastnews__more"><a href="https://www.nta.ua/news/" class="button-style">більше</a></div></aside><aside id="custom_html-4" class="widget_text aside__widget widget widget_custom_html"><div class="widget-title">банер прямий ефір</div><div class="textwidget custom-html-widget"><a href="http://nta.ua/%d0%bd%d0%b0%d0%b6%d0%b8%d0%b2%d0%be/" class="live-link">
                            <img src="http://nta.ua/wp-content/themes/nta/images/logo/logo-nta-2.svg" alt="" class="live-link__logo" loading="lazy">
                            <span class="live-link__text">Прямий <span>ефір</span></span>
                        </a></div></aside>    </aside>
        </div>


    </main>
@endsection
