@props(['clinic'])
<a href="{{ route('clinics.show', $clinic) }}" class="group flex flex-col rounded-2xl bg-white border border-stone-200 card-shadow hover:-translate-y-0.5 hover:shadow-lg transition-all duration-200 overflow-hidden">
    <div class="h-28 bg-gradient-to-br from-brand-500 to-brand-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-hero-pattern opacity-40"></div>
        <div class="absolute bottom-3 right-4 flex items-center justify-center w-12 h-12 rounded-xl bg-white/15 backdrop-blur border border-white/25 text-white">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1m3 0h1m-5 4h1m3 0h1m-5 4h1m3 0h1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        </div>
    </div>
    <div class="p-5 flex-1 flex flex-col">
        <h3 class="font-bold text-stone-900 group-hover:text-brand-700 transition-colors">{{ $clinic->name }}</h3>
        <p class="text-sm text-stone-500 mt-1 flex items-start gap-1.5">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.6"/></svg>
            <span>{{ $clinic->address }}</span>
        </p>
        @if ($clinic->phone)
            <p class="text-sm text-stone-500 mt-1 flex items-center gap-1.5">
                <svg class="w-4 h-4 shrink-0 text-stone-400" viewBox="0 0 24 24" fill="none"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.6a16 16 0 0 0 6 6l1.1-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.1 2Z" stroke="currentColor" stroke-width="1.6"/></svg>
                {{ $clinic->phone }}
            </p>
        @endif
        <div class="mt-4 pt-4 border-t border-stone-100 flex items-center justify-between">
            <span class="text-xs font-semibold text-stone-500">{{ $clinic->doctor_profiles_count ?? $clinic->doctorProfiles->count() }} طبيب متاح</span>
            <span class="text-sm font-semibold text-brand-600 group-hover:underline">عرض التفاصيل ←</span>
        </div>
    </div>
</a>
