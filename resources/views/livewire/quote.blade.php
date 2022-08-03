<div wire:poll.60s style="text-align: center">
    @foreach($quotes as $quote)
        <h2>{{ $quote }}</h2>
    @endforeach
    <div wire:loading>
        Getting Quotes...
    </div>
    <br>
    <button wire:click="refresh">Refresh</button>
</div>
