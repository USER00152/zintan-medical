@props(['name' => '', 'photo' => null, 'size' => 56])
@php
    $initial = mb_substr(trim(str_replace('د.', '', $name)), 0, 1);
    $palette = ['bg-brand-100 text-brand-700', 'bg-gold-100 text-gold-700', 'bg-rose-100 text-rose-700', 'bg-sky-100 text-sky-700', 'bg-violet-100 text-violet-700'];
    $color = $palette[crc32($name) % count($palette)];
    $dim = $size . 'px';
    $font = round($size * 0.4) . 'px';
@endphp
@if ($photo)
    <img src="{{ asset('storage/'.$photo) }}" alt="{{ $name }}" class="rounded-full object-cover shrink-0 ring-2 ring-white shadow-sm" style="width: {{ $dim }}; height: {{ $dim }};">
@else
    <div class="rounded-full flex items-center justify-center font-bold shrink-0 ring-2 ring-white shadow-sm {{ $color }}" style="width: {{ $dim }}; height: {{ $dim }}; font-size: {{ $font }};">
        {{ $initial }}
    </div>
@endif
