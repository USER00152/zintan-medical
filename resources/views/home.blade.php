@extends('layouts.app')

@section('title', 'عيادات الزنتان — احجز موعدك عند أفضل الأطباء في المدينة')

@section('content')

<section class="relative overflow-hidden bg-hero-pattern">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 pt-14 pb-20 sm:pt-20 sm:pb-28">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-700 bg-brand-100/80 px-3 py-1.5 rounded-full">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="2"/></svg>
                منصة الحجز الطبي الأولى في الزنتان
            </span>
            <h1 class="mt-5 text-4xl sm:text-5xl font-black text-stone-900 leading-[1.15]">
                صحتك أقرب مما تتخيل،<br>
                <span class="text-brand-600">احجز موعدك</span> في ثوانٍ
            </h1>
            <p class="mt-5 text-lg text-stone-600 leading-8">
                كل عيادات وأطباء مدينة الزنتان في منصة واحدة. دوّر على تخصصك، اختار الطبيب المناسب، واحجز موعدك أونلاين بدون اتصال ولا انتظار.
            </p>
        </div>

        <form action="{{ route('doctors.index') }}" method="GET" class="mt-9 bg-white rounded-2xl border border-stone-200 shadow-lg shadow-brand-900/5 p-3 sm:p-3.5 flex flex-col sm:flex-row gap-2.5 max-w-3xl">
            <div class="flex-1 flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200">
                <svg class="w-5 h-5 text-stone-400 shrink-0" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" stroke="currentColor" stroke-width="1.8"/></svg>
                <input type="text" name="q" placeholder="اسم الطبيب أو العيادة..." class="w-full bg-transparent text-sm outline-none placeholder:text-stone-400">
            </div>
            <div class="flex-1 flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200">
                <svg class="w-5 h-5 text-stone-400 shrink-0" viewBox="0 0 24 24" fill="none"><path d="M8 2v3m8-3v3M3.5 9h17M4 5h16a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.6"/></svg>
                <select name="specialty_id" class="w-full bg-transparent text-sm outline-none text-stone-700">
                    <option value="">كل التخصصات</option>
                    @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}">{{ $specialty->name_ar ?? $specialty->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-sm transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" stroke="currentColor" stroke-width="2"/></svg>
                بحث
            </button>
        </form>

        <div class="mt-10 flex flex-wrap items-center gap-x-10 gap-y-4">
            <div>
                <div class="text-2xl font-black text-stone-900">{{ $stats['doctors'] }}+</div>
                <div class="text-xs text-stone-500 font-medium">طبيب مسجّل</div>
            </div>
            <div class="w-px h-9 bg-stone-200 hidden sm:block"></div>
            <div>
                <div class="text-2xl font-black text-stone-900">{{ $stats['clinics'] }}+</div>
                <div class="text-xs text-stone-500 font-medium">عيادة بالمدينة</div>
            </div>
            <div class="w-px h-9 bg-stone-200 hidden sm:block"></div>
            <div>
                <div class="text-2xl font-black text-stone-900">{{ $stats['specialties'] }}+</div>
                <div class="text-xs text-stone-500 font-medium">تخصص طبي</div>
            </div>
            <div class="w-px h-9 bg-stone-200 hidden sm:block"></div>
            <div>
                <div class="text-2xl font-black text-stone-900">24/7</div>
                <div class="text-xs text-stone-500 font-medium">حجز أونلاين</div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-16">
    <div class="flex items-end justify-between mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-stone-900">دوّر حسب التخصص</h2>
            <p class="text-stone-500 mt-1 text-sm">اختار التخصص المناسب لحالتك وشوف كل الأطباء المتاحين</p>
        </div>
        <a href="{{ route('doctors.index') }}" class="hidden sm:inline-flex text-sm font-semibold text-brand-600 hover:underline shrink-0">كل التخصصات ←</a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @php
            $icons = [
                'M4.5 12.75l6 6 9-13.5' , // fallback
            ];
            $specialtyIcons = ['باطنة' => 'M4.5 3h15v4.5h-15V3Zm2 4.5V21m11-13.5V21M9 12h6', 'أسنان' => 'M12 3c-3 0-5 2-5 5 0 3 1.5 5 1.5 8 0 1.5 1 2.5 2 2.5s1.5-1.5 1.5-3 .5-3 1-3 1 1.5 1 3 .5 3 1.5 3 2-1 2-2.5c0-3 1.5-5 1.5-8 0-3-2-5-5-5Z', 'أطفال' => 'M12 14a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-7 7c0-3.9 3.1-7 7-7s7 3.1 7 7', 'جلدية' => 'M12 3a9 9 0 1 0 9 9c0-1-.5-1.5-1.5-1.5S18 11 17 11s-1.5-1-1.5-2 .5-2-.5-2.5S13.5 6 13 5s0-2-1-2Z', 'عيون' => 'M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Zm10 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z', 'عظام' => 'M8 8a3 3 0 1 0-3.5 3M16 16a3 3 0 1 0 3.5-3M8 8l8 8M4.5 11a3 3 0 1 0 3.5 3M19.5 13a3 3 0 1 0-3.5-3', 'نساء وتوليد' => 'M12 3v6m0 0a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 10v5m-3 0h6', 'أنف وأذن وحنجرة' => 'M12 3a5 5 0 0 0-5 5v4a5 5 0 0 0 10 0V8a5 5 0 0 0-5-5Zm-5 9a5 5 0 0 0 10 0'];
        @endphp
        @foreach ($specialties as $specialty)
            <a href="{{ route('doctors.index', ['specialty_id' => $specialty->id]) }}" class="group flex flex-col items-center text-center gap-3 p-5 rounded-2xl bg-white border border-stone-200 hover:border-brand-300 hover:shadow-md transition-all">
                <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="{{ $specialtyIcons[$specialty->name_ar] ?? 'M12 8v8m-4-4h8M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z' }}" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="font-bold text-sm text-stone-800">{{ $specialty->name_ar ?? $specialty->name }}</span>
                <span class="text-xs text-stone-400">{{ $specialty->doctor_profiles_count }} طبيب</span>
            </a>
        @endforeach
    </div>
