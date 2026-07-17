<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'منصة الزنتان الطبية')</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
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

/* DARK MODE */
[data-theme="dark"]{
  --p:#9B85CC;--pd:#7B65AC;--pdd:#5B459C;
  --pl:#2D2040;--pll:#231830;
  --td:#E8E0F0;--tm:#9B8AB0;--tl:#6B5A80;
  --bg:#1A1225;--card:#231830;--bdr:#3D2D55;--bds:#2D2040;
  --s1:0 2px 10px rgba(155,133,204,.2);
  --s2:0 8px 28px rgba(155,133,204,.3);
  --s3:0 20px 52px rgba(155,133,204,.4);
  --sp:0 8px 28px rgba(155,133,204,.5);
}
[data-theme="dark"] .nav{background:rgba(35,24,48,.97);border-color:#3D2D55}
[data-theme="dark"] .footer{background:linear-gradient(160deg,#130D1E,#231830)}
[data-theme="dark"] .iw input,[data-theme="dark"] .iw select,[data-theme="dark"] textarea{background:#2D2040;color:var(--td);border-color:#3D2D55}
[data-theme="dark"] .dc-cov{background:linear-gradient(120deg,#2D2040,#3D2D55)}
[data-theme="dark"] .sp-card,[data-theme="dark"] .dc,[data-theme="dark"] .fc,[data-theme="dark"] .ph-card,[data-theme="dark"] .dl-card,[data-theme="dark"] .apt-card,[data-theme="dark"] .book-card,[data-theme="dark"] .fp,[data-theme="dark"] .doc-list,[data-theme="dark"] .chat-area,[data-theme="dark"] .ph-card-big,[data-theme="dark"] .sd-card{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .hbadge,[data-theme="dark"] .msg-dr{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] .chat-inp input,[data-theme="dark"] .chat-inp-ph input{background:#2D2040;border-color:#3D2D55;color:var(--td)}

body{font-family:var(--font);direction:rtl;background:var(--bg);color:var(--td);overflow-x:hidden}
.btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:var(--rF);font-weight:700;font-size:14px;border:2px solid transparent;font-family:var(--font);cursor:pointer;transition:.25s}
.bp{background:var(--p);color:#fff;box-shadow:var(--sp)}.bp:hover{background:var(--pd);transform:translateY(-2px)}
.bo{background:var(--card);color:var(--p);border-color:var(--bdr)}.bo:hover{border-color:var(--p);background:var(--pl)}
.bsm{padding:8px 16px;font-size:12.5px}

/* NAVBAR */
.nav{background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-bottom:1px solid var(--bds);padding:0 28px;display:flex;align-items:center;justify-content:space-between;height:68px;position:sticky;top:0;z-index:100}
.logo{display:flex;align-items:center;gap:10px;cursor:pointer;text-decoration:none}
.lm{width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:var(--sp)}
.lm svg{width:22px;height:22px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.ln{font-size:16px;font-weight:900;color:var(--td)}.ln span{color:var(--p)}
.ls{font-size:10px;color:var(--tm)}
.ntabs{display:flex;gap:2px}
.nt{padding:9px 14px;border-radius:var(--rF);font-weight:700;font-size:13px;color:var(--tm);border:none;background:none;font-family:var(--font);cursor:pointer;transition:.2s;text-decoration:none;display:inline-block}
.nt:hover,.nt.on{color:var(--p);background:var(--pl)}
.nt.bk{background:var(--p);color:#fff}.nt.bk:hover{background:var(--pd)}
.nav-actions{display:flex;align-items:center;gap:8px}
.icon-btn{width:36px;height:36px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;font-family:var(--font)}
.icon-btn:hover{border-color:var(--p);background:var(--pl)}
.icon-btn svg{width:17px;height:17px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.lang-btn{height:36px;padding:0 12px;border-radius:var(--rF);background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;gap:6px;cursor:pointer;font-size:12px;font-weight:800;color:var(--p);font-family:var(--font);transition:.2s}
.lang-btn:hover{border-color:var(--p)}
.lang-btn svg{width:15px;height:15px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
.uav{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:800;border:2px solid var(--pl)}

/* PG HEADER */
.pg-hd{background:linear-gradient(180deg,var(--pll),var(--bg));padding:30px 28px 24px;border-bottom:1px solid var(--bds)}
.bc{display:flex;align-items:center;gap:7px;font-size:12.5px;color:var(--tm);margin-bottom:10px;font-weight:600}
.cur{color:var(--p)}
.pg-hd h1{font-size:24px;margin-bottom:4px;color:var(--td);font-weight:800}
.pg-hd p{color:var(--tm);font-size:13.5px}
.si{max-width:1100px;margin:0 auto}
.iw{position:relative}
.iw input,.iw select{width:100%;padding:12px 12px 12px 42px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.iw input:focus,.iw select:focus{outline:none;border-color:var(--p);background:var(--card);box-shadow:0 0 0 4px rgba(178,221,184,.15)}
.iw-ic{position:absolute;top:50%;left:13px;transform:translateY(-50%);color:var(--tl);pointer-events:none}
.iw-ic svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}

/* FOOTER */
.footer{background:linear-gradient(160deg,var(--pdd),var(--pd));color:#fff;padding:48px 28px 0}
.fg-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:24px;max-width:1100px;margin:0 auto 32px}
.fg-col h4{font-size:13.5px;font-weight:800;color:rgba(255,255,255,.95);margin-bottom:12px}
.fg-col p,.fg-col li{font-size:12.5px;color:rgba(255,255,255,.65);line-height:1.9}
.foot-bot{border-top:1px solid rgba(255,255,255,.12);padding:14px 0;display:flex;align-items:center;justify-content:space-between;max-width:1100px;margin:0 auto;font-size:12px;color:rgba(255,255,255,.45)}

@media (max-width: 768px) {
  .nav{padding:0 16px;height:60px}
  .ntabs{display:none}
  .hero-in{grid-template-columns:1fr;gap:24px}
  .hero-ct h1{font-size:26px}
  .hero-btns{flex-direction:column}
  .stats{gap:14px}
  .stat b{font-size:18px}
  .sp-grid{grid-template-columns:repeat(2,1fr)}
  .doc-grid{grid-template-columns:1fr}
  .feat-grid{grid-template-columns:1fr}
  .ph-grid{grid-template-columns:1fr}
  .fg-grid{grid-template-columns:1fr}
  .hero-vis{display:none}
  .lay-f{grid-template-columns:1fr}
  .fp{display:none}
  .cons-lay{grid-template-columns:1fr}
  .srch{grid-template-columns:1fr}
  .grid2,.grid3{grid-template-columns:1fr}
  .book-hero{grid-template-columns:1fr}
  .book-hero-anim{display:none}
  .doc-hero-inner{grid-template-columns:1fr}
  .doc-stats{grid-template-columns:1fr 1fr}
  div[style*="grid-template-columns:repeat(3"]{display:flex!important;flex-direction:column}
  div[style*="grid-template-columns:1fr auto"]{display:flex!important;flex-direction:column}
}

@media (max-width: 480px) {
  .sp-grid{grid-template-columns:repeat(2,1fr)}
  .nav-actions .lang-btn span{display:none}
}

@yield('styles')
</style>
</head>
<body>

<nav class="nav">
  <a href="{{ route('home') }}" class="logo">
    <div class="lm"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
    <div><div class="ln">منصة <span>الزنتان</span></div><div class="ls">Zintan Medical</div></div>
  </a>

  <div class="ntabs">
    <a href="{{ route('home') }}" class="nt {{ request()->routeIs('home') || request()->routeIs('home.page') ? 'on' : '' }}">الرئيسية</a>
    <a href="{{ route('doctors') }}" class="nt {{ request()->routeIs('doctors') ? 'on' : '' }}">الأطباء</a>
    <a href="{{ route('specialties') }}" class="nt {{ request()->routeIs('specialties') ? 'on' : '' }}">التخصصات</a>
    <a href="{{ route('pharmacies') }}" class="nt {{ request()->routeIs('pharmacies') ? 'on' : '' }}">الصيدليات</a>
    <a href="{{ route('appointments') }}" class="nt {{ request()->routeIs('appointments') ? 'on' : '' }}">مواعيدي</a>
    <a href="{{ route('consultation') }}" class="nt {{ request()->routeIs('consultation') ? 'on' : '' }}">تواصل مع طبيبك</a>
    <a href="{{ route('booking') }}" class="nt bk">احجز موعد</a>
  </div>

  <div class="nav-actions">
    <!-- زر اللغة -->
    <button class="lang-btn" onclick="toggleLang()" id="lang-btn">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
      <span id="lang-label">AR</span>
    </button>

    <!-- زر الوضع الليلي -->
    <button class="icon-btn" onclick="toggleDark()" id="theme-btn" title="الوضع الليلي">
      <svg id="moon-icon" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      <svg id="sun-icon" viewBox="0 0 24 24" style="display:none"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
    </button>

    <!-- أفاتار المستخدم -->
    <div class="uav" id="user-avatar">م</div>
  </div>
</nav>

@yield('content')

<footer class="footer">
  <div class="fg-grid">
    <div class="fg-col">
      <div class="logo" style="margin-bottom:12px">
        <div class="lm"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <div class="ln" style="color:#fff;font-size:15px">منصة <span style="color:rgba(255,255,255,.7)">الزنتان</span></div>
      </div>
      <p>منصتك الموثوقة لحجز المواعيد الطبية في مدينة الزنتان، ليبيا.</p>
    </div>
    <div class="fg-col"><h4>روابط سريعة</h4><ul><li>الرئيسية</li><li>الأطباء</li><li>التخصصات</li><li>الصيدليات</li></ul></div>
    <div class="fg-col"><h4>حسابي</h4><ul><li>مواعيدي</li><li>تواصل مع طبيبك</li><li>احجز موعد</li></ul></div>
    <div class="fg-col"><h4>تواصل معنا</h4><ul><li>مدينة الزنتان، ليبيا</li><li>info@zintanmed.ly</li><li>091-000-0000</li></ul></div>
  </div>
  <div class="foot-bot"><span>© 2026 منصة الزنتان الطبية</span><span>مشروع تخرج</span></div>
</footer>

<script>
const API = 'http://127.0.0.1:8000/api';
const token = localStorage.getItem('token');
const user = JSON.parse(localStorage.getItem('user') || '{}');

if (user && user.name) {
  document.getElementById('user-avatar').textContent = user.name.charAt(0);
}

// تطبيق الثيم المحفوظ
if (localStorage.getItem('theme') === 'dark') {
  document.documentElement.setAttribute('data-theme', 'dark');
  document.getElementById('moon-icon').style.display = 'none';
  document.getElementById('sun-icon').style.display = 'block';
}

// تطبيق اللغة المحفوظة
if (localStorage.getItem('lang') === 'en') {
  document.documentElement.setAttribute('lang', 'en');
  document.documentElement.setAttribute('dir', 'ltr');
  document.getElementById('lang-label').textContent = 'EN';
}

function toggleDark() {
  const html = document.documentElement;
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
  const html = document.documentElement;
  const isAr = html.getAttribute('lang') === 'ar';
  if (isAr) {
    html.setAttribute('lang','en');
    html.setAttribute('dir','ltr');
    document.getElementById('lang-label').textContent = 'EN';
    localStorage.setItem('lang','en');
  } else {
    html.setAttribute('lang','ar');
    html.setAttribute('dir','rtl');
    document.getElementById('lang-label').textContent = 'AR';
    localStorage.setItem('lang','ar');
  }
}
</script>
@yield('scripts')
</body>
</html>