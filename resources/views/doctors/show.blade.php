@extends('layouts.app')

@section('title', $doctor->user->name . ' — ' . ($doctor->specialty->name_ar ?? $doctor->specialty->name) . ' — عيادات الزنتان')

@section('content')
@php
    $avgRating = round($doctor->reviews->avg('rating') ?? 0, 1);
@endphp

<section class="bg-white border-b border-stone-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
        <nav class="text-xs text-stone-400 mb-6 flex items-center gap-1.5">
            <a href="{{ url('/') }}" class="hover:text-brand-600">الرئيسية</a> ›
            <a href="{{ route('doctors.index') }}" class="hover:text-brand-600">الأطباء</a> ›
            <span class="text-stone-600">{{ $doctor->user->name }}</span>
        </nav>

        <div class="flex flex-col sm:flex-row items-start gap-6">
            <x-avatar :name="$doctor->user->name" :photo="$doctor->photo" :size="88" />
            <div class="flex-1">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-stone-900">{{ $doctor->user->name }}</h1>
                <p class="text-brand-600 font-semibold mt-1">{{ $doctor->specialty->name_ar ?? $doctor->specialty->name }}</p>
                <div class="mt-2 flex items-center gap-3 flex-wrap">
                    <x-rating-stars :rating="$avgRating" :count="$doctor->reviews->count()" />
                    @if ($doctor->years_experience)
                        <span class="text-sm text-stone-500">· {{ $doctor->years_experience }} سنوات خبرة</span>
                    @endif
                </div>
                <div class="mt-4 flex flex-wrap gap-2">
                    @foreach ($doctor->clinics as $clinic)
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-stone-600 bg-stone-100 px-3 py-1.5 rounded-full">
                            <svg class="w-3.5 h-3.5 text-brand-600" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.8"/></svg>
                            {{ $clinic->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 py-10 grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-2 space-y-8">
        @if ($doctor->bio)
            <div class="bg-white rounded-2xl border border-stone-200 p-6">
                <h2 class="font-bold text-stone-900 mb-3">نبذة عن الطبيب</h2>
                <p class="text-stone-600 leading-7 text-sm">{{ $doctor->bio }}</p>
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-stone-200 p-6">
            <h2 class="font-bold text-stone-900 mb-4">مواعيد الدوام</h2>
            @php
                $days = ['الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'];
                $byClinic = $doctor->schedules->groupBy('clinic_id');
            @endphp
            <div class="space-y-5">
                @forelse ($byClinic as $clinicId => $scheduleGroup)
                    @php $clinic = $doctor->clinics->firstWhere('id', $clinicId); @endphp
                    <div>
                        <p class="text-sm font-bold text-brand-700 mb-2">{{ $clinic->name ?? 'عيادة' }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($scheduleGroup->sortBy('day_of_week') as $s)
                                <span class="text-xs font-medium text-stone-600 bg-stone-100 px-3 py-1.5 rounded-lg">
                                    {{ $days[$s->day_of_week] }}: {{ \Carbon\Carbon::parse($s->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($s->end_time)->format('H:i') }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-stone-400">لا توجد مواعيد دوام مسجّلة حاليًا.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-stone-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-stone-900">آراء المرضى</h2>
                <x-rating-stars :rating="$avgRating" :count="$doctor->reviews->count()" />
            </div>
            <div class="space-y-4">
                @forelse ($doctor->reviews->sortByDesc('created_at')->take(6) as $review)
                    <div class="flex gap-3 pb-4 border-b border-stone-100 last:border-0 last:pb-0">
                        <x-avatar :name="$review->patient->name ?? 'مريض'" :size="38" />
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-semibold text-stone-800">{{ $review->patient->name ?? 'مريض' }}</span>
                                <x-rating-stars :rating="$review->rating" />
                            </div>
                            @if ($review->comment)
                                <p class="text-sm text-stone-500 mt-1 leading-6">{{ $review->comment }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-stone-400">لا توجد تقييمات بعد. كن أول من يقيّم هذا الطبيب.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="lg:col-span-1">
        <div class="sticky top-24 bg-white rounded-2xl border border-stone-200 card-shadow p-6">
            <h2 class="font-bold text-stone-900 mb-1">احجز موعدك</h2>
            <p class="text-xs text-stone-400 mb-5">اختار العيادة والتاريخ والوقت المناسب لك</p>

            @auth
                <form id="booking-form" action="{{ route('booking.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="doctor_profile_id" value="{{ $doctor->id }}">

                    <div>
                        <label class="block text-xs font-bold text-stone-600 mb-1.5">العيادة</label>
                        <select id="clinic-select" name="clinic_id" required class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400">
                            <option value="" disabled selected>اختر عيادة</option>
                            @foreach ($doctor->clinics as $clinic)
                                <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-stone-600 mb-1.5">التاريخ</label>
                        <input id="date-input" type="date" name="appointment_date" required min="{{ now()->toDateString() }}" class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-stone-600 mb-1.5">الوقت المتاح</label>
                        <div id="slots-wrap" class="grid grid-cols-3 gap-2 min-h-[42px]">
                            <p class="col-span-3 text-xs text-stone-400 py-2">اختر العيادة والتاريخ أولاً لعرض الأوقات المتاحة.</p>
                        </div>
                        <input type="hidden" id="time-input" name="appointment_time" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-stone-600 mb-1.5">ملاحظات (اختياري)</label>
                        <textarea name="notes" rows="2" placeholder="أي معلومات تحب تخبر الطبيب بها..." class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400 resize-none"></textarea>
                    </div>

                    <button type="submit" id="booking-submit" disabled class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 disabled:bg-stone-300 disabled:cursor-not-allowed text-white font-bold text-sm shadow-sm transition-colors">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        تأكيد الحجز
                    </button>
                </form>
            @else
                <div class="text-center py-6">
                    <p class="text-sm text-stone-500 mb-4">سجّل دخولك أولاً لتتمكن من حجز موعد مع هذا الطبيب.</p>
                    <a href="{{ route('login', ['redirect' => url()->current()]) }}" class="block w-full px-5 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm mb-2">تسجيل الدخول</a>
                    <a href="{{ route('register', ['redirect' => url()->current()]) }}" class="block w-full px-5 py-3 rounded-xl bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold text-sm">إنشاء حساب جديد</a>
                </div>
            @endauth
        </div>
    </div>
</section>

@auth
<script>
(function () {
    const doctorId = {{ $doctor->id }};
    const clinicSelect = document.getElementById('clinic-select');
    const dateInput = document.getElementById('date-input');
    const slotsWrap = document.getElementById('slots-wrap');
    const timeInput = document.getElementById('time-input');
    const submitBtn = document.getElementById('booking-submit');

    function resetSlots(message) {
        timeInput.value = '';
        submitBtn.disabled = true;
        slotsWrap.innerHTML = '<p class="col-span-3 text-xs text-stone-400 py-2">' + message + '</p>';
    }

    async function loadSlots() {
        const clinicId = clinicSelect.value;
        const date = dateInput.value;
        if (!clinicId || !date) {
            resetSlots('اختر العيادة والتاريخ أولاً لعرض الأوقات المتاحة.');
            return;
        }
        resetSlots('جارِ تحميل الأوقات المتاحة...');
        try {
            const res = await fetch(`/doctors/${doctorId}/slots?clinic_id=${clinicId}&date=${date}`, {
                headers: { 'Accept': 'application/json' }
            });
            const data = await res.json();
            const slots = data.available_slots || [];
            if (slots.length === 0) {
                resetSlots('لا توجد أوقات متاحة في هذا اليوم، جرّب تاريخًا آخر.');
                return;
            }
            slotsWrap.innerHTML = '';
            slots.forEach(function (slot) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = slot;
                btn.dir = 'ltr';
                btn.className = 'slot-btn text-xs font-semibold text-stone-700 bg-stone-50 border border-stone-200 rounded-lg py-2 hover:border-brand-400 transition-colors';
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.slot-btn').forEach(function (b) {
                        b.classList.remove('bg-brand-600', 'text-white', 'border-brand-600');
                        b.classList.add('bg-stone-50', 'text-stone-700', 'border-stone-200');
                    });
                    btn.classList.remove('bg-stone-50', 'text-stone-700', 'border-stone-200');
                    btn.classList.add('bg-brand-600', 'text-white', 'border-brand-600');
                    timeInput.value = slot;
                    submitBtn.disabled = false;
                });
                slotsWrap.appendChild(btn);
            });
        } catch (e) {
            resetSlots('تعذّر تحميل الأوقات المتاحة، حاول مرة أخرى.');
        }
    }

    clinicSelect.addEventListener('change', loadSlots);
    dateInput.addEventListener('change', loadSlots);
})();
</script>
@endauth

@endsection
