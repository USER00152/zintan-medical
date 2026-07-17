@props(['doctor'])
@php
    $avgRating = $doctor->reviews_avg_rating ?? null;
    $reviewsCount = $doctor->reviews_count ?? 0;
@endphp
<a href="{{ route('doctors.show', $doctor) }}" class="group flex flex-col rounded-2xl bg-white border border-stone-200 card-shadow hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200 overflow-hidden">
    <div class="p-5 flex items-start gap-4">
        <x-avatar :name="$doctor->user->name" :photo="$doctor->photo" :size="60" />
        <div class="min-w-0 flex-1">
            <h3 class="font-bold text-stone-900 truncate group-hover:text-brand-700 transition-colors">{{ $doctor->user->name }}</h3>
            <p class="text-sm text-brand-600 font-medium">{{ $doctor->specialty->name_ar ?? $doctor->specialty->name }}</p>
            <div class="mt-1.5">
                <x-rating-stars :rating="$avgRating ?? 0" :count="$reviewsCount" />
            </div>
        </div>
    </div>
    <div class="px-5 pb-5 flex items-center flex-wrap gap-2">
        @if ($doctor->years_experience)
            <span class="inline-flex items-center gap-1 text-xs font-medium text-stone-500 bg-stone-100 px-2.5 py-1 rounded-full">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"><path d="M12 8v4l3 2M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Z" stroke="currentColor" stroke-width="1.8"/></svg>
                {{ $doctor->years_experience }} سنوات خبرة
            </span>
        @endif
        @foreach ($doctor->clinics->take(2) as $clinic)
            <span class="inline-flex items-center gap-1 text-xs font-medium text-brand-700 bg-brand-50 px-2.5 py-1 rounded-full">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.8"/></svg>
                {{ $clinic->name }}
            </span>
        @endforeach
    </div>
    <div class="mt-auto border-t border-stone-100 px-5 py-3 flex items-center justify-between bg-stone-50/60">
        <span class="text-sm font-semibold text-stone-700">احجز موعدك الآن</span>
        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-white border border-stone-200 text-brand-600 group-hover:bg-brand-600 group-hover:text-white group-hover:border-brand-600 transition-colors">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M11 5l-6 7 6 7M19 12H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
    </div>
</a>
