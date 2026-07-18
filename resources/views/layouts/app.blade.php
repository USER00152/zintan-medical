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
  --sp:0 8px 28px rgba(155,133,204,.5);
}
[data-theme="dark"] .nav{background:rgba(35,24,48,.97);border-color:#3D2D55}
[data-theme="dark"] .mob-menu{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .mob-item-desc{background:#2D2040}
[data-theme="dark"] .footer{background:linear-gradient(160deg,#130D1E,#231830)}
[data-theme="dark"] .sp-card,[data-theme="dark"] .dc,[data-theme="dark"] .fc,
[data-theme="dark"] .ph-card,[data-theme="dark"] .dl-card,[data-theme="dark"] .apt-card,
[data-theme="dark"] .book-card,[data-theme="dark"] .fp,[data-theme="dark"] .doc-list,
[data-theme="dark"] .chat-area,[data-theme="dark"] .ph-card-big,[data-theme="dark"] .sd-card{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .hbadge,[data-theme="dark"] .msg-dr{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] input,[data-theme="dark"] select,[data-theme="dark"] textarea{background:#2D2040!important;color:var(--td)!important;border-color:#3D2D55!important}

body{font-family:var(--font);direction:rtl;background:var(--bg);color:var(--td);overflow-x:hidden}

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
.nt.bk{background:var(--p);color:#fff}.nt.bk:hover{background:var(--pd)}
.nav-right{display:flex;align-items:center;gap:6px;flex-shrink:0}
.icon-btn{width:34px;height:34px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;flex-shrink:0}
.icon-btn svg{width:16px;height:16px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.lang-btn{height:32px;padding:0 10px;border-radius:var(--rF);background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;gap:5px;cursor:pointer;font-size:11.5px;font-weight:800;color:var(--p);font-family:var(--font);white-space:nowrap}
.lang-btn svg{width:13px;height:13px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
.uav{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;border:2px solid var(--pl);flex-shrink:0}
.hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;padding:5px;border:none;background:none;flex-shrink:0}
.hamburger span{width:22px;height:2.5px;background:var(--p);border-radius:2px;transition:.3s;display:block}
.hamburger.open span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}
.hamburger.open span:nth-child(2){opacity:0}
.hamburger.open span:nth-child(3){transform:rotate(-45deg) translate(5px,-5px)}

/* MOBILE MENU */
/* MOBILE TABS BAR */
.mob-menu{
  display:none;
  position:sticky;
  top:56px;
  background:var(--card);
  border-bottom:2px solid var(--bds);
  z-index:199;
  padding:8px 10px;
  box-shadow:0 2px 8px rgba(0,0,0,.06);
}
.mob-menu.open{
  display:block;
}
.mob-tabs-scroll{
  display:flex;
  gap:6px;
  overflow-x:auto;
  scrollbar-width:none;
  -webkit-overflow-scrolling:touch;
  padding-bottom:2px;
}
.mob-tabs-scroll::-webkit-scrollbar{display:none}
.mob-nt{
  padding:8px 14px;
  border-radius:var(--rF);
  font-size:12px;
  font-weight:700;
  color:var(--tm);
  white-space:nowrap;
  border:none;
  background:none;
  font-family:var(--font);
  cursor:pointer;
  text-decoration:none;
  display:inline-block;
  transition:.2s;
  flex-shrink:0;
}
.mob-nt:hover,.mob-nt.on{color:var(--p);background:var(--pl)}
.mob-nt.bk{background:var(--p);color:#fff}
@keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}

/* كل عنصر في القائمة له سهم وشرح */
.mob-item{border-radius:var(--r8);overflow:hidden}
.mob-item-btn{width:100%;display:flex;align-items:center;justify-content:space-between;padding:12px 14px;font-weight:700;font-size:13.5px;color:var(--tm);text-decoration:none;background:none;border:none;font-family:var(--font);cursor:pointer;transition:.2s;text-align:right}
.mob-item-btn:hover,.mob-item-btn.on{color:var(--p);background:var(--pl)}
.mob-item-btn.on{border-right:3px solid var(--p)}
.mob-item-left{display:flex;align-items:center;gap:10px}
.mob-item-arrow{width:20px;height:20px;border-radius:50%;background:var(--bg);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:.3s}
.mob-item-arrow svg{width:12px;height:12px;fill:none;stroke:var(--tm);stroke-width:2;stroke-linecap:round;transition:.3s}
.mob-item-btn.active .mob-item-arrow{background:var(--pl);transform:rotate(180deg)}
.mob-item-btn.active .mob-item-arrow svg{stroke:var(--p)}

/* الشرح المنسدل */
.mob-item-desc{display:none;background:var(--bg);border-top:1px solid var(--bds);padding:12px 14px}
.mob-item-desc.open{display:block;animation:fadeIn .2s ease}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
.mob-item-desc p{font-size:12.5px;color:var(--tm);line-height:1.7;margin-bottom:10px}
.mob-item-desc a{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;background:var(--p);color:#fff;border-radius:var(--rF);font-size:12.5px;font-weight:700;text-decoration:none;transition:.2s}
.mob-item-desc a:hover{background:var(--pd)}
.mob-item-desc a svg{width:13px;height:13px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}

/* زر احجز موعد في الموبايل */
.mob-book{display:block;margin:6px 0 2px;padding:13px;background:var(--p);color:#fff;text-align:center;border-radius:var(--rF);font-size:14px;font-weight:800;text-decoration:none;transition:.2s}
.mob-book:hover{background:var(--pd)}

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

/* RESPONSIVE */
@media(min-width:901px){.hamburger{display:none!important}.mob-menu{display:none!important}.ntabs{display:flex!important}}
@media(max-width:900px){.ntabs{display:none}.hamburger{display:flex}.fg-grid{grid-template-columns:1fr 1fr}}
@media(max-width:768px){
  .nav{height:56px;padding:0 12px}
  .lm{width:32px;height:32px}.ln{font-size:13.5px}.ls{display:none}
  .lang-btn{padding:0 8px;height:30px;font-size:11px}
  .icon-btn{width:30px;height:30px}.icon-btn svg{width:14px;height:14px}
  .uav{width:30px;height:30px;font-size:11px}
  .mob-menu{top:56px}
  .hero{padding:20px 14px 32px!important}
  .hero-in{display:grid!important;grid-template-columns:1fr 1fr!important;gap:12px!important;align-items:center!important}
  .hero-vis{display:flex!important;align-items:center!important;justify-content:center!important}
  .hero-ct h1{font-size:19px!important;letter-spacing:0!important}
  .hero-qs{font-size:12px!important}
  .hero-p{font-size:12px!important;margin-bottom:10px!important}
  .hero-feats{gap:6px!important;margin-bottom:12px!important}
  .hf{font-size:11px!important}
  .hbadge{font-size:10px!important;padding:4px 10px!important}
  .hero-btns{flex-direction:column!important;gap:7px!important;margin-bottom:16px!important}
  .hero-btns .btn{width:100%!important;justify-content:center!important;font-size:13px!important;padding:11px!important}
  .stats{gap:8px!important;flex-wrap:wrap!important;padding-top:12px!important}
  .stat b{font-size:16px!important}.stat span{font-size:9px!important}
  .sec{padding:22px 14px!important}
  .sh h2{font-size:17px!important}.sh p{font-size:12px!important}
  .sp-grid{grid-template-columns:1fr 1fr!important;gap:9px!important}
  .sp-grid2{grid-template-columns:1fr 1fr!important;gap:9px!important}
  .doc-grid{grid-template-columns:1fr!important}
  .feat-grid{grid-template-columns:1fr 1fr!important;gap:9px!important}
  .ph-grid{grid-template-columns:1fr 1fr!important;gap:8px!important}
  .fg-grid{grid-template-columns:1fr!important}
  .sp-docs-grid{grid-template-columns:1fr!important}
  .lay-f{grid-template-columns:1fr!important}
  .fp{display:none!important}
  .srch{grid-template-columns:1fr!important;gap:8px!important}
  .book-page{padding:12px!important}
  .book-card{padding:16px!important}
  .book-hero{display:block!important;padding:20px!important}
  .book-hero-anim{display:none!important}
  .grid2,.grid3{grid-template-columns:1fr!important}
  .cons-lay{grid-template-columns:1fr!important}
  .doc-list{max-height:180px;overflow-y:auto}
  .apt-card{flex-wrap:wrap;gap:8px;padding:14px!important}
  .doc-hero{padding:16px!important}
  .doc-hero-inner{display:block!important}
  .doc-stats{grid-template-columns:1fr 1fr!important;margin-top:12px}
  .join-page{padding:12px!important}
  .join-hero{padding:20px!important;display:block!important}
  .type-grid{grid-template-columns:1fr!important}
  .form-card{padding:16px!important}
  /* الخدمات والشراكة 3 أعمدة على الموبايل */
  div[style*="grid-template-columns:repeat(3"]{display:grid!important;grid-template-columns:1fr 1fr 1fr!important;gap:8px!important}
  div[style*="grid-template-columns:1fr auto"]{display:flex!important;flex-direction:column!important;gap:12px!important}
  div[style*="grid-template-columns:1fr 1fr 1fr"]{display:grid!important;grid-template-columns:1fr 1fr 1fr!important;gap:8px!important}
  .ph-search{grid-template-columns:1fr!important;gap:8px!important}
}
@media(max-width:480px){
  .sp-grid,.sp-grid2{grid-template-columns:1fr 1fr!important}
  .feat-grid{grid-template-columns:1fr 1fr!important}
  .ph-grid{grid-template-columns:1fr!important}
  .fg-grid{grid-template-columns:1fr!important}
  .hero-ct h1{font-size:17px!important}
  .foot-bot{flex-direction:column;text-align:center}
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

  <div class="mob-menu open" id="mob-menu">
  <div class="mob-tabs-scroll">
    <a href="{{ route('home') }}" class="mob-nt {{ request()->routeIs('home') ? 'on' : '' }}">🏠 الرئيسية</a>
    <a href="{{ route('doctors') }}" class="mob-nt {{ request()->routeIs('doctors') ? 'on' : '' }}">👨‍⚕️ الأطباء</a>
    <a href="{{ route('specialties') }}" class="mob-nt {{ request()->routeIs('specialties') ? 'on' : '' }}">🔬 التخصصات</a>
    <a href="{{ route('pharmacies') }}" class="mob-nt {{ request()->routeIs('pharmacies') ? 'on' : '' }}">💊 الصيدليات</a>
    <a href="{{ route('appointments') }}" class="mob-nt {{ request()->routeIs('appointments') ? 'on' : '' }}">📅 مواعيدي</a>
    <a href="{{ route('consultation') }}" class="mob-nt {{ request()->routeIs('consultation') ? 'on' : '' }}">💬 طبيبك</a>
    <a href="{{ route('booking') }}" class="mob-nt bk">احجز ←</a>
  </div>
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
    <button class="hamburger" onclick="this.style.display='none'" id="hamburger">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- MOBILE MENU مع شرح لكل صفحة -->
<div class="mob-menu" id="mob-menu">

  <!-- الرئيسية -->
  <div class="mob-item">
    <button class="mob-item-btn {{ request()->routeIs('home') ? 'on' : '' }}" onclick="toggleDesc(this,'desc-home')">
      <span class="mob-item-left">🏠 الرئيسية</span>
      <span class="mob-item-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
    </button>
    <div class="mob-item-desc" id="desc-home">
      <p>الصفحة الرئيسية للمنصة — تجد فيها الأطباء والتخصصات والصيدليات وكل ما تحتاجه في مكان واحد.</p>
      <a href="{{ route('home') }}"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>اذهب للرئيسية</a>
    </div>
  </div>

  <!-- الأطباء -->
  <div class="mob-item">
    <button class="mob-item-btn {{ request()->routeIs('doctors') ? 'on' : '' }}" onclick="toggleDesc(this,'desc-docs')">
      <span class="mob-item-left">👨‍⚕️ الأطباء</span>
      <span class="mob-item-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
    </button>
    <div class="mob-item-desc" id="desc-docs">
      <p>تصفّح قائمة الأطباء المتاحين في مدينة الزنتان — ابحث بالاسم أو التخصص أو العيادة واحجز موعدك مباشرة.</p>
      <a href="{{ route('doctors') }}"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>تصفّح الأطباء</a>
    </div>
  </div>

  <!-- التخصصات -->
  <div class="mob-item">
    <button class="mob-item-btn {{ request()->routeIs('specialties') ? 'on' : '' }}" onclick="toggleDesc(this,'desc-specs')">
      <span class="mob-item-left">🔬 التخصصات</span>
      <span class="mob-item-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
    </button>
    <div class="mob-item-desc" id="desc-specs">
      <p>اختر التخصص الطبي الذي تحتاجه — باطنة، أسنان، أطفال، عيون، وأكثر من 8 تخصصات متاحة.</p>
      <a href="{{ route('specialties') }}"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>تصفّح التخصصات</a>
    </div>
  </div>

  <!-- الصيدليات -->
  <div class="mob-item">
    <button class="mob-item-btn {{ request()->routeIs('pharmacies') ? 'on' : '' }}" onclick="toggleDesc(this,'desc-pharma')">
      <span class="mob-item-left">💊 الصيدليات</span>
      <span class="mob-item-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
    </button>
    <div class="mob-item-desc" id="desc-pharma">
      <p>تواصل مع الصيدليات المعتمدة في الزنتان — استفسر عن الدواء وتحقق من توفره وتواصل مع الصيدلاني مباشرة.</p>
      <a href="{{ route('pharmacies') }}"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>تصفّح الصيدليات</a>
    </div>
  </div>

  <!-- مواعيدي -->
  <div class="mob-item">
    <button class="mob-item-btn {{ request()->routeIs('appointments') ? 'on' : '' }}" onclick="toggleDesc(this,'desc-apts')">
      <span class="mob-item-left">📅 مواعيدي</span>
      <span class="mob-item-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
    </button>
    <div class="mob-item-desc" id="desc-apts">
      <p>تابع مواعيدك الطبية القادمة والسابقة — يمكنك تأكيد الموعد أو إلغاؤه أو تقييم الطبيب بعد الزيارة.</p>
      <a href="{{ route('appointments') }}"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>عرض مواعيدي</a>
    </div>
  </div>

  <!-- تواصل مع طبيبك -->
  <div class="mob-item">
    <button class="mob-item-btn {{ request()->routeIs('consultation') ? 'on' : '' }}" onclick="toggleDesc(this,'desc-cons')">
      <span class="mob-item-left">💬 تواصل مع طبيبك</span>
      <span class="mob-item-arrow"><svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg></span>
    </button>
    <div class="mob-item-desc" id="desc-cons">
      <p>أرسل رسائل وتقارير مباشرة لطبيبك — شارك نتائج التحاليل والأشعة واحصل على رد سريع من طبيبك.</p>
      <a href="{{ route('consultation') }}"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>تواصل الآن</a>
    </div>
  </div>

  <!-- احجز موعد -->
  <a href="{{ route('booking') }}" class="mob-book" onclick="toggleMenu()">احجز موعدك الآن ←</a>

</div>

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

function toggleDesc(btn, descId) {
  const desc = document.getElementById(descId);
  const isOpen = desc.classList.contains('open');
  // أغلق كل الشروح
  document.querySelectorAll('.mob-item-desc').forEach(function(d){d.classList.remove('open')});
  document.querySelectorAll('.mob-item-btn').forEach(function(b){b.classList.remove('active')});
  // افتح اللي ضغطناه لو كان مغلق
  if (!isOpen) {
    desc.classList.add('open');
    btn.classList.add('active');
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
