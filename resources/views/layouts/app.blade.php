<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --p:#00A887;    /* الأخضر الأساسي */
  --pd:#008F72;   /* أخضر أغمق للحوامات */
  --pdd:#006651;  /* الأخضر الداكن للنصوص */
  --pl:#E6F6F3;   /* خلفية خضراء ناعمة */
  --pll:#F2FAF8;  
  --td:#1B2B28;   /* لون النص الأساسي */
  --tm:#526E68;   /* لون النص المتوسط */
  --tl:#8FA39F;   
  --bg:#F7FAf9;   /* خلفية الصفحة العامة */
  --card:#fff;
  --bdr:#CCEBE4;  
  --bds:#E6F2EF;
  
  --ok:#22a55e;--ac:#f0a93a;--err:#e74c3c;
  --r8:8px;--r14:14px;--r22:22px;--rF:999px;
  --s1:0 2px 10px rgba(0,168,135,.08);
  --s2:0 8px 28px rgba(0,168,135,.12);
  --s3:0 20px 52px rgba(0,168,135,.15);
  --sp:0 8px 28px rgba(0,168,135,.25);
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
[data-theme="dark"] .footer{background:linear-gradient(180deg,#171221, #231830);border-top: 1px solid #3d2d55;}
[data-theme="dark"] .sp-card,[data-theme="dark"] .dc,[data-theme="dark"] .fc,
[data-theme="dark"] .ph-card,[data-theme="dark"] .dl-card,[data-theme="dark"] .apt-card,
[data-theme="dark"] .book-card,[data-theme="dark"] .fp,[data-theme="dark"] .doc-list,
[data-theme="dark"] .chat-area,[data-theme="dark"] .ph-card-big,[data-theme="dark"] .sd-card{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .hbadge,[data-theme="dark"] .msg-dr{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] input,[data-theme="dark"] select,[data-theme="dark"] textarea{background:#2D2040!important;color:var(--td)!important;border-color:#3D2D55!important}

body{font-family:var(--font);direction:rtl;background:var(--bg);color:var(--td);overflow-x:hidden;width:100%;min-height:100vh;display:flex;flex-direction:column}

main {
  display: block;
  width: 100%;
  clear: both;
}

.btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:var(--rF);font-weight:700;font-size:14px;border:2px solid transparent;font-family:var(--font);cursor:pointer;transition:.25s;text-decoration:none}
.bp{background:var(--p);color:#fff;box-shadow:var(--sp)}.bp:hover{background:var(--pd);transform:translateY(-2px)}
.bo{background:var(--card);color:var(--p);border-color:var(--bdr)}.bo:hover{border-color:var(--p);background:var(--pl)}
.bsm{padding:8px 16px;font-size:12.5px}

/* NAVBAR */
.nav{background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-bottom:1px solid var(--bds);padding:10px 20px 0;position:sticky;top:0;z-index:200;width:100%;box-shadow: var(--s1);}
.nav-top{display:flex;align-items:center;justify-content:space-between;width:100%;padding-bottom:8px}
.logo{display:flex;align-items:center;gap:10px;text-decoration:none;flex-shrink:0}
.lm{width:38px;height:38px;border-radius:12px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:var(--sp);flex-shrink:0}
.lm svg{width:22px;height:22px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.ln{font-size:16px;font-weight:900;color:var(--td);line-height:1.2}.ln span{color:var(--p)}
.ls{font-size:10px;color:var(--tm);font-weight:600}
.nav-right{display:flex;align-items:center;gap:8px;flex-shrink:0}
.icon-btn{width:36px;height:36px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;flex-shrink:0}
.icon-btn svg{width:18px;height:18px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.lang-btn{height:34px;padding:0 12px;border-radius:var(--rF);background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;gap:5px;cursor:pointer;font-size:12px;font-weight:800;color:var(--p);font-family:var(--font);white-space:nowrap}
.uav{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:800;border:2px solid var(--pl);flex-shrink:0}

/* TABS ROW */
.nav-tabs{display:flex;gap:4px;width:100%;padding-bottom:8px;border-top:1px solid var(--bds);padding-top:8px;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch}
.nav-tabs::-webkit-scrollbar{display:none}
.nt{padding:8px 16px;border-radius:var(--rF);font-weight:700;font-size:13.5px;color:var(--tm);border:none;background:none;font-family:var(--font);cursor:pointer;transition:.2s;text-decoration:none;display:inline-block;white-space:nowrap;flex-shrink:0}
.nt:hover,.nt.on{color:var(--p);background:var(--pl)}
.nt.bk{background:var(--p);color:#fff;margin-right:auto}

/* MOBILE TABS BAR */
.mob-tabs-bar{display:none;background:var(--card);border-bottom:1px solid var(--bds);padding:6px 8px;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch;position:sticky;top:54px;z-index:198;gap:4px;width:100%;box-shadow: var(--s1);}
.mob-tabs-bar::-webkit-scrollbar{display:none}
.mob-t{padding:6px 12px;border-radius:var(--rF);font-size:11.5px;font-weight:700;color:var(--tm);white-space:nowrap;border:none;background:none;font-family:var(--font);cursor:pointer;text-decoration:none;display:inline-block;transition:.2s;flex-shrink:0}
.mob-t:hover,.mob-t.on{color:var(--p);background:var(--pl)}
.mob-t.bk{background:var(--p);color:#fff;margin-right:auto}

/* PG HEADER */
.pg-hd{background:linear-gradient(180deg,var(--pll),var(--bg));padding:20px 20px 16px;border-bottom:1px solid var(--bds);width:100%}
.bc{display:flex;align-items:center;gap:7px;font-size:12px;color:var(--tm);margin-bottom:6px;font-weight:600}
.cur{color:var(--p)}
.pg-hd h1{font-size:22px;margin-bottom:3px;color:var(--td);font-weight:800}
.pg-hd p{color:var(--tm);font-size:13px}
.si{max-width:1100px;margin:0 auto;width:100%;padding:0 20px;box-sizing: border-box;}
.iw{position:relative}
.iw input,.iw select{width:100%;padding:12px 12px 12px 40px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}

/* FOOTER */
.footer{
  background: linear-gradient(145deg, var(--pdd), var(--pd));
  color: #fff;
  padding: 40px 0 0;
  width: 100%;
  margin-top: auto;
  box-shadow: 0 -4px 20px rgba(0, 168, 135, 0.1);
}
.fg-grid{
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr 1fr;
  gap: 24px;
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 20px 30px;
}
.fg-col h4{
  font-size: 14px;
  font-weight: 800;
  color: #fff;
  margin-bottom: 12px;
  position: relative;
  padding-bottom: 6px;
}
.fg-col h4::after{
  content: ''; position: absolute; bottom: 0; right: 0; width: 25px; height: 2px; background: rgba(255,255,255,0.5);
}
.fg-col p{ font-size: 12.5px; color: rgba(255,255,255,0.85); line-height: 1.7; }
.fg-col ul{ list-style: none; }
.fg-col li{ margin-bottom: 8px; }
.fg-col li a{
  font-size: 12.5px; color: rgba(255,255,255,0.8); text-decoration: none; transition: 0.2s; display: inline-block;
}
.fg-col li a:hover{ color: #fff; transform: translateX(-3px); }
.foot-contact-item{ display: flex; align-items: center; gap: 8px; margin-bottom: 10px; font-size: 12.5px; color: rgba(255,255,255,0.85); }
.foot-contact-item svg{ width: 14px; height: 14px; stroke: #fff; fill: none; stroke-width: 2; }
.foot-bot{
  border-top: 1px solid rgba(255,255,255,0.1); padding: 15px 20px; display: flex; align-items: center; justify-content: space-between; max-width: 1100px; margin: 0 auto; font-size: 12px; color: rgba(255,255,255,0.7);
}
.foot-bot span:last-child {
  background: rgba(255, 255, 255, 0.12); padding: 3px 10px; border-radius: var(--rF); font-weight: 700; font-size: 11px;
}

/* ═══ التعديل الذكي والناعم لشاشات الهواتف ═══ */
@media(max-width:900px){
  .nav-tabs{display:none}
  .mob-tabs-bar{display:flex}
  .fg-grid{grid-template-columns: 1fr 1fr; gap: 20px;}
}

@media(max-width:768px){
  /* منع الزحف لليسار وتهيئة الأبعاد بالملي */
  html, body { overflow-x: hidden; width: 100%; }
  
  .nav{padding:8px 12px 0; top:0; height: 54px;}
  .lm{width:32px;height:32px; border-radius: 9px;}
  .lm svg{width:18px;height:18px}
  .ln{font-size:13.5px}.ls{display:none}
  .lang-btn{padding:0 8px;height:30px;font-size:11px}
  .icon-btn{width:30px;height:30px}.icon-btn svg{width:14px;height:14px}
  .uav{width:30px;height:30px;font-size:12px}
  
  .mob-tabs-bar{top:54px;padding:5px 8px}
  .mob-t{font-size:11px;padding:5px 10px}
  
  .si{padding:0 12px !important}
  .pg-hd{padding:14px 12px!important}
  
  /* معالجة أحجام العناصر داخل السكاشن لتكون ناعمة ومناسبة للموبايل */
  .btn { padding: 10px 18px; font-size: 13px; }
  
  /* إلغاء الـ grid القاسي وتحويله لتدفق مرن يمنع تداخل السكاشن */
  .sp-grid, .sp-grid2, .doc-grid, .feat-grid, .ph-grid, .sp-docs-grid, .lay-f, .srch, .grid2, .grid3, .fg-grid {
    grid-template-columns: 1fr !important;
    gap: 12px !important;
    width: 100% !important;
  }
  
  .fp{display:none!important}
  
  /* الحفاظ على أبعاد الكروت والمدخلات بداخل الشاشة */
  table, .card, .container, input, select, textarea {
    width: 100% !important;
    max-width: 100% !important;
    box-sizing: border-box !important;
  }
  
  /* الفوتر على الموبايل */
  .footer{padding:30px 0 0!important}
  .fg-grid{padding: 0 15px 20px; gap: 16px;}
  .fg-col h4 { margin-bottom: 8px; font-size: 13px; }
  .foot-bot { padding: 12px 15px; font-size: 11px; }
}

@media(max-width:480px){
  /* للهواتف الصغيرة جداً */
  .fg-grid{grid-template-columns: 1fr !important; gap: 16px;}
  .foot-bot{flex-direction:column; text-align:center; gap:6px; padding:12px 10px;}
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

<!-- محتوى الصفحات الفرعية الممرر من Laravel -->
<main>
  @yield('content')
</main>

<!-- الفوتر المتناسق والأنيق -->
<footer class="footer">
  <div class="fg-grid">
    <div class="fg-col">
      <div class="logo" style="margin-bottom:12px">
        <div class="lm"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <div class="ln" style="color:#fff;font-size:15px">منصة <span style="color:rgba(255,255,255,.7)">الزنتان</span></div>
      </div>
      <p>منصتك الطبية الموثوقة لحجز المواعيد والخدمات الطبية في مدينة الزنتان.</p>
    </div>
    <div class="fg-col">
      <h4>روابط سريعة</h4>
      <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('doctors') }}">الأطباء</a></li>
        <li><a href="{{ route('specialties') }}">التخصصات</a></li>
        <li><a href="{{ route('pharmacies') }}">الصيدليات</a></li>
      </ul>
    </div>
    <div class="fg-col">
      <h4>حسابي</h4>
      <ul>
        <li><a href="{{ route('appointments') }}">مواعيدي</a></li>
        <li><a href="{{ route('consultation') }}">تواصل مع طبيبك</a></li>
        <li><a href="{{ route('booking') }}">احجز موعد</a></li>
      </ul>
    </div>
    <div class="fg-col">
      <h4>تواصل معنا</h4>
      <div class="foot-contact-item">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <span>مدينة الزنتان، ليبيا</span>
      </div>
      <div class="foot-contact-item">
        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <span>info@zintanmed.ly</span>
      </div>
    </div>
  </div>
  <div class="foot-bot">
    <span>© 2026 منصة الزنتان الطبية</span>
    <span>مشروع تخرج</span>
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