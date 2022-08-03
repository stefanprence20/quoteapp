<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Quote extends Component
{
    public array $quotes = [];
    public string $url = '/api/quotes';

    public function refresh()
    {
        $this->getQuotes();
    }

    public function render()
    {
        $this->getQuotes();
        return view('livewire.quote');
    }

    private function getQuotes() {
        $this->quotes = [];
        $get = Request::create($this->url, 'GET');
        $this->quotes =  collect(Route::dispatch($get)->original)->toArray();
    }
}
