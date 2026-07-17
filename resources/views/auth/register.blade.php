@extends('layouts.app')

@section('title', 'إنشاء حساب — عيادات الزنتان')

@section('content')
<section class="max-w-md mx-auto px-4 sm:px-6 py-16">
    <div class="text-center mb-8">
        <span class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand-600 text-white mb-4">
            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm9 0v6m3-3h-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
        <h1 class="text-2xl font-extrabold text-stone-900">إنشاء حساب جديد</h1>
        <p class="text-stone-500 text-sm mt-1.5">سجّل الآن وابدأ بحجز مواعيدك في ثوانٍ</p>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 card-shadow p-6 sm:p-8">
        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 text-rose-700 px-4 py-3 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="redirect" value="{{ request('redirect') }}">
            <div>
                <label class="block text-xs font-bold text-stone-600 mb-1.5">الاسم الكامل</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400">
            </div>
            <div>
                <label class="block text-xs font-bold text-stone-600 mb-1.5">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400" dir="ltr">
            </div>
            <div>
                <label class="block text-xs font-bold text-stone-600 mb-1.5">رقم الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="09XXXXXXXX" class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400" dir="ltr">
            </div>
            <div>
                <label class="block text-xs font-bold text-stone-600 mb-1.5">كلمة المرور</label>
                <input type="password" name="password" required minlength="6" class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400" dir="ltr">
            </div>
            <div>
                <label class="block text-xs font-bold text-stone-600 mb-1.5">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" required minlength="6" class="w-full text-sm px-3 py-2.5 rounded-xl bg-stone-50 border border-stone-200 outline-none focus:border-brand-400" dir="ltr">
            </div>
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm shadow-sm transition-colors">
                إنشاء الحساب
            </button>
        </form>
        <p class="text-center text-sm text-stone-500 mt-6">
            عندك حساب بالفعل؟
            <a href="{{ route('login', ['redirect' => request('redirect')]) }}" class="font-bold text-brand-600 hover:underline">سجّل دخولك</a>
        </p>
    </div>
</section>
@endsection
