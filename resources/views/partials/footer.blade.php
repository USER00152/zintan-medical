<footer class="mt-24 border-t border-stone-200 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="col-span-1 sm:col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 mb-3">
                    <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-brand-600 text-white">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="font-extrabold text-stone-900">عيادات الزنتان</span>
                </div>
                <p class="text-sm text-stone-500 leading-6">منصة رقمية توحّد كل عيادات وأطباء مدينة الزنتان في مكان واحد، لحجز موعدك بدون انتظار.</p>
            </div>
            <div>
                <h4 class="font-bold text-stone-900 text-sm mb-3">روابط سريعة</h4>
                <ul class="space-y-2 text-sm text-stone-500">
                    <li><a href="{{ route('doctors.index') }}" class="hover:text-brand-700">تصفح الأطباء</a></li>
                    <li><a href="{{ route('clinics.index') }}" class="hover:text-brand-700">تصفح العيادات</a></li>
                    <li><a href="{{ url('/') }}" class="hover:text-brand-700">الصفحة الرئيسية</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-stone-900 text-sm mb-3">حسابي</h4>
                <ul class="space-y-2 text-sm text-stone-500">
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="hover:text-brand-700">مواعيدي</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-brand-700">تسجيل الدخول</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-brand-700">إنشاء حساب جديد</a></li>
                    @endauth
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-stone-900 text-sm mb-3">تواصل معنا</h4>
                <ul class="space-y-2 text-sm text-stone-500">
                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-600" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.8"/></svg> الزنتان، ليبيا</li>
                    <li class="flex items-center gap-2"><svg class="w-4 h-4 text-brand-600" viewBox="0 0 24 24" fill="none"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.6a16 16 0 0 0 6 6l1.1-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.1 2Z" stroke="currentColor" stroke-width="1.8"/></svg> 09X-XXXXXXX</li>
                </ul>
            </div>
        </div>
        <div class="mt-10 pt-6 border-t border-stone-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-stone-400">
            <span>© {{ date('Y') }} عيادات الزنتان. جميع الحقوق محفوظة.</span>
            <span>صُنع بعناية لخدمة أهالي الزنتان</span>
        </div>
    </div>
</footer>
