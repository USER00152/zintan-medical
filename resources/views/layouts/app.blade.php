<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --p:#B2DDB8;--pd:#8FBF96;--pdd:#6A9E75;
  --pl:#EEF8F0;--pll:#F6FCF7;
  --td:#1a2e22;--tm:#6b8f7a;--tl:#a8c4b0;
  --bg:#F8FBF8;--card:#fff;--bdr:#D8EDD8;--bds:#EAF3EA;
  --ok:#22a55e;--ac:#f0a93a;--err:#e74c3c;
  --r8:8px;--r14:14px;--r22:22px;--rF:999px;
  --s1:0 2px 10px rgba(178,221,184,.15);
  --s2:0 8px 28px rgba(178,221,184,.25);
  --s3:0 20px 52px rgba(178,221,184,.3);
  --sp:0 8px 28px rgba(142,191,150,.4);
  --font:'Tajawal',sans-serif;
}
[data-theme="dark"]{
  --p:#9B85CC;--pd:#7B65AC;--pdd:#5B459C;
  --pl:#2D2040;--pll:#231830;
  --td:#E8E0F0;--tm:#9B8AB0;--tl:#6B5A80;
  --bg:#1A1225;--card:#231830;--bdr:#3D2D55;--bds:#2D2040;
  --s1:0 2px 10px rgba(155,133,204,.2);
  --s2:0 8px 28px rgba(155,133,204,.3);
  --sp:0 8px 28px rgba(155,133,204,.5);
}
[data-theme="dark"] .nav{background:rgba(35,24,48,.97);border-color:#3D2D55}
[data-theme="dark"] .mob-tabs-bar{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .footer{background:linear-gradient(160deg,#130D1E,#231830);border-top-color:#3D2D55}
[data-theme="dark"] .sp-card,[data-theme="dark"] .dc,[data-theme="dark"] .fc,
[data-theme="dark"] .ph-card,[data-theme="dark"] .dl-card,[data-theme="dark"] .apt-card,
[data-theme="dark"] .book-card,[data-theme="dark"] .fp,[data-theme="dark"] .doc-list,
[data-theme="dark"] .chat-area,[data-theme="dark"] .ph-card-big,[data-theme="dark"] .sd-card{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .hbadge,[data-theme="dark"] .msg-dr{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] input,[data-theme="dark"] select,[data-theme="dark"] textarea{background:#2D2040!important;color:var(--td)!important;border-color:#3D2D55!important}

body{font-family:var(--font);direction:rtl;background:var(--bg);color:var(--td);overflow-x:hidden;width:100%}

.btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:var(--rF);font-weight:700;font-size:14px;border:2px solid transparent;font-family:var(--font);cursor:pointer;transition:.25s;text-decoration:none}
.bp{background:var(--p);color:#fff;box-shadow:var(--sp)}.bp:hover{background:var(--pd);transform:translateY(-2px)}
.bo{background:var(--card);color:var(--p);border-color:var(--bdr)}.bo:hover{border-color:var(--p);background:var(--pl)}
.bsm{padding:8px 16px;font-size:12.5px}

/* NAVBAR */
.nav{background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-bottom:1px solid var(--bds);padding:10px 20px 0;position:sticky;top:0;z-index:200;width:100%}
.nav-top{display:flex;align-items:center;justify-content:space-between;width:100%;padding-bottom:8px}
.logo{display:flex;align-items:center;gap:8px;text-decoration:none;flex-shrink:0}
.lm{width:36px;height:36px;border-radius:11px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:var(--sp);flex-shrink:0}
.lm svg{width:20px;height:20px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.ln{font-size:15px;font-weight:900;color:var(--td)}.ln span{color:var(--p)}
.ls{font-size:10px;color:var(--tm)}
.nav-right{display:flex;align-items:center;gap:6px;flex-shrink:0}
.icon-btn{width:34px;height:34px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;flex-shrink:0}
.icon-btn svg{width:16px;height:16px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.lang-btn{height:32px;padding:0 10px;border-radius:var(--rF);background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;gap:5px;cursor:pointer;font-size:11.5px;font-weight:800;color:var(--p);font-family:var(--font);white-space:nowrap}
.lang-btn svg{width:13px;height:13px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
.uav{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;border:2px solid var(--pl);flex-shrink:0}

/* TABS ROW */
.nav-tabs{display:flex;gap:2px;width:100%;padding-bottom:8px;border-top:1px solid var(--bds);padding-top:8px;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch}
.nav-tabs::-webkit-scrollbar{display:none}
.nt{padding:7px 12px;border-radius:var(--rF);font-weight:700;font-size:13px;color:var(--tm);border:none;background:none;font-family:var(--font);cursor:pointer;transition:.2s;text-decoration:none;display:inline-block;white-space:nowrap;flex-shrink:0}
.nt:hover,.nt.on{color:var(--p);background:var(--pl)}
.nt.bk{background:var(--p);color:#fff}.nt.bk:hover{background:var(--pd)}

/* MOBILE TABS BAR */
.mob-tabs-bar{display:none;background:var(--card);border-bottom:2px solid var(--bds);padding:6px 10px;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch;position:sticky;top:56px;z-index:198;gap:5px;width:100%}
.mob-tabs-bar::-webkit-scrollbar{display:none}
.mob-t{padding:7px 12px;border-radius:var(--rF);font-size:11.5px;font-weight:700;color:var(--tm);white-space:nowrap;border:none;background:none;font-family:var(--font);cursor:pointer;text-decoration:none;display:inline-block;transition:.2s;flex-shrink:0}
.mob-t:hover,.mob-t.on{color:var(--p);background:var(--pl)}
.mob-t.bk{background:var(--p);color:#fff}

/* Hero Section Optimized */
.hero{padding:60px 20px;max-width:1100px;margin:0 auto;width:100%}
.hero-in{display:grid;grid-template-columns:1.2fr 0.8fr;gap:40px;align-items:center}
.hero-ct{display:flex;flex-direction:column}
.hero-vis{display:flex;justify-content:center;align-items:center}
/* تعديل لتصغير الرسمة لتكون أنيقة وجنب الأزرار في الهواتف والكواشف */
.hero-vis img, .hero-vis svg{max-width:240px;height:auto;object-fit:contain}

/* الهيكلية الهرمية للمربعات (خدماتنا + انضم إلينا) */
.hierarchical-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  max-width: 900px;
  margin: 0 auto;
}
.hierarchical-grid .top-hero-card {
  grid-column: 1 / span 2;
  margin-bottom: 5px;
}

/* صيدليات كل 2 جنب بعض */
.pharmacies-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  max-width: 1100px;
  margin: 0 auto;
}

/* PG HEADER */
.pg-hd{background:linear-gradient(180deg,var(--pll),var(--bg));padding:20px 20px 16px;border-bottom:1px solid var(--bds);width:100%}
.bc{display:flex;align-items:center;gap:7px;font-size:12px;color:var(--tm);margin-bottom:6px;font-weight:600}
.cur{color:var(--p)}
.pg-hd h1{font-size:22px;margin-bottom:3px;color:var(--td);font-weight:800}
.pg-hd p{color:var(--tm);font-size:13px}
.si{max-width:1100px;margin:0 auto;width:100%;padding:0 20px}
.iw{position:relative}
.iw input,.iw select{width:100%;padding:12px 12px 12px 40px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.iw input:focus,.iw select:focus{outline:none;border-color:var(--p);background:var(--card)}
.iw-ic{position:absolute;top:50%;left:12px;transform:translateY(-50%);color:var(--tl);pointer-events:none}
.iw-ic svg{width:15px;height:15px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}

/* FOOTER الاحترافي المتناسق */
.footer{background:linear-gradient(180deg, var(--pll), var(--card));border-top:2px solid var(--bds);color:var(--td);padding:50px 20px 0;width:100%}
.fg-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr;gap:30px;max-width:1100px;margin:0 auto 30px}
.fg-col h4{font-size:14px;font-weight:900;color:var(--pdd);margin-bottom:15px;position:relative;padding-bottom:5px}
.fg-col h4::after{content:'';position:absolute;bottom:0;right:0;width:30px;height:2px;background:var(--p)}
.fg-col p, .fg-col li{font-size:13px;color:var(--tm);line-height:2;list-style:none}
.fg-col ul{display:flex;flex-direction:column;gap:8px}
.fg-col a{color:var(--tm);text-decoration:none;transition:0.2s}
.fg-col a:hover{color:var(--p);padding-right:4px}
.foot-bot{border-top:1px solid var(--bds);padding:20px 0;display:flex;align-items:center;justify-content:space-between;max-width:1100px;margin:0 auto;font-size:12px;color:var(--tm);flex-wrap:wrap;gap:10px}
.foot-bot span{font-weight:600}

/* ═══ RESPONSIVE ═══ */
@media(max-width:900px){
  .nav-tabs{display:none}
  .mob-tabs-bar{display:flex}
  .fg-grid{grid-template-columns:1fr 1fr}
}

@media(max-width:768px){
  .nav{padding:8px 12px 0}
  .lm{width:32px;height:32px}
  .ln{font-size:13.5px}.ls{display:none}
  .lang-btn{padding:0 8px;height:30px;font-size:11px}
  .icon-btn{width:30px;height:30px}.icon-btn svg{width:14px;height:14px}
  .uav{width:30px;height:30px;font-size:11px}
  .mob-tabs-bar{top:50px;padding:5px 8px}
  .mob-t{font-size:11px;padding:6px 10px}
  .si{padding:0 12px!important}
  .pg-hd{padding:16px 12px!important}
  .sec{padding:20px 12px!important}

  /* ترتيب الهيرو بالموبايل لـ رفع الرسمة بجانب محتوى الحجز وجعلها صغيرة */
  .hero{padding:20px 12px!important}
  .hero-in{display:flex!important;flex-direction:column-reverse!important;gap:15px!important;align-items:center!important}
  .hero-vis{display:block!important;margin-bottom:10px;text-align:center}
  .hero-vis img, .hero-vis svg{max-width:130px!important} /* تصغير الرسمة على الموبايل جداً كي لا تضايق */
  
  .hero-ct h1{font-size:18px!important;text-align:center!important}
  .hero-qs{font-size:11.5px!important;text-align:center!important}
  .hero-p{font-size:11.5px!important;margin-bottom:10px!important;text-align:center!important}
  .hero-feats{gap:6px!important;margin-bottom:10px!important;justify-content:center!important}
  .hf{font-size:10.5px!important}
  .hbadge{font-size:9.5px!important;padding:3px 9px!important;margin:0 auto 8px!important;display:table!important}
  .hero-btns{flex-direction:column!important;gap:8px!important;margin-bottom:14px!important;width:100%!important}
  .hero-btns .btn{width:100%!important;justify-content:center!important;font-size:12.5px!important;padding:12px!important}
  
  /* الحفاظ على الهيكل الهرمي والصيدليات المزدوجة حتى عالموبايل بمرونة */
  .hierarchical-grid {
    grid-template-columns: 1fr 1fr !important;
    gap: 10px !important;
  }
  .pharmacies-grid {
    grid-template-columns: 1fr 1fr !important;
    gap: 10px !important;
  }
  
  .fg-grid{grid-template-columns:1fr!important;gap:20px}
  .foot-bot{flex-direction:column;text-align:center;gap:6px}
}

@media(max-width:480px) {
  .hierarchical-grid {
    display: flex !important;
    flex-direction: column !important;
  }
}

@yield('styles')
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="nav">
  <div class="nav-top">
    <a href="{{ route('home') }}" class="logo">
      <div class="lm"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
      <div><div class="ln">منصة <span>الزنتان</span></div><div class="ls">Zintan Medical</div></div>
    </a>
    <div class="nav-right">
      <button class="lang-btn" onclick="toggleLang()" id="lang-btn">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        <span id="lang-label">AR</span>
      </button>
      <button class="icon-btn" onclick="toggleDark()" id="theme-btn">
        <svg id="moon-icon" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        <svg id="sun-icon" viewBox="0 0 24 24" style="display:none"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
      </button>
      <div class="uav" id="user-avatar">م</div>
    </div>
  </div>
  <div class="nav-tabs">
    <a href="{{ route('home') }}" class="nt {{ request()->routeIs('home') || request()->routeIs('home.page') ? 'on' : '' }}">الرئيسية</a>
    <a href="{{ route('doctors') }}" class="nt {{ request()->routeIs('doctors') ? 'on' : '' }}">الأطباء</a>
    <a href="{{ route('specialties') }}" class="nt {{ request()->routeIs('specialties') ? 'on' : '' }}">التخصصات</a>
    <a href="{{ route('pharmacies') }}" class="nt {{ request()->routeIs('pharmacies') ? 'on' : '' }}">الصيدليات</a>
    <a href="{{ route('appointments') }}" class="nt {{ request()->routeIs('appointments') ? 'on' : '' }}">مواعيدي</a>
    <a href="{{ route('consultation') }}" class="nt {{ request()->routeIs('consultation') ? 'on' : '' }}">تواصل مع طبيبك</a>
    <a href="{{ route('booking') }}" class="nt bk">احجز موعد</a>
  </div>
</nav>

<!-- تبويبات موبايل أفقية دائمة -->
<div class="mob-tabs-bar">
  <a href="{{ route('home') }}" class="mob-t {{ request()->routeIs('home') ? 'on' : '' }}">الرئيسية</a>
  <a href="{{ route('doctors') }}" class="mob-t {{ request()->routeIs('doctors') ? 'on' : '' }}">الأطباء</a>
  <a href="{{ route('specialties') }}" class="mob-t {{ request()->routeIs('specialties') ? 'on' : '' }}">التخصصات</a>
  <a href="{{ route('pharmacies') }}" class="mob-t {{ request()->routeIs('pharmacies') ? 'on' : '' }}">الصيدليات</a>
  <a href="{{ route('appointments') }}" class="mob-t {{ request()->routeIs('appointments') ? 'on' : '' }}">مواعيدي</a>
  <a href="{{ route('consultation') }}" class="mob-t {{ request()->routeIs('consultation') ? 'on' : '' }}">طبيبك</a>
  <a href="{{ route('booking') }}" class="mob-t bk">احجز ←</a>
</div>

@yield('content')

<!-- FOOTER المطور والراقي -->
<footer class="footer">
  <div class="fg-grid">
    <div class="fg-col">
      <div class="logo" style="margin-bottom:12px">
        <div class="lm"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <div class="ln">منصة <span>الزنتان</span></div>
      </div>
      <p>رؤية تقنية متكاملة لتحسين وتسهيل الوصول للخدمات الطبية والرعاية الصحية الشاملة داخل مدينة الزنتان.</p>
    </div>
    <div class="fg-col">
      <h4>تصفح المنصة</h4>
      <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('doctors') }}">دليل الأطباء</a></li>
        <li><a href="{{ route('specialties') }}">التخصصات المتاحة</a></li>
        <li><a href="{{ route('pharmacies') }}">الصيدليات المناوبة</a></li>
      </ul>
    </div>
    <div class="fg-col">
      <h4>بوابة المرضى</h4>
      <ul>
        <li><a href="{{ route('booking') }}">لوحة الحجز السريع</a></li>
        <li><a href="{{ route('appointments') }}">إدارة مواعيدي</a></li>
        <li><a href="{{ route('consultation') }}">الاستشارات الطبية</a></li>
      </ul>
    </div>
    <div class="fg-col">
      <h4>معلومات التواصل</h4>
      <ul>
        <li>📍 الجبل الغربي - مدينة الزنتان، ليبيا</li>
        <li>✉️ support@zintanmed.ly</li>
        <li>📞 الدعم الفني: 091-000-0000</li>
      </ul>
    </div>
  </div>
  <div class="foot-bot">
    <span>© 2026 منصة الزنتان الطبية المتكاملة</span>
    <span>تطوير وإشراف برمجيات - مشروع التخرج الممتاز</span>
  </div>
</footer>

<script>
const API = '{{ url("/api") }}';
const token = localStorage.getItem('token');
const user = JSON.parse(localStorage.getItem('user') || '{}');
const html = document.getElementById('html-root');

if (user && user.name) {
  document.getElementById('user-avatar').textContent = user.name.charAt(0);
}
if (localStorage.getItem('theme') === 'dark') {
  html.setAttribute('data-theme', 'dark');
  document.getElementById('moon-icon').style.display = 'none';
  document.getElementById('sun-icon').style.display = 'block';
}
if (localStorage.getItem('lang') === 'en') {
  html.setAttribute('lang', 'en');
  html.setAttribute('dir', 'ltr');
  document.getElementById('lang-label').textContent = 'AR';
}

function toggleDark() {
  const isDark = html.getAttribute('data-theme') === 'dark';
  if (isDark) {
    html.removeAttribute('data-theme');
    document.getElementById('moon-icon').style.display = 'block';
    document.getElementById('sun-icon').style.display = 'none';
    localStorage.setItem('theme', 'light');
  } else {
    html.setAttribute('data-theme', 'dark');
    document.getElementById('moon-icon').style.display = 'none';
    document.getElementById('sun-icon').style.display = 'block';
    localStorage.setItem('theme', 'dark');
  }
}

function toggleLang() {
  const isAr = (localStorage.getItem('lang') || 'ar') === 'ar';
  if (isAr) {
    html.setAttribute('lang','en');
    html.setAttribute('dir','ltr');
    document.getElementById('lang-label').textContent = 'AR';
    localStorage.setItem('lang','en');
  } else {
    html.setAttribute('lang','ar');
    html.setAttribute('dir','rtl');
    document.getElementById('lang-label').textContent = 'EN';
    localStorage.setItem('lang','ar');
  }
}
</script>
@yield('scripts')
</body>
</html>