</section>

@if ($featuredDoctors->isNotEmpty())
<section class="bg-white border-y border-stone-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-16">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl font-extrabold text-stone-900">أطباء موصى بهم</h2>
                <p class="text-stone-500 mt-1 text-sm">نخبة من الأطباء الأعلى تقييمًا في المدينة</p>
            </div>
            <a href="{{ route('doctors.index') }}" class="hidden sm:inline-flex text-sm font-semibold text-brand-600 hover:underline shrink-0">عرض الكل ←</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($featuredDoctors as $doctor)
                <x-doctor-card :doctor="$doctor" />
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-16">
    <div class="flex items-end justify-between mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-stone-900">عيادات في مدينتك</h2>
            <p class="text-stone-500 mt-1 text-sm">تصفح العيادات المنتشرة في أنحاء الزنتان</p>
        </div>
        <a href="{{ route('clinics.index') }}" class="hidden sm:inline-flex text-sm font-semibold text-brand-600 hover:underline shrink-0">كل العيادات ←</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($clinics as $clinic)
            <x-clinic-card :clinic="$clinic" />
        @empty
            <p class="text-stone-400 col-span-full text-center py-10">لا توجد عيادات مسجّلة بعد.</p>
        @endforelse
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-16">
    <div class="rounded-3xl bg-gradient-to-l from-brand-700 via-brand-600 to-brand-500 overflow-hidden relative">
        <div class="absolute inset-0 bg-hero-pattern opacity-30"></div>
        <div class="relative px-6 sm:px-14 py-14 grid grid-cols-1 md:grid-cols-3 gap-10 text-white">
            <div class="flex flex-col items-start gap-3">
                <span class="flex items-center justify-center w-11 h-11 rounded-xl bg-white/15 backdrop-blur">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" stroke="currentColor" stroke-width="1.8"/></svg>
                </span>
                <h3 class="font-bold text-lg">١. دوّر عن طبيبك</h3>
                <p class="text-sm text-white/80 leading-6">اختار التخصص أو ابحث باسم الطبيب أو العيادة اللي تناسبك.</p>
            </div>
            <div class="flex flex-col items-start gap-3">
                <span class="flex items-center justify-center w-11 h-11 rounded-xl bg-white/15 backdrop-blur">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M8 2v3m8-3v3M3.5 9h17M4 5h16a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.6"/></svg>
                </span>
                <h3 class="font-bold text-lg">٢. اختار الموعد المناسب</h3>
                <p class="text-sm text-white/80 leading-6">شوف الأوقات المتاحة الفعلية للطبيب واختار اللي يناسب جدولك.</p>
            </div>
            <div class="flex flex-col items-start gap-3">
                <span class="flex items-center justify-center w-11 h-11 rounded-xl bg-white/15 backdrop-blur">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <h3 class="font-bold text-lg">٣. تأكيد الحجز فورًا</h3>
                <p class="text-sm text-white/80 leading-6">تستلم تأكيد الموعد لحظيًا، وتقدر تتابعه أو تلغيه من حسابك.</p>
            </div>
        </div>
    </div>
</section>

@endsection
