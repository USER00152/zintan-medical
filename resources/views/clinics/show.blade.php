@extends('layouts.app')

@section('title', $clinic->name . ' — عيادات الزنتان')

@section('content')
<section class="bg-gradient-to-br from-brand-600 to-brand-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-hero-pattern opacity-30"></div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 py-14 text-white">
        <nav class="text-xs text-white/70 mb-5 flex items-center gap-1.5">
            <a href="{{ url('/') }}" class="hover:text-white">الرئيسية</a> ›
            <a href="{{ route('clinics.index') }}" class="hover:text-white">العيادات</a> ›
            <span class="text-white">{{ $clinic->name }}</span>
        </nav>
        <div class="flex items-center gap-4">
            <span class="flex items-center justify-center w-16 h-16 rounded-2xl bg-white/15 backdrop-blur border border-white/25">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1m3 0h1m-5 4h1m3 0h1m-5 4h1m3 0h1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
            </span>
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold">{{ $clinic->name }}</h1>
                <p class="text-white/80 text-sm mt-1 flex items-center gap-1.5">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.6"/></svg>
                    {{ $clinic->address }}
                </p>
            </div>
        </div>
        @if ($clinic->phone)
            <a href="tel:{{ $clinic->phone }}" class="inline-flex items-center gap-2 mt-6 px-5 py-2.5 rounded-xl bg-white text-brand-700 font-bold text-sm">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.6a16 16 0 0 0 6 6l1.1-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.1 2Z" stroke="currentColor" stroke-width="1.8"/></svg>
                {{ $clinic->phone }}
            </a>
        @endif
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    <h2 class="text-xl font-extrabold text-stone-900 mb-6">الأطباء في هذه العيادة</h2>
    @if ($clinic->doctorProfiles->isEmpty())
        <p class="text-stone-400">لا يوجد أطباء مسجّلين في هذه العيادة حاليًا.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($clinic->doctorProfiles as $doctor)
                <x-doctor-card :doctor="$doctor" />
            @endforeach
        </div>
    @endif
</section>
@endsection
