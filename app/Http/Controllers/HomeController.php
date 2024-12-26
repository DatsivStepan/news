<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\YouTube;
use Spatie\Image\Image;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


# Configs
        $apiKey = 'AIzaSyDFR4o3aghXswuUYZr2YChwQrPJ2nZ4w08';

# Initialize YouTube API client
        $client = new Client();
        $client->setDeveloperKey($apiKey);
        $service = new YouTube($client);

# Example query just to make sure we can connect to the API
        $response = $service->playlistItems->listPlaylistItems(
            'snippet',
            ['playlistId' => 'UU5HBd4l_kpba5b0O1pK-Bfg', 'maxResults' => 50]
        );
//        $response = $service->videos->listVideos('snippet', ['id' => 'VVU1SEJkNGxfa3BiYTViME8xcEstQmZnLmU4cHJ4d1RNMzFF']);

# Output the response to confirm it worked
//        dump($response);
        foreach ($response->items as $item) {
            dd($item);
        }
        dd($response->items);
//        AIzaSyDFR4o3aghXswuUYZr2YChwQrPJ2nZ4w08

        return view('home');
    }
}
