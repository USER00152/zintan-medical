<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
[data-theme="dark"] .mob-menu{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .footer{background:linear-gradient(160deg,#130D1E,#231830)}
[data-theme="dark"] .sp-card,[data-theme="dark"] .dc,[data-theme="dark"] .fc,
[data-theme="dark"] .ph-card,[data-theme="dark"] .dl-card,[data-theme="dark"] .apt-card,
[data-theme="dark"] .book-card,[data-theme="dark"] .fp,[data-theme="dark"] .doc-list,
[data-theme="dark"] .chat-area,[data-theme="dark"] .ph-card-big,[data-theme="dark"] .sd-card{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .hbadge,[data-theme="dark"] .msg-dr{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] input,[data-theme="dark"] select,[data-theme="dark"] textarea{background:#2D2040!important;color:var(--td)!important;border-color:#3D2D55!important}

body{font-family:var(--font);direction:rtl;background:var(--bg);color:var(--td);overflow-x:hidden}
img{max-width:100%}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:var(--rF);font-weight:700;font-size:14px;border:2px solid transparent;font-family:var(--font);cursor:pointer;transition:.25s;text-decoration:none}
.bp{background:var(--p);color:#fff;box-shadow:var(--sp)}.bp:hover{background:var(--pd);transform:translateY(-2px)}
.bo{background:var(--card);color:var(--p);border-color:var(--bdr)}.bo:hover{border-color:var(--p);background:var(--pl)}
.bsm{padding:8px 16px;font-size:12.5px}

/* NAVBAR */
.nav{background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-bottom:1px solid var(--bds);padding:0 16px;display:flex;align-items:center;justify-content:space-between;height:60px;position:sticky;top:0;z-index:200}
.logo{display:flex;align-items:center;gap:8px;text-decoration:none;flex-shrink:0}
.lm{width:36px;height:36px;border-radius:11px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:var(--sp);flex-shrink:0}
.lm svg{width:20px;height:20px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.ln{font-size:15px;font-weight:900;color:var(--td)}.ln span{color:var(--p)}
.ls{font-size:10px;color:var(--tm)}
.ntabs{display:flex;gap:2px;align-items:center}
.nt{padding:8px 11px;border-radius:var(--rF);font-weight:700;font-size:12.5px;color:var(--tm);border:none;background:none;font-family:var(--font);cursor:pointer;transition:.2s;text-decoration:none;display:inline-block;white-space:nowrap}
.nt:hover,.nt.on{color:var(--p);background:var(--pl)}
.nt.bk{background:var(--p);color:#fff;padding:8px 14px}.nt.bk:hover{background:var(--pd)}
.nav-right{display:flex;align-items:center;gap:6px;flex-shrink:0}
.icon-btn{width:34px;height:34px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;flex-shrink:0}
.icon-btn svg{width:16px;height:16px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.lang-btn{height:32px;padding:0 10px;border-radius:var(--rF);background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;gap:5px;cursor:pointer;font-size:11.5px;font-weight:800;color:var(--p);font-family:var(--font);white-space:nowrap}
.lang-btn svg{width:13px;height:13px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
.uav{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;border:2px solid var(--pl);flex-shrink:0}

/* HAMBURGER */
.hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;padding:5px;border:none;background:none;flex-shrink:0}
.hamburger span{width:22px;height:2.5px;background:var(--p);border-radius:2px;transition:.3s;display:block}
.hamburger.open span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}
.hamburger.open span:nth-child(2){opacity:0}
.hamburger.open span:nth-child(3){transform:rotate(-45deg) translate(5px,-5px)}

/* MOBILE MENU */
.mob-menu{display:none;position:fixed;top:60px;right:0;left:0;background:var(--card);border-bottom:2px solid var(--bds);z-index:199;padding:10px;box-shadow:0 8px 32px rgba(0,0,0,.1);flex-direction:column;gap:4px;max-height:calc(100vh - 60px);overflow-y:auto}
.mob-menu.open{display:flex;animation:slideDown .2s ease}
@keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}
.mob-nt{padding:12px 16px;border-radius:var(--r8);font-weight:700;font-size:14px;color:var(--tm);text-decoration:none;display:block;transition:.2s;font-family:var(--font)}
.mob-nt:hover,.mob-nt.on{color:var(--p);background:var(--pl)}
.mob-nt.bk{background:var(--p);color:#fff;text-align:center;border-radius:var(--rF);margin-top:6px;padding:13px}

/* PG HEADER */
.pg-hd{background:linear-gradient(180deg,var(--pll),var(--bg));padding:20px 16px 16px;border-bottom:1px solid var(--bds)}
.bc{display:flex;align-items:center;gap:7px;font-size:12px;color:var(--tm);margin-bottom:6px;font-weight:600}
.cur{color:var(--p)}
.pg-hd h1{font-size:20px;margin-bottom:3px;color:var(--td);font-weight:800}
.pg-hd p{color:var(--tm);font-size:13px}
.si{max-width:1100px;margin:0 auto;width:100%}
.iw{position:relative}
.iw input,.iw select{width:100%;padding:12px 12px 12px 40px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.iw input:focus,.iw select:focus{outline:none;border-color:var(--p);background:var(--card)}
.iw-ic{position:absolute;top:50%;left:12px;transform:translateY(-50%);color:var(--tl);pointer-events:none}
.iw-ic svg{width:15px;height:15px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}

/* FOOTER */
.footer{background:linear-gradient(160deg,var(--pdd),var(--pd));color:#fff;padding:40px 16px 0}
.fg-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:20px;max-width:1100px;margin:0 auto 24px}
.fg-col h4{font-size:13px;font-weight:800;color:rgba(255,255,255,.95);margin-bottom:10px}
.fg-col p,.fg-col li{font-size:12px;color:rgba(255,255,255,.65);line-height:1.9;list-style:none}
.foot-bot{border-top:1px solid rgba(255,255,255,.12);padding:12px 0;display:flex;align-items:center;justify-content:space-between;max-width:1100px;margin:0 auto;font-size:11.5px;color:rgba(255,255,255,.45);flex-wrap:wrap;gap:6px}

/* ═══ DESKTOP ═══ */
@media(min-width:901px){
  .hamburger{display:none!important}
  .mob-menu{display:none!important}
  .ntabs{display:flex!important}
}

/* ═══ TABLET ═══ */
@media(max-width:900px){
  .ntabs{display:none}
  .hamburger{display:flex}
  .fg-grid{grid-template-columns:1fr 1fr}
}

/* ═══ MOBILE ═══ */
@media(max-width:768px){
  .nav{height:56px;padding:0 12px}
  .lm{width:32px;height:32px}
  .ln{font-size:13.5px}
  .ls{display:none}
  .lang-btn{padding:0 8px;height:30px;font-size:11px}
  .icon-btn{width:30px;height:30px}
  .icon-btn svg{width:14px;height:14px}
  .uav{width:30px;height:30px;font-size:11px}
  .mob-menu{top:56px}

  /* Hero */
  .hero{padding:20px 14px 32px!important}
  .hero-in{display:block!important}
  .hero-vis{display:none!important}
  .hero-ct h1{font-size:22px!important;letter-spacing:0!important}
  .hero-qs{font-size:13px!important}
  .hero-p{font-size:13px!important;margin-bottom:12px!important}
  .hero-feats{gap:8px!important;margin-bottom:16px!important}
  .hf{font-size:12.5px!important}
  .hbadge{font-size:11px!important;padding:5px 12px!important}
  .hero-btns{flex-direction:column!important;gap:8px!important;margin-bottom:20px!important}
  .hero-btns .btn{width:100%!important;justify-content:center!important;font-size:14px!important;padding:13px!important}
  .stats{gap:10px!important;flex-wrap:wrap!important;padding-top:14px!important}
  .stat b{font-size:19px!important}
  .stat span{font-size:10px!important}

  /* Sections */
  .sec{padding:24px 14px!important}
  .sh h2{font-size:19px!important}
  .sh p{font-size:12.5px!important}

  /* Grids */
  .sp-grid{grid-template-columns:1fr 1fr!important;gap:10px!important}
  .sp-grid2{grid-template-columns:1fr 1fr!important;gap:10px!important}
  .doc-grid{grid-template-columns:1fr!important}
  .feat-grid{grid-template-columns:1fr!important}
  .ph-grid{grid-template-columns:1fr!important}
  .fg-grid{grid-template-columns:1fr!important}
  .sp-docs-grid{grid-template-columns:1fr!important}
  .ph-grid{grid-template-columns:1fr 1fr!important}

  /* Doctors page */
  .lay-f{grid-template-columns:1fr!important}
  .fp{display:none!important}
  .srch{grid-template-columns:1fr!important;gap:8px!important}

  /* Booking */
  .book-page{padding:12px!important}
  .book-card{padding:16px!important}
  .book-hero{display:block!important;padding:22px!important}
  .book-hero-anim{display:none!important}
  .grid2,.grid3{grid-template-columns:1fr!important}

  /* Consultation */
  .cons-lay{grid-template-columns:1fr!important}
  .doc-list{max-height:180px;overflow-y:auto}
  .chat-msgs{max-height:260px!important}

  /* Appointments */
  .apt-card{flex-wrap:wrap;gap:8px;padding:14px!important}
  .apt-acts{flex-direction:row!important}

  /* Doctor hero */
  .doc-hero{padding:18px!important}
  .doc-hero-inner{display:block!important}
  .doc-stats{grid-template-columns:1fr 1fr!important;margin-top:14px}

  /* Join */
  .join-page{padding:12px!important}
  .join-hero{padding:22px!important;display:block!important}
  .type-grid{grid-template-columns:1fr!important}
  .form-card{padding:16px!important}

  /* Services */
  div[style*="grid-template-columns:repeat(3"]{display:flex!important;flex-direction:column!important;gap:14px!important}
  div[style*="grid-template-columns:1fr auto"]{display:flex!important;flex-direction:column!important;gap:14px!important}
  div[style*="grid-template-columns:1fr 1fr 1fr"]{display:flex!important;flex-direction:column!important;gap:14px!important}

  /* Pharmacies */
  .ph-search{grid-template-columns:1fr!important;gap:8px!important}
  .ph-grid{grid-template-columns:1fr!important}
}

@media(max-width:480px){
  .sp-grid,.sp-grid2{grid-template-columns:1fr 1fr!important}
  .ph-grid{grid-template-columns:1fr!important}
  .foot-bot{flex-direction:column;text-align:center}
  .hero-ct h1{font-size:20px!important}
  .pg-hd h1{font-size:18px!important}
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
    <a href="{{ route('home') }}" class="nt {{ request()->routeIs('home') || request()->routeIs('home.page') ? 'on' : '' }}" data-ar="الرئيسية" data-en="Home">الرئيسية</a>
    <a href="{{ route('doctors') }}" class="nt {{ request()->routeIs('doctors') ? 'on' : '' }}" data-ar="الأطباء" data-en="Doctors">الأطباء</a>
    <a href="{{ route('specialties') }}" class="nt {{ request()->routeIs('specialties') ? 'on' : '' }}" data-ar="التخصصات" data-en="Specialties">التخصصات</a>
    <a href="{{ route('pharmacies') }}" class="nt {{ request()->routeIs('pharmacies') ? 'on' : '' }}" data-ar="الصيدليات" data-en="Pharmacies">الصيدليات</a>
    <a href="{{ route('appointments') }}" class="nt {{ request()->routeIs('appointments') ? 'on' : '' }}" data-ar="مواعيدي" data-en="Appointments">مواعيدي</a>
    <a href="{{ route('consultation') }}" class="nt {{ request()->routeIs('consultation') ? 'on' : '' }}" data-ar="تواصل مع طبيبك" data-en="Consult">تواصل مع طبيبك</a>
    <a href="{{ route('booking') }}" class="nt bk" data-ar="احجز موعد" data-en="Book Now">احجز موعد</a>
  </div>

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
    <button class="hamburger" onclick="toggleMenu()" id="hamburger" aria-label="القائمة">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<div class="mob-menu" id="mob-menu">
  <a href="{{ route('home') }}" class="mob-nt {{ request()->routeIs('home') ? 'on' : '' }}" data-ar="🏠 الرئيسية" data-en="🏠 Home">🏠 الرئيسية</a>
  <a href="{{ route('doctors') }}" class="mob-nt {{ request()->routeIs('doctors') ? 'on' : '' }}" data-ar="👨‍⚕️ الأطباء" data-en="👨‍⚕️ Doctors">👨‍⚕️ الأطباء</a>
  <a href="{{ route('specialties') }}" class="mob-nt {{ request()->routeIs('specialties') ? 'on' : '' }}" data-ar="🔬 التخصصات" data-en="🔬 Specialties">🔬 التخصصات</a>
  <a href="{{ route('pharmacies') }}" class="mob-nt {{ request()->routeIs('pharmacies') ? 'on' : '' }}" data-ar="💊 الصيدليات" data-en="💊 Pharmacies">💊 الصيدليات</a>
  <a href="{{ route('appointments') }}" class="mob-nt {{ request()->routeIs('appointments') ? 'on' : '' }}" data-ar="📅 مواعيدي" data-en="📅 Appointments">📅 مواعيدي</a>
  <a href="{{ route('consultation') }}" class="mob-nt {{ request()->routeIs('consultation') ? 'on' : '' }}" data-ar="💬 تواصل مع طبيبك" data-en="💬 Consult Doctor">💬 تواصل مع طبيبك</a>
  <a href="{{ route('booking') }}" class="mob-nt bk" data-ar="احجز موعد الآن ←" data-en="Book Now →">احجز موعد الآن ←</a>
</div>

@yield('content')

<footer class="footer">
  <div class="fg-grid">
    <div class="fg-col">
      <div class="logo" style="margin-bottom:12px">
        <div class="lm"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <div class="ln" style="color:#fff;font-size:15px">منصة <span style="color:rgba(255,255,255,.7)">الزنتان</span></div>
      </div>
      <p data-ar="منصتك الموثوقة لحجز المواعيد الطبية في مدينة الزنتان، ليبيا." data-en="Your trusted platform for medical appointments in Zintan, Libya.">منصتك الموثوقة لحجز المواعيد الطبية في مدينة الزنتان، ليبيا.</p>
    </div>
    <div class="fg-col"><h4 data-ar="روابط سريعة" data-en="Quick Links">روابط سريعة</h4><ul><li data-ar="الرئيسية" data-en="Home">الرئيسية</li><li data-ar="الأطباء" data-en="Doctors">الأطباء</li><li data-ar="التخصصات" data-en="Specialties">التخصصات</li><li data-ar="الصيدليات" data-en="Pharmacies">الصيدليات</li></ul></div>
    <div class="fg-col"><h4 data-ar="حسابي" data-en="My Account">حسابي</h4><ul><li data-ar="مواعيدي" data-en="My Appointments">مواعيدي</li><li data-ar="تواصل مع طبيبك" data-en="Consult Doctor">تواصل مع طبيبك</li><li data-ar="احجز موعد" data-en="Book Appointment">احجز موعد</li></ul></div>
    <div class="fg-col"><h4 data-ar="تواصل معنا" data-en="Contact Us">تواصل معنا</h4><ul><li>مدينة الزنتان، ليبيا</li><li>info@zintanmed.ly</li><li>091-000-0000</li></ul></div>
  </div>
  <div class="foot-bot">
    <span data-ar="© 2026 منصة الزنتان الطبية" data-en="© 2026 Zintan Medical Platform">© 2026 منصة الزنتان الطبية</span>
    <span data-ar="مشروع تخرج" data-en="Graduation Project">مشروع تخرج</span>
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

// Theme
if (localStorage.getItem('theme') === 'dark') {
  html.setAttribute('data-theme', 'dark');
  document.getElementById('moon-icon').style.display = 'none';
  document.getElementById('sun-icon').style.display = 'block';
}

// Language
const savedLang = localStorage.getItem('lang') || 'ar';
if (savedLang === 'en') applyLang('en');

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
  const current = localStorage.getItem('lang') || 'ar';
  const next = current === 'ar' ? 'en' : 'ar';
  applyLang(next);
  localStorage.setItem('lang', next);
}

function applyLang(lang) {
  if (lang === 'en') {
    html.setAttribute('lang', 'en');
    html.setAttribute('dir', 'ltr');
    document.getElementById('lang-label').textContent = 'AR';
  } else {
    html.setAttribute('lang', 'ar');
    html.setAttribute('dir', 'rtl');
    document.getElementById('lang-label').textContent = 'EN';
  }
  document.querySelectorAll('[data-ar][data-en]').forEach(function(el) {
    el.textContent = lang === 'en' ? el.getAttribute('data-en') : el.getAttribute('data-ar');
  });
}

function toggleMenu() {
  const menu = document.getElementById('mob-menu');
  const btn = document.getElementById('hamburger');
  const isOpen = menu.classList.contains('open');
  if (isOpen) {
    menu.classList.remove('open');
    btn.classList.remove('open');
  } else {
    menu.classList.add('open');
    btn.classList.add('open');
  }
}

document.addEventListener('click', function(e) {
  const menu = document.getElementById('mob-menu');
  const btn = document.getElementById('hamburger');
  if (menu && btn && !menu.contains(e.target) && !btn.contains(e.target)) {
    menu.classList.remove('open');
    btn.classList.remove('open');
  }
});

window.addEventListener('resize', function() {
  if (window.innerWidth > 900) {
    const menu = document.getElementById('mob-menu');
    const btn = document.getElementById('hamburger');
    if (menu) menu.classList.remove('open');
    if (btn) btn.classList.remove('open');
  }
});
</script>
@yield('scripts')
</body>
</html>
