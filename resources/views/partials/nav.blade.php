<header class="sticky top-0 z-40 border-b border-stone-200/70 bg-stone-50/85 backdrop-blur">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">
            <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
                <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-brand-600 text-white shadow-sm">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.6-9.5-9.1C.7 8.1 2.2 4.5 5.8 4a4.7 4.7 0 0 1 6.2 2.1A4.7 4.7 0 0 1 18.2 4c3.6.5 5.1 4.1 3.3 7.9C19 16.4 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                </span>
                <span class="leading-tight">
                    <span class="block font-extrabold text-stone-900 text-[15px]">عيادات الزنتان</span>
                    <span class="block text-[11px] text-brand-700 font-medium -mt-0.5">Zintan Clinics</span>
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-1 text-sm font-medium">
                <a href="{{ url('/') }}" class="px-3 py-2 rounded-lg text-stone-600 hover:text-brand-700 hover:bg-brand-50 transition-colors {{ request()->is('/') ? 'text-brand-700 bg-brand-50' : '' }}">الرئيسية</a>
                <a href="{{ route('doctors.index') }}" class="px-3 py-2 rounded-lg text-stone-600 hover:text-brand-700 hover:bg-brand-50 transition-colors {{ request()->routeIs('doctors.*') ? 'text-brand-700 bg-brand-50' : '' }}">الأطباء</a>
                <a href="{{ route('clinics.index') }}" class="px-3 py-2 rounded-lg text-stone-600 hover:text-brand-700 hover:bg-brand-50 transition-colors {{ request()->routeIs('clinics.*') ? 'text-brand-700 bg-brand-50' : '' }}">العيادات</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg text-stone-600 hover:text-brand-700 hover:bg-brand-50 transition-colors {{ request()->routeIs('dashboard') ? 'text-brand-700 bg-brand-50' : '' }}">مواعيدي</a>
                @endauth
            </nav>

            <div class="hidden md:flex items-center gap-2">
                @auth
                    <span class="text-sm text-stone-500 ml-1">أهلاً، {{ Str::of(auth()->user()->name)->before(' ') }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-4 py-2 rounded-lg text-sm font-semibold text-stone-600 hover:bg-stone-200/70 transition-colors">تسجيل الخروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-stone-600 hover:bg-stone-200/70 transition-colors">تسجيل الدخول</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 shadow-sm transition-colors">إنشاء حساب</a>
                @endauth
            </div>

            <button id="mobile-menu-btn" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-stone-600 hover:bg-stone-200/70">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden border-t border-stone-200 bg-white">
        <div class="px-4 py-3 flex flex-col gap-1 text-sm font-medium">
            <a href="{{ url('/') }}" class="px-3 py-2 rounded-lg text-stone-700 hover:bg-brand-50">الرئيسية</a>
            <a href="{{ route('doctors.index') }}" class="px-3 py-2 rounded-lg text-stone-700 hover:bg-brand-50">الأطباء</a>
            <a href="{{ route('clinics.index') }}" class="px-3 py-2 rounded-lg text-stone-700 hover:bg-brand-50">العيادات</a>
            @auth
                <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg text-stone-700 hover:bg-brand-50">مواعيدي</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-right px-3 py-2 rounded-lg text-stone-700 hover:bg-brand-50">تسجيل الخروج</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-3 py-2 rounded-lg text-stone-700 hover:bg-brand-50">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="px-3 py-2 rounded-lg text-white bg-brand-600 text-center">إنشاء حساب</a>
            @endauth
        </div>
    </div>
</header>
