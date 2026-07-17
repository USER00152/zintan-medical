@extends('layouts.app')

@section('title', 'الأطباء — عيادات الزنتان')

@section('content')
<section class="bg-white border-b border-stone-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-stone-900">تصفّح الأطباء</h1>
        <p class="text-stone-500 mt-1.5 text-sm">{{ $doctors->total() }} طبيب متاح للحجز في مدينة الزنتان</p>

        <form action="{{ route('doctors.index') }}" method="GET" class="mt-6 grid grid-cols-1 sm:grid-cols-4 gap-3">
            <div class="sm:col-span-2 flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200">
                <svg class="w-5 h-5 text-stone-400 shrink-0" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" stroke="currentColor" stroke-width="1.8"/></svg>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="اسم الطبيب..." class="w-full bg-transparent text-sm outline-none placeholder:text-stone-400">
            </div>
            <div class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200">
                <select name="specialty_id" class="w-full bg-transparent text-sm outline-none text-stone-700">
                    <option value="">كل التخصصات</option>
                    @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}" @selected(request('specialty_id') == $specialty->id)>{{ $specialty->name_ar ?? $specialty->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200">
                <select name="clinic_id" class="w-full bg-transparent text-sm outline-none text-stone-700">
                    <option value="">كل العيادات</option>
                    @foreach ($clinics as $clinic)
                        <option value="{{ $clinic->id }}" @selected(request('clinic_id') == $clinic->id)>{{ $clinic->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-4 flex items-center gap-3">
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-sm transition-colors">
                    تطبيق الفلترة
                </button>
                @if (request()->hasAny(['q', 'specialty_id', 'clinic_id']))
                    <a href="{{ route('doctors.index') }}" class="text-sm font-semibold text-stone-500 hover:text-stone-700">إعادة تعيين</a>
                @endif
            </div>
        </form>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
    @if ($doctors->isEmpty())
        <div class="text-center py-20">
            <p class="text-5xl mb-4">🔍</p>
            <p class="text-stone-500 font-medium">ما لقينا أطباء مطابقين لبحثك، جرّب فلترة مختلفة.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($doctors as $doctor)
                <x-doctor-card :doctor="$doctor" />
            @endforeach
        </div>
        <div class="mt-10">
            {{ $doctors->withQueryString()->links() }}
        </div>
    @endif
</section>
@endsection
