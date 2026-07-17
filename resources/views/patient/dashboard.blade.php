@extends('layouts.app')

@section('title', 'مواعيدي — عيادات الزنتان')

@section('content')
<section class="bg-white border-b border-stone-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10">
        <div class="flex items-center gap-4">
            <x-avatar :name="auth()->user()->name" :size="60" />
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold text-stone-900">مرحبًا، {{ auth()->user()->name }}</h1>
                <p class="text-stone-500 text-sm mt-1">هذي كل مواعيدك الطبية في مكان واحد</p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-5xl mx-auto px-4 sm:px-6 py-10">
    @php
        $statusMap = [
            'pending' => ['قيد الانتظار', 'bg-gold-100 text-gold-700'],
            'confirmed' => ['مؤكد', 'bg-brand-100 text-brand-700'],
            'cancelled' => ['ملغى', 'bg-rose-100 text-rose-600'],
            'completed' => ['مكتمل', 'bg-stone-200 text-stone-600'],
        ];
    @endphp

    @if ($appointments->isEmpty())
        <div class="text-center py-20 bg-white rounded-2xl border border-stone-200">
            <p class="text-5xl mb-4">📅</p>
            <p class="text-stone-500 font-medium mb-5">ما عندك أي مواعيد لسه.</p>
            <a href="{{ route('doctors.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm">احجز موعدك الأول</a>
        </div>
    @else
        <div class="space-y-4">
            @foreach ($appointments as $appointment)
                @php [$label, $classes] = $statusMap[$appointment->status] ?? ['—', 'bg-stone-100 text-stone-500']; @endphp
                <div class="bg-white rounded-2xl border border-stone-200 p-5 flex flex-col sm:flex-row sm:items-center gap-4">
                    <x-avatar :name="$appointment->doctorProfile->user->name ?? 'طبيب'" :photo="$appointment->doctorProfile->photo ?? null" :size="52" />
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h3 class="font-bold text-stone-900">{{ $appointment->doctorProfile->user->name ?? 'طبيب' }}</h3>
                            <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $classes }}">{{ $label }}</span>
                        </div>
                        <p class="text-sm text-stone-500 mt-1">{{ $appointment->doctorProfile->specialty->name_ar ?? '' }} · {{ $appointment->clinic->name ?? '' }}</p>
                        <div class="flex items-center gap-4 mt-2 text-xs text-stone-500">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"><path d="M8 2v3m8-3v3M3.5 9h17M4 5h16a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.6"/></svg>
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->translatedFormat('d M Y') }}
                            </span>
                            <span class="flex items-center gap-1.5" dir="ltr">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none"><path d="M12 8v4l3 2M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Z" stroke="currentColor" stroke-width="1.6"/></svg>
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}
                            </span>
                        </div>
                        @if ($appointment->notes)
                            <p class="text-xs text-stone-400 mt-2">ملاحظاتك: {{ $appointment->notes }}</p>
                        @endif
                    </div>
                    <div class="flex sm:flex-col gap-2 shrink-0">
                        @if (in_array($appointment->status, ['pending', 'confirmed']))
                            <form action="{{ route('appointments.cancel', $appointment) }}" method="POST" onsubmit="return confirm('متأكد إنك تبي تلغي هذا الموعد؟');">
                                @csrf
                                <button class="w-full text-xs font-bold px-4 py-2 rounded-lg border border-rose-200 text-rose-600 hover:bg-rose-50 transition-colors">إلغاء الموعد</button>
                            </form>
                        @endif
                        @if ($appointment->status === 'completed' && ! $appointment->review)
                            <button type="button" onclick="document.getElementById('review-modal-{{ $appointment->id }}').classList.remove('hidden')" class="w-full text-xs font-bold px-4 py-2 rounded-lg border border-gold-200 text-gold-700 hover:bg-gold-50 transition-colors">قيّم الزيارة</button>
                        @endif
                    </div>
                </div>

                @if ($appointment->status === 'completed' && ! $appointment->review)
                    <div id="review-modal-{{ $appointment->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-stone-900/40 px-4">
                        <div class="bg-white rounded-2xl p-6 w-full max-w-sm">
                            <h3 class="font-bold text-stone-900 mb-4">قيّم زيارتك مع {{ $appointment->doctorProfile->user->name ?? 'الطبيب' }}</h3>
                            <form action="{{ route('appointments.review', $appointment) }}" method="POST" class="space-y-4">
                                @csrf
                                <div class="flex justify-center gap-1" dir="ltr">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" {{ $i == 5 ? 'checked' : '' }}>
                                            <svg class="w-8 h-8 text-stone-200 peer-checked:text-gold-400 fill-current" viewBox="0 0 20 20"><path d="M10 1.5l2.7 5.6 6.1.9-4.4 4.3 1 6.1L10 15.4l-5.4 2.9 1-6-4.4-4.4 6-.9L10 1.5z"/></svg>
                                        </label>
                                    @endfor
                                </div>
                                <textarea name="comment" rows="3" placeholder="اكتب تعليقك (اختياري)..." class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400 resize-none"></textarea>
                                <div class="flex gap-2">
                                    <button type="button" onclick="document.getElementById('review-modal-{{ $appointment->id }}').classList.add('hidden')" class="flex-1 text-sm font-bold px-4 py-2.5 rounded-xl border border-stone-200 text-stone-600">إلغاء</button>
                                    <button type="submit" class="flex-1 text-sm font-bold px-4 py-2.5 rounded-xl bg-brand-600 text-white">إرسال التقييم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="mt-8">
            {{ $appointments->links() }}
        </div>
    @endif
</section>

<script>
document.querySelectorAll('[id^="review-modal-"]').forEach(function (modal) {
    const radios = modal.querySelectorAll('input[type="radio"][name="rating"]');
    function paint() {
        const checked = modal.querySelector('input[name="rating"]:checked');
        const val = checked ? parseInt(checked.value, 10) : 0;
        radios.forEach(function (r) {
            const svg = r.nextElementSibling;
            if (parseInt(r.value, 10) <= val) {
                svg.classList.remove('text-stone-200');
                svg.classList.add('text-gold-400');
            } else {
                svg.classList.add('text-stone-200');
                svg.classList.remove('text-gold-400');
            }
        });
    }
    radios.forEach(function (r) { r.addEventListener('change', paint); });
    paint();
});
</script>
@endsection
