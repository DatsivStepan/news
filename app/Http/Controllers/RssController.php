<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\News;

class RssController extends Controller
{
    public function generateRss()
    {
        // Отримуємо останні 10 новин
        $newsItems = News::latest()->take(10)->get();

        // Формуємо RSS
        $rssContent = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/"></rss>');

        $baseUrl = env('APP_URL');

        $channel = $rssContent->addChild('channel');
        $channel->addChild('title', 'НТА');
        $channel->addChild('link', $baseUrl);
        $channel->addChild('description', 'Незалежне телевізійне агентство');

        foreach ($newsItems as $news) {
            $item = $channel->addChild('item');
            $item->addChild('title', htmlspecialchars($news->getTitle()));
            $item->addChild('link', htmlspecialchars($news->getUrl()));
            $item->addChild('description', htmlspecialchars($news->getShortDescription()));
            $item->addChild('category', htmlspecialchars($news->getCategoryName()));

            // Додаємо зображення, якщо воно є
            if (!empty($news->getImageUrl())) {
                $enclosure = $item->addChild('enclosure');
                $enclosure->addAttribute('url', htmlspecialchars($news->getImageUrl()));
                $enclosure->addAttribute('type', 'image/png'); // або інший тип MIME залежно від формату
            }
            if ($descImages = $news->getDescriptionImages()) {
                foreach ($descImages as $descImage) {
                    $enclosure = $item->addChild('enclosure');
                    $enclosure->addAttribute('url', htmlspecialchars($descImage));
                    $enclosure->addAttribute('type', 'image/png'); // або інший тип MIME залежно від формату
                }
            }

            // Додаємо дату публікації у форматі RFC 2822
            $item->addChild('pubDate', $news->getPublicationDate(false, 'r'));

            // Додаємо повний текст
            $description = $news->getDescription();
            $description = preg_replace('/[\r\n]+|&#13;/', ' ', $description);
            $item->addChild('yandex:full-text', htmlspecialchars(strip_tags($description)), 'http://news.yandex.ru');
        }

// Конвертація в DOMDocument для форматування
        $dom = dom_import_simplexml($rssContent)->ownerDocument;
        $dom->formatOutput = true; // Вмикаємо відступи та переноси рядків

// Повертаємо відформатований XML як відповідь
        return response($dom->saveXML(), 200)
            ->header('Content-Type', 'application/rss+xml; charset=UTF-8');
    }

    public function generateRSSWithNewlines()
    {
        // Формуємо RSS
        $rssContent = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"></rss>');
        $baseUrl = env('APP_URL');

        // Додаємо канал
        $channel = $rssContent->addChild('channel');
        $channel->addChild('title', 'Коментарі до:');
        $channel->addChild('link', $baseUrl); // Вказуємо основний сайт
        $channel->addChild('description', 'Незалежне телевізійне агентство');

        // Вказуємо актуальну дату для lastBuildDate
        $lastBuildDate = Carbon::now()->format('D, d M Y H:i:s O');
        $channel->addChild('lastBuildDate', $lastBuildDate);

        // Оновлення RSS раз на годину
        $channel->addChild('sy:updatePeriod', 'hourly');
        $channel->addChild('sy:updateFrequency', '1');
        $channel->addChild('generator', 'RSS Generator');

        // Додаємо тег atom:link для самої стрічки
        $atomLink = $channel->addChild('atom:link', '', 'http://www.w3.org/2005/Atom');
        $atomLink->addAttribute('href', $baseUrl . '/urknet/feed/');
        $atomLink->addAttribute('rel', 'self');
        $atomLink->addAttribute('type', 'application/rss+xml');

        // Перетворюємо SimpleXMLElement в DOM для форматування з новими рядками
        $dom = dom_import_simplexml($rssContent);
        $dom = $dom->ownerDocument;
        $dom->formatOutput = true;

        // Повертаємо XML як відповідь
        return response($dom->saveXML(), 200)
            ->header('Content-Type', 'application/rss+xml; charset=UTF-8');
    }
}
