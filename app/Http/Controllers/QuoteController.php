<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $quotes = [];
        $url = 'https://api.kanye.rest';

        try {
            for ($x = 1; $x <= 5; $x++) {
                $quotes[] = collect(Http::connectTimeout(300)->get($url)->json())['quote'];
            }

            return $quotes;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
