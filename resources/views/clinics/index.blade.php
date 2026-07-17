@extends('layouts.app')

@section('title', 'العيادات — عيادات الزنتان')

@section('content')
<section class="bg-white border-b border-stone-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-stone-900">عيادات مدينة الزنتان</h1>
        <p class="text-stone-500 mt-1.5 text-sm">{{ $clinics->total() }} عيادة مسجّلة في المنصة</p>

        <form action="{{ route('clinics.index') }}" method="GET" class="mt-6 max-w-md flex items-center gap-2.5 px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200">
            <svg class="w-5 h-5 text-stone-400 shrink-0" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" stroke="currentColor" stroke-width="1.8"/></svg>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="اسم العيادة أو الحي..." class="w-full bg-transparent text-sm outline-none placeholder:text-stone-400">
        </form>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
    @if ($clinics->isEmpty())
        <div class="text-center py-20">
            <p class="text-5xl mb-4">🏥</p>
            <p class="text-stone-500 font-medium">ما لقينا عيادات مطابقة لبحثك.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($clinics as $clinic)
                <x-clinic-card :clinic="$clinic" />
            @endforeach
        </div>
        <div class="mt-10">
            {{ $clinics->withQueryString()->links() }}
        </div>
    @endif
</section>
@endsection
