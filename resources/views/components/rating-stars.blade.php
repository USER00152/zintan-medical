@props(['rating' => 0, 'count' => null])
<div class="flex items-center gap-1">
    <div class="flex items-center gap-0.5 text-gold-400">
        @for ($i = 1; $i <= 5; $i++)
            <svg class="w-4 h-4 {{ $i <= round($rating) ? 'fill-current' : 'fill-stone-200 text-stone-200' }}" viewBox="0 0 20 20"><path d="M10 1.5l2.7 5.6 6.1.9-4.4 4.3 1 6.1L10 15.4l-5.4 2.9 1-6-4.4-4.4 6-.9L10 1.5z"/></svg>
        @endfor
    </div>
    @if (!is_null($count))
        <span class="text-xs text-stone-400">({{ $count }})</span>
    @endif
</div>
