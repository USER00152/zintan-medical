@extends('layouts.app')

@section('title', 'الرئيسية — منصة الزنتان الطبية')

@section('styles')
<style>
.hero{background:linear-gradient(160deg,var(--pll) 0%,var(--card) 65%);padding:60px 28px 68px;position:relative;overflow:hidden}
.hbc{position:absolute;border-radius:50%;opacity:.05}
.hbc1{width:500px;height:500px;background:var(--p);top:-140px;left:-100px}
.hbc2{width:300px;height:300px;background:var(--p);bottom:-80px;right:5%}
.hero-in{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1.1fr .9fr;gap:40px;align-items:center;position:relative;z-index:2}
.hbadge{display:inline-flex;align-items:center;gap:7px;background:var(--pl);color:var(--p);font-weight:700;font-size:12.5px;padding:7px 16px;border-radius:var(--rF);margin-bottom:14px;border:1px solid rgba(90,174,122,.2)}
.hero-ct h1{font-size:40px;line-height:1.25;margin-bottom:8px;color:var(--td);font-weight:900;letter-spacing:-1px;opacity:0;animation:fu .8s ease .1s forwards}
.hero-ct h1 span{color:var(--p)}
.hero-qs{font-size:16px;color:var(--p);font-weight:700;margin-bottom:12px;opacity:0;animation:fu .8s ease .3s forwards}
.hero-p{font-size:14.5px;color:var(--tm);margin-bottom:18px;max-width:460px;line-height:1.8;opacity:0;animation:fu .8s ease .5s forwards}
.hero-feats{display:flex;flex-direction:column;gap:10px;margin-bottom:24px;opacity:0;animation:fu .8s ease .65s forwards}
.hf{display:flex;align-items:center;gap:10px;font-size:13.5px;color:var(--td);font-weight:600}
.hf-ico{width:22px;height:22px;border-radius:50%;background:var(--pl);display:inline-flex;align-items:center;justify-content:center;flex-shrink:0}
.hf-ico svg{width:12px;height:12px;fill:none;stroke:var(--p);stroke-width:2.5;stroke-linecap:round}
.hero-btns{display:flex;gap:12px;margin-bottom:30px;opacity:0;animation:fu .8s ease .8s forwards}
.stats{display:flex;gap:26px;padding-top:20px;border-top:1px solid var(--bds);opacity:0;animation:fu .8s ease 1s forwards}
.stat b{display:block;font-size:24px;color:var(--td);font-weight:900}
.stat span{font-size:11px;color:var(--tm);font-weight:600}
@keyframes fu{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
@keyframes floatDoc{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
@keyframes heartBeat{0%,100%{transform:scale(1)}14%{transform:scale(1.22)}28%{transform:scale(1)}42%{transform:scale(1.12)}56%{transform:scale(1)}}
@keyframes ringPulse{0%{transform:scale(1);opacity:.6}100%{transform:scale(1.8);opacity:0}}
@keyframes eyeBlink{0%,90%,100%{transform:scaleY(1)}95%{transform:scaleY(.1)}}
@keyframes smileAnim{0%,100%{transform:scaleY(1)}50%{transform:scaleY(1.15)}}
@keyframes drawPulse{to{stroke-dashoffset:0}}
@keyframes pulseLine{0%,100%{opacity:1;stroke-dashoffset:0}50%{opacity:.6;stroke-dashoffset:30}}

.hero-vis{display:flex;align-items:center;justify-content:center}
.hero-vis svg{width:260px;height:260px;filter:drop-shadow(0 14px 28px rgba(90,174,122,0.18));animation:floatDoc 3.5s ease-in-out infinite}

/* ══ ألوان SVG الدكتور ══ */
.doc-skin{fill:#FDDAB7}
.doc-hair{fill:#1C1C3A}
.doc-coat{fill:white}
.doc-pants{fill:#1E3A5F}
.doc-shoes{fill:#0d2b35}
.doc-eye-white{fill:white}
.doc-eye-dark{fill:#1C1C3A}
.doc-steth{stroke:#5AAE7A}
.doc-heart{fill:#5AAE7A}

[data-theme="dark"] .doc-skin{fill:#C8956A}
[data-theme="dark"] .doc-hair{fill:#6B5B8A}
[data-theme="dark"] .doc-coat{fill:#2D2040}
[data-theme="dark"] .doc-pants{fill:#3D2D55}
[data-theme="dark"] .doc-shoes{fill:#1A1225}
[data-theme="dark"] .doc-eye-white{fill:#E8E0F0}
[data-theme="dark"] .doc-eye-dark{fill:#2D2040}
[data-theme="dark"] .doc-steth{stroke:#9B85CC}
[data-theme="dark"] .doc-heart{fill:#9B85CC}

/* ══ HELP POPUP ══ */
.help-btn{width:34px;height:34px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:15px;font-weight:900;color:var(--p);font-family:var(--font);transition:.2s;flex-shrink:0}
.help-btn:hover{background:var(--p);color:#fff;border-color:var(--p)}
.help-overlay{position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:900;display:none;align-items:center;justify-content:center;padding:20px}
.help-overlay.open{display:flex}
.help-box{background:var(--card);border-radius:24px;width:100%;max-width:560px;max-height:90vh;overflow:hidden;display:flex;flex-direction:column;box-shadow:0 24px 64px rgba(0,0,0,.18)}
.help-head{display:flex;align-items:center;justify-content:space-between;padding:20px 24px 0}
.help-head h3{font-size:17px;font-weight:800;color:var(--td)}
.help-close{width:32px;height:32px;border-radius:50%;background:var(--pl);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;color:var(--tm);font-family:var(--font)}
.help-close:hover{background:var(--p);color:#fff}
.help-tabs{display:flex;gap:4px;padding:16px 24px 0;border-bottom:1px solid var(--bds)}
.help-tab{padding:8px 16px;border-radius:var(--rF) var(--rF) 0 0;font-size:13px;font-weight:700;color:var(--tm);border:none;background:none;cursor:pointer;font-family:var(--font);transition:.2s;border-bottom:2px solid transparent;margin-bottom:-1px}
.help-tab.on{color:var(--p);border-bottom-color:var(--p);background:var(--pl)}
.help-body{padding:24px;overflow-y:auto;flex:1}
.help-panel{display:none}
.help-panel.on{display:block}
.step{display:flex;gap:16px;margin-bottom:22px;align-items:flex-start}
.step-num{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900;flex-shrink:0}
.step-body h4{font-size:14px;font-weight:800;color:var(--td);margin-bottom:4px}
.step-body p{font-size:13px;color:var(--tm);line-height:1.65}
.faq{border:1.5px solid var(--bdr);border-radius:var(--r14);margin-bottom:10px;overflow:hidden}
.faq-q{padding:14px 16px;font-size:13.5px;font-weight:700;color:var(--td);cursor:pointer;display:flex;align-items:center;justify-content:space-between;gap:8px;user-select:none}
.faq-q span{font-size:18px;color:var(--p);font-weight:400;transition:.2s}
.faq-a{padding:0 16px;font-size:13px;color:var(--tm);line-height:1.7;max-height:0;overflow:hidden;transition:.3s}
.faq.open .faq-a{max-height:200px;padding:0 16px 14px}
.faq.open .faq-q span{transform:rotate(45deg)}
.contact-item{display:flex;align-items:center;gap:14px;padding:14px;border:1.5px solid var(--bdr);border-radius:var(--r14);margin-bottom:10px;text-decoration:none;transition:.2s}
.contact-item:hover{border-color:var(--p);background:var(--pl)}
.contact-ico{width:42px;height:42px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.contact-item h4{font-size:13.5px;font-weight:800;color:var(--td);margin-bottom:2px}
.contact-item p{font-size:12px;color:var(--tm)}

.svc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.svc-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:24px;padding:32px;transition:.25s;position:relative;overflow:hidden}
.svc-card:hover{transform:translateY(-6px);box-shadow:0 16px 40px rgba(178,221,184,.3);border-color:var(--p)}
.svc-card-featured{background:linear-gradient(160deg,var(--pdd),var(--p));border:none;transform:translateY(-8px);box-shadow:0 20px 50px rgba(106,158,117,.35)}
.svc-card-featured:hover{transform:translateY(-14px)}
.svc-blob{position:absolute;border-radius:50%;background:var(--pl);opacity:.5}
.svc-blob-featured{background:rgba(255,255,255,.08);opacity:1}
.svc-icon{width:64px;height:64px;border-radius:20px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;margin-bottom:20px;box-shadow:var(--sp);position:relative}
.svc-icon-featured{background:rgba(255,255,255,.2);box-shadow:none;border:1.5px solid rgba(255,255,255,.3)}
.svc-badge{display:inline-flex;background:var(--pl);color:var(--p);font-size:11px;font-weight:700;padding:3px 12px;border-radius:999px;margin-bottom:12px}
.svc-badge-featured{background:rgba(255,255,255,.2);color:#fff}
.svc-feat-item{display:flex;align-items:center;gap:8px;font-size:12.5px;font-weight:600}
.partner-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-bottom:32px}
.partner-card{background:var(--bg);border:1.5px solid var(--bdr);border-radius:20px;padding:28px;text-align:center;transition:.25s}
.partner-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(178,221,184,.2);border-color:var(--p)}
.partner-card-featured{background:linear-gradient(160deg,var(--pdd),var(--p));border:none;box-shadow:0 16px 40px rgba(106,158,117,.3)}
.highlight-pulse{animation:highlightPop .8s ease-out}
@keyframes highlightPop{0%{box-shadow:0 0 0 0 rgba(90,174,122,.5)}60%{box-shadow:0 0 0 12px rgba(90,174,122,.1)}100%{box-shadow:0 0 0 0 rgba(90,174,122,0)}}

@media(max-width:768px){
  .sp-grid{grid-template-columns:repeat(2,1fr)!important}
  .doc-grid{grid-template-columns:1fr!important}
  .feat-grid{grid-template-columns:1fr!important}
  .ph-grid{grid-template-columns:1fr!important}
  .svc-grid{grid-template-columns:1fr!important}
  .svc-card-featured{transform:none!important}
  .partner-grid{grid-template-columns:1fr!important}
  .hero-vis svg{width:200px!important;height:200px!important}
  .help-box{max-height:95vh}
}
</style>
@endsection

@section('content')

{{-- ══ HELP POPUP ══ --}}
<div class="help-overlay" id="help-overlay" onclick="if(event.target===this)closeHelp()">
  <div class="help-box">
    <div class="help-head">
      <h3>🏥 مركز المساعدة</h3>
      <button class="help-close" onclick="closeHelp()">✕</button>
    </div>
    <div class="help-tabs">
      <button class="help-tab on" onclick="helpTab('how',this)">كيفية الاستخدام</button>
      <button class="help-tab" onclick="helpTab('faq',this)">أسئلة شائعة</button>
      <button class="help-tab" onclick="helpTab('contact',this)">تواصل معنا</button>
    </div>
    <div class="help-body">
      <div class="help-panel on" id="hp-how">
        <div class="step"><div class="step-num">1</div><div class="step-body"><h4>أنشئ حسابك</h4><p>اضغط على "تسجيل" وأدخل اسمك وبريدك الإلكتروني وكلمة مرور. التسجيل مجاني تماماً ولا يأخذ أكثر من دقيقة.</p></div></div>
        <div class="step"><div class="step-num">2</div><div class="step-body"><h4>اختر طبيبك</h4><p>تصفّح قائمة الأطباء أو ابحث بالتخصص. يمكنك الاطّلاع على بيانات كل طبيب والعيادة التي يعمل بها.</p></div></div>
        <div class="step"><div class="step-num">3</div><div class="step-body"><h4>احجز موعدك</h4><p>اضغط "احجز موعد"، اختر التاريخ والوقت المناسبين، وأدخل سبب الزيارة. الحجز يتم في ثوانٍ.</p></div></div>
        <div class="step"><div class="step-num">4</div><div class="step-body"><h4>تابع مواعيدك</h4><p>من قسم "مواعيدي" يمكنك عرض جميع حجوزاتك الحالية والسابقة، وإلغاء أي موعد عند الحاجة.</p></div></div>
        <div class="step"><div class="step-num">5</div><div class="step-body"><h4>تواصل مع طبيبك</h4><p>من قسم "تواصل مع طبيبك" يمكنك إرسال رسائل ووثائق طبية مباشرة لطبيبك بشكل آمن وخاص.</p></div></div>
      </div>
      <div class="help-panel" id="hp-faq">
        <div class="faq" onclick="toggleFaq(this)"><div class="faq-q">هل الحجز مجاني؟ <span>+</span></div><div class="faq-a">نعم، الحجز عبر منصة الزنتان الطبية مجاني تماماً ولا توجد أي رسوم مخفية.</div></div>
        <div class="faq" onclick="toggleFaq(this)"><div class="faq-q">كيف أعرف أن موعدي تم تأكيده؟ <span>+</span></div><div class="faq-a">بعد إتمام الحجز ستظهر لك رسالة تأكيد، ويمكنك مراجعة موعدك في قسم "مواعيدي" في أي وقت.</div></div>
        <div class="faq" onclick="toggleFaq(this)"><div class="faq-q">هل يمكنني إلغاء موعدي؟ <span>+</span></div><div class="faq-a">نعم، يمكنك إلغاء أي موعد من قسم "مواعيدي" بضغطة واحدة على زر "إلغاء الموعد".</div></div>
        <div class="faq" onclick="toggleFaq(this)"><div class="faq-q">هل بياناتي الطبية آمنة؟ <span>+</span></div><div class="faq-a">نعم، نستخدم أعلى معايير الأمان لحماية بياناتك الشخصية والطبية، ولا يطّلع عليها إلا طبيبك.</div></div>
        <div class="faq" onclick="toggleFaq(this)"><div class="faq-q">ماذا لو لم أجد الطبيب الذي أريده؟ <span>+</span></div><div class="faq-a">يمكنك التواصل معنا عبر واتساب أو قسم "تواصل معنا" وسنساعدك في إيجاد البديل المناسب.</div></div>
        <div class="faq" onclick="toggleFaq(this)"><div class="faq-q">هل يمكنني الحجز من الهاتف؟ <span>+</span></div><div class="faq-a">نعم، المنصة متوافقة تماماً مع جميع الأجهزة — هاتف، تابلت، ولابتوب.</div></div>
      </div>
      <div class="help-panel" id="hp-contact">
        <a href="https://wa.me/218931488889" target="_blank" class="contact-item">
          <div class="contact-ico" style="background:#25D366"><svg width="22" height="22" viewBox="0 0 24 24" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg></div>
          <div><h4>واتساب</h4><p>تحدّث معنا مباشرة على واتساب</p></div>
        </a>
        <a href="mailto:info@zintanmed.ly" class="contact-item">
          <div class="contact-ico" style="background:var(--p)"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,13 22,4"/></svg></div>
          <div><h4>البريد الإلكتروني</h4><p>info@zintanmed.ly</p></div>
        </a>
        <div class="contact-item" style="cursor:default">
          <div class="contact-ico" style="background:var(--pl)"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--p)" stroke-width="2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <div><h4>الموقع</h4><p>مدينة الزنتان، ليبيا</p></div>
        </div>
        <div style="margin-top:16px;padding:16px;background:var(--pl);border-radius:var(--r14);text-align:center">
          <p style="font-size:13px;color:var(--tm);margin-bottom:10px">الموقع الإلكتروني</p>
          <a href="https://zintan-medical-production.up.railway.app" target="_blank" style="font-size:13px;font-weight:700;color:var(--p)">zintan-medical-production.up.railway.app</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ══════════ HERO ══════════ --}}
<div class="hero">
  <div class="hbc hbc1"></div><div class="hbc hbc2"></div>
  <div class="hero-in">
    <div class="hero-ct">
      <div class="hbadge">
        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        منصة طبية موثوقة · الزنتان
      </div>
      <h1>رعايتك الصحية<br><span>في يدك الآن</span></h1>
      <div class="hero-qs">احجز موعدك بثوانٍ وودّع طوابير الانتظار</div>
      <p class="hero-p">منصة إلكترونية تجمع أفضل الأطباء والعيادات في مدينة الزنتان — احجز موعدك وتواصل مع طبيبك بكل سهولة وأمان.</p>
      <div class="hero-feats"></div>
      <div class="hero-btns">
        <a href="{{ route('booking') }}" class="btn bp" style="font-size:15px;padding:14px 28px">احجز موعداً الآن</a>
        <a href="{{ route('doctors') }}" class="btn bo" style="font-size:15px;padding:14px 28px">تصفّح الأطباء</a>
      </div>
      <div class="stats">
        <div class="stat"><b id="stat-doctors">4+</b><span>طبيب متخصص</span></div>
        <div class="stat"><b>8</b><span>تخصص طبي</span></div>
        <div class="stat"><b>3</b><span>عيادات شريكة</span></div>
        <div class="stat"><b>35+</b><span>موعد متاح</span></div>
      </div>
    </div>

    {{-- ── Doctor SVG مع CSS classes للوضع الليلي ── --}}
    <div class="hero-vis">
      <svg id="doctor-svg" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="155" cy="368" rx="68" ry="9" fill="rgba(90,174,122,0.1)"/>
        <rect x="126" y="278" width="27" height="74" rx="13" class="doc-pants"/>
        <rect x="165" y="278" width="27" height="74" rx="13" class="doc-pants"/>
        <rect x="118" y="340" width="41" height="16" rx="8" class="doc-shoes"/>
        <rect x="160" y="340" width="41" height="16" rx="8" class="doc-shoes"/>
        <rect x="93" y="174" width="138" height="118" rx="24" class="doc-coat" stroke="#e0f5e9" stroke-width="1.5"/>
        <line x1="162" y1="174" x2="162" y2="292" stroke="#ddf5e5" stroke-width="1.5"/>
        <rect x="105" y="202" width="40" height="32" rx="7" fill="#f0fbf5" stroke="#c0e6cc" stroke-width="1"/>
        <rect x="121" y="209" width="3" height="17" rx="1.5" fill="#5AAE7A"/>
        <rect x="114" y="215" width="17" height="3" rx="1.5" fill="#5AAE7A"/>
        <rect x="105" y="244" width="40" height="26" rx="6" fill="#5AAE7A"/>
        <rect x="110" y="250" width="30" height="3" rx="1.5" fill="white" opacity="0.95"/>
        <rect x="110" y="257" width="22" height="3" rx="1.5" fill="white" opacity="0.75"/>
        <rect x="110" y="264" width="15" height="2" rx="1" fill="white" opacity="0.55"/>
        <rect x="192" y="192" width="46" height="62" rx="8" class="doc-coat" stroke="#c0e6cc" stroke-width="1.5"/>
        <rect x="204" y="186" width="22" height="13" rx="6" fill="#5AAE7A"/>
        <circle cx="215" cy="186" r="3.5" class="doc-coat"/>
        <line x1="200" y1="212" x2="230" y2="212" stroke="#c0e6cc" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="200" y1="221" x2="230" y2="221" stroke="#c0e6cc" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="200" y1="230" x2="222" y2="230" stroke="#c0e6cc" stroke-width="1.5" stroke-linecap="round"/>
        <rect x="194" y="178" width="23" height="84" rx="11" class="doc-coat" stroke="#ddf5e5" stroke-width="1.5"/>
        <rect x="109" y="178" width="23" height="80" rx="11" class="doc-coat" stroke="#ddf5e5" stroke-width="1.5"/>
        <ellipse cx="121" cy="262" rx="14" ry="13" class="doc-skin"/>
        <ellipse cx="205" cy="266" rx="14" ry="13" class="doc-skin"/>
        <rect x="147" y="150" width="32" height="30" rx="12" class="doc-skin"/>
        <polygon points="163,162 156,182 163,178 170,182" fill="#5AAE7A"/>
        <polygon points="158,155 168,155 171,165 155,165" fill="#4A9066"/>
        <circle cx="163" cy="110" r="46" class="doc-skin"/>
        <path d="M117 102 Q115 60 163 56 Q211 60 209 102" class="doc-hair"/>
        <path d="M117 98 Q113 72 121 62 Q135 50 163 48 Q191 50 205 62 Q213 72 209 98" class="doc-hair"/>
        <path d="M143 92 Q153 87 161 90" stroke="#1C1C3A" stroke-width="2.5" stroke-linecap="round" fill="none"/>
        <path d="M165 90 Q173 87 183 92" stroke="#1C1C3A" stroke-width="2.5" stroke-linecap="round" fill="none"/>
        <g style="animation:eyeBlink 4s ease-in-out infinite;transform-origin:149px 108px">
          <ellipse cx="149" cy="108" rx="10" ry="8" class="doc-eye-white"/>
          <circle cx="151" cy="108" r="5.5" class="doc-eye-dark"/>
          <circle cx="153" cy="106" r="2" fill="white"/>
        </g>
        <g style="animation:eyeBlink 4s ease-in-out .05s infinite;transform-origin:177px 108px">
          <ellipse cx="177" cy="108" rx="10" ry="8" class="doc-eye-white"/>
          <circle cx="179" cy="108" r="5.5" class="doc-eye-dark"/>
          <circle cx="181" cy="106" r="2" fill="white"/>
        </g>
        <circle cx="130" cy="124" r="10" fill="#FFB6C1" opacity="0.4"/>
        <circle cx="196" cy="124" r="10" fill="#FFB6C1" opacity="0.4"/>
        <path d="M144 130 Q163 150 182 130" stroke="#C0875A" stroke-width="2.5" stroke-linecap="round" fill="none" style="animation:smileAnim 3s ease-in-out infinite;transform-origin:163px 135px"/>
        <path d="M148 132 Q163 146 178 132 Q163 142 148 132" fill="white" opacity="0.8"/>
        <ellipse cx="117" cy="110" rx="8" ry="11" class="doc-skin"/>
        <ellipse cx="209" cy="110" rx="8" ry="11" class="doc-skin"/>
        <path d="M117 104 Q95 104 93 128 Q91 152 95 166 Q99 178 115 178" class="doc-steth" stroke-width="3.5" stroke-linecap="round" fill="none"/>
        <circle cx="117" cy="178" r="9" fill="#5AAE7A"/>
        <circle cx="117" cy="178" r="5" fill="#4A9066"/>
        <circle cx="305" cy="130" r="45" fill="rgba(90,174,122,0.08)" style="animation:ringPulse 2.5s ease-in-out infinite"/>
        <circle cx="305" cy="130" r="35" fill="rgba(90,174,122,0.12)" style="animation:ringPulse 2.5s ease-in-out .4s infinite"/>
        <path d="M305 158 C305 158 270 135 270 114 C270 102 280 94 291 97 C297 99 302 105 305 112 C308 105 313 99 319 97 C330 94 340 102 340 114 C340 135 305 158 305 158Z" class="doc-heart" style="animation:heartBeat 1.4s ease-in-out infinite;transform-origin:305px 126px;filter:drop-shadow(0 0 12px rgba(90,174,122,0.6))"/>
        <rect x="50" y="310" width="270" height="52" rx="14" fill="rgba(90,174,122,0.06)" stroke="rgba(90,174,122,0.15)" stroke-width="1"/>
        <polyline points="60,336 80,336 94,320 106,352 118,304 130,340 142,326 154,336 174,336 200,336 230,336 290,336 310,336" fill="none" stroke="#5AAE7A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray:310;stroke-dashoffset:310;animation:drawPulse 2s ease forwards .8s,pulseLine 3s ease-in-out 2.8s infinite"/>
        <circle r="5.5" fill="#5AAE7A" style="filter:drop-shadow(0 0 6px rgba(90,174,122,.8))">
          <animateMotion dur="3s" repeatCount="indefinite" begin="2.8s" path="M60,336 80,336 94,320 106,352 118,304 130,340 142,326 154,336 230,336 310,336"/>
        </circle>
        <text x="316" y="340" font-family="Tajawal,sans-serif" font-size="11" fill="#5AAE7A" font-weight="700" opacity="0.8">Normal</text>
      </svg>
    </div>
  </div>
</div>

{{-- ══════════ SPECIALTIES ══════════ --}}
<div class="sec" id="section-specialties" style="background:var(--card)">
  <div class="si">
    <div class="sh"><span class="eyebrow">التخصصات الطبية</span><h2>اختر التخصص المناسب</h2><p>نغطي مختلف التخصصات بأطباء ذوي خبرة عالية</p></div>
    <div class="sp-grid" id="home-specs"><div style="grid-column:1/-1;text-align:center;padding:20px;color:var(--tm)">جاري التحميل...</div></div>
  </div>
</div>

{{-- ══════════ DOCTORS ══════════ --}}
<div class="sec" id="section-doctors">
  <div class="si">
    <div class="sh"><span class="eyebrow">نخبة الأطباء</span><h2>أطباء موصى بهم</h2><p>تعرّف على نخبة من الأطباء المتاحين على المنصة</p></div>
    <div class="doc-grid" id="home-doctors"><div style="grid-column:1/-1;text-align:center;padding:20px;color:var(--tm)">جاري التحميل...</div></div>
    <div style="text-align:center;margin-top:24px"><a href="{{ route('doctors') }}" class="btn bo">عرض جميع الأطباء</a></div>
  </div>
</div>

{{-- ══════════ SERVICES ══════════ --}}
<div class="sec" id="section-services">
  <div class="si">
    <div class="sh"><div class="eyebrow">خدماتنا</div><h2>خدماتنا الأساسية</h2><p>رعاية صحية متكاملة في منصة واحدة — ثلاث خدمات رئيسية لتوفير رعاية شاملة وسهلة الوصول</p></div>
    <div class="svc-grid">
      <div class="svc-card">
        <div class="svc-blob" style="width:120px;height:120px;top:-30px;left:-30px"></div>
        <div class="svc-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/></svg></div>
        <span class="svc-badge">نظام الحجوزات</span>
        <h3 style="font-size:18px;font-weight:900;color:var(--td);margin-bottom:10px">احجز موعدك الآن</h3>
        <p style="font-size:13.5px;color:var(--tm);line-height:1.8">حجز مواعيد مع الأطباء في العيادات المتعاقدة، مع نظام إدارة ذكي يقلل من زمن الانتظار وتذكرة دخول رقمية فورية.</p>
        <div style="display:flex;flex-direction:column;gap:8px;margin-top:16px">
          <div class="svc-feat-item" style="color:var(--td)"><span style="width:20px;height:20px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="var(--p)" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>تذكرة رقمية فورية</div>
          <div class="svc-feat-item" style="color:var(--td)"><span style="width:20px;height:20px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="var(--p)" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>إشعار تلقائي قبل الموعد</div>
          <div class="svc-feat-item" style="color:var(--td)"><span style="width:20px;height:20px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="var(--p)" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>إلغاء وإعادة جدولة مجاناً</div>
        </div>
      </div>
      <div class="svc-card svc-card-featured">
        <div class="svc-blob svc-blob-featured" style="width:150px;height:150px;top:-40px;left:-40px"></div>
        <div class="svc-blob svc-blob-featured" style="width:100px;height:100px;bottom:-20px;right:-20px;opacity:.06"></div>
        <div class="svc-icon svc-icon-featured"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg></div>
        <span class="svc-badge svc-badge-featured">الزيارات المنزلية</span>
        <h3 style="font-size:18px;font-weight:900;color:#fff;margin-bottom:10px">الطبيب يأتيك</h3>
        <p style="font-size:13.5px;color:rgba(255,255,255,.85);line-height:1.8">زيارات طبية منزلية، تحاليل، وأشعة — مع تتبع مباشر لموقع مقدم الخدمة وإشعار بموعد الوصول لراحة أكبر.</p>
        <div style="display:flex;flex-direction:column;gap:8px;margin-top:16px">
          <div class="svc-feat-item" style="color:rgba(255,255,255,.9)"><span style="width:20px;height:20px;border-radius:50%;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>تتبع مباشر لموقع الطبيب</div>
          <div class="svc-feat-item" style="color:rgba(255,255,255,.9)"><span style="width:20px;height:20px;border-radius:50%;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>تحاليل وأشعة منزلية</div>
          <div class="svc-feat-item" style="color:rgba(255,255,255,.9)"><span style="width:20px;height:20px;border-radius:50%;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>إشعار بموعد الوصول</div>
        </div>
      </div>
      <div class="svc-card">
        <div class="svc-blob" style="width:120px;height:120px;bottom:-30px;right:-30px"></div>
        <div class="svc-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 10h.01M12 10h.01M16 10h.01"/></svg></div>
        <span class="svc-badge">الطب عن بُعد</span>
        <h3 style="font-size:18px;font-weight:900;color:var(--td);margin-bottom:10px">استشارة من بيتك</h3>
        <p style="font-size:13.5px;color:var(--tm);line-height:1.8">استشارات طبية عن بُعد مع ملف طبي إلكتروني شامل يحفظ التاريخ المرضي والتحاليل والأشعة للمتابعة والمراجعة.</p>
        <div style="display:flex;flex-direction:column;gap:8px;margin-top:16px">
          <div class="svc-feat-item" style="color:var(--td)"><span style="width:20px;height:20px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="var(--p)" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>ملف طبي إلكتروني شامل</div>
          <div class="svc-feat-item" style="color:var(--td)"><span style="width:20px;height:20px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="var(--p)" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>حفظ التحاليل والأشعة</div>
          <div class="svc-feat-item" style="color:var(--td)"><span style="width:20px;height:20px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0"><svg width="11" height="11" fill="none" stroke="var(--p)" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span>متابعة مستمرة مع الطبيب</div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ══════════ WHY US ══════════ --}}
<div class="sec" style="background:var(--card)">
  <div class="si">
    <div class="sh"><span class="eyebrow">لماذا منصتنا؟</span><h2>كل ما تحتاجه في مكان واحد</h2><p>منصة متكاملة تربط المرضى بالأطباء في الزنتان</p></div>
    <div class="feat-grid">
      <div class="fc"><div class="fc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></div><div><h4>حجز فوري بدون انتظار</h4><p>اختر الطبيب والوقت والعيادة وأكمل الحجز في ثوانٍ.</p></div></div>
      <div class="fc"><div class="fc-ico"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div><h4>عيادات قريبة منك</h4><p>اعثر على أقرب عيادة في الزنتان.</p></div></div>
      <div class="fc"><div class="fc-ico"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><div><h4>تواصل مع طبيبك</h4><p>أرسل تقاريرك وتواصل مباشرة مع طبيبك بأمان.</p></div></div>
      <div class="fc"><div class="fc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div><div><h4>بياناتك محمية دائماً</h4><p>أعلى معايير الأمان لحماية بياناتك الطبية.</p></div></div>
      <div class="fc"><div class="fc-ico"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></div><div><h4>إشعارات فورية</h4><p>تنبيهات تلقائية قبل موعدك.</p></div></div>
      <div class="fc"><div class="fc-ico"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div><h4>خدمة مجانية بالكامل</h4><p>لا رسوم مخفية — الحجز مجاني تماماً.</p></div></div>
    </div>
  </div>
</div>

{{-- ══════════ PHARMACIES ══════════ --}}
<div class="sec" id="section-pharmacies">
  <div class="si">
    <div class="sh"><span class="eyebrow">الصيدليات المعتمدة</span><h2>صيدليات الزنتان</h2><p>تواصل مع الصيدليات المعتمدة واحصل على دوائك بسهولة</p></div>
    <div class="ph-grid">
      <div class="ph-card" data-name="صيدلية الرحمة"><div class="ph-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="ph-name">صيدلية الرحمة</div><div class="ph-addr">شارع الجمهورية</div><div class="ph-open" style="color:#22a55e">● مفتوحة الآن</div></div></div>
      <div class="ph-card" data-name="صيدلية النخبة"><div class="ph-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="ph-name">صيدلية النخبة</div><div class="ph-addr">حي المطار</div><div class="ph-open" style="color:#22a55e">● مفتوحة الآن</div></div></div>
      <div class="ph-card" data-name="صيدلية الشفاء"><div class="ph-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="ph-name">صيدلية الشفاء</div><div class="ph-addr">وسط المدينة</div><div class="ph-open" style="color:#22a55e">● مفتوحة الآن</div></div></div>
      <div class="ph-card" data-name="صيدلية الأمل"><div class="ph-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="ph-name">صيدلية الأمل</div><div class="ph-addr">حي الزهور</div><div class="ph-open" style="color:var(--tm)">● مغلقة حالياً</div></div></div>
      <div class="ph-card" data-name="صيدلية الحياة"><div class="ph-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="ph-name">صيدلية الحياة</div><div class="ph-addr">شارع الوحدة</div><div class="ph-open" style="color:#22a55e">● مفتوحة الآن</div></div></div>
      <div class="ph-card" data-name="صيدلية الوفاء"><div class="ph-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="ph-name">صيدلية الوفاء</div><div class="ph-addr">حي الصداقة</div><div class="ph-open" style="color:#22a55e">● مفتوحة الآن</div></div></div>
    </div>
  </div>
</div>

{{-- ══════════ PARTNERSHIP ══════════ --}}
<div class="sec" id="section-join" style="background:var(--card)">
  <div class="si">
    <div class="sh"><div class="eyebrow">انضم إلينا</div><h2>رسالتنا ودعوة للتعاون</h2><p>نسعى لتقديم رعاية صحية ممتازة بأقل تكلفة ممكنة — نرحب بشراكتكم ندعو الشركاء للانضمام في رحلة تطوير الرعاية الصحية في ليبيا.</p></div>
    <div class="partner-grid">
      <div class="partner-card">
        <div style="width:60px;height:60px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;margin:0 auto 14px"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--p)" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg></div>
        <h3 style="font-size:16px;font-weight:800;color:var(--td);margin-bottom:8px">الأطباء</h3>
        <p style="font-size:13px;color:var(--tm);line-height:1.7;margin-bottom:16px">انضموا لتقديم خدمات طبية متميزة عبر منصة الزنتان وتوسيع نطاق وصولكم للمرضى.</p>
        <a href="{{ route('join') }}" class="btn bo bsm" style="display:block;text-align:center">انضم كطبيب</a>
      </div>
      <div class="partner-card partner-card-featured">
        <div style="width:60px;height:60px;border-radius:50%;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;margin:0 auto 14px;border:1.5px solid rgba(255,255,255,.3)"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg></div>
        <h3 style="font-size:16px;font-weight:800;color:#fff;margin-bottom:8px">المصحات والمستشفيات</h3>
        <p style="font-size:13px;color:rgba(255,255,255,.85);line-height:1.7;margin-bottom:16px">شراكة استراتيجية لتحسين الخدمات وزيادة الوصول للمرضى وتحديث نظام الحجوزات.</p>
        <a href="{{ route('join') }}" style="display:block;padding:11px;background:#fff;color:var(--p);border-radius:10px;font-size:13px;font-weight:800;text-decoration:none;text-align:center">انضم كمستشفى</a>
      </div>
      <div class="partner-card">
        <div style="width:60px;height:60px;border-radius:50%;background:var(--pl);display:flex;align-items:center;justify-content:center;margin:0 auto 14px"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--p)" stroke-width="1.8" stroke-linecap="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
        <h3 style="font-size:16px;font-weight:800;color:var(--td);margin-bottom:8px">المراكز الصحية</h3>
        <p style="font-size:13px;color:var(--tm);line-height:1.7;margin-bottom:16px">تعاون لخدمة المجتمع وتوسيع نطاق الرعاية الصحية في مدينة الزنتان وضواحيها.</p>
        <a href="{{ route('join') }}" class="btn bo bsm" style="display:block;text-align:center">انضم كمركز صحي</a>
      </div>
    </div>
    <div style="background:linear-gradient(135deg,var(--pdd),var(--p));border-radius:20px;padding:32px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap">
      <div>
        <h3 style="color:#fff;font-size:20px;font-weight:900;margin-bottom:6px">نتشرف بالشراكة معكم 🤝</h3>
        <p style="color:rgba(255,255,255,.85);font-size:14px">تواصلوا معنا الآن وسنرد عليكم في أقرب وقت لمناقشة تفاصيل الشراكة</p>
      </div>
      <div style="display:flex;gap:12px;flex-wrap:wrap">
        <a href="https://wa.me/218931488889" target="_blank" style="display:inline-flex;align-items:center;gap:8px;padding:13px 24px;background:#25D366;color:#fff;border-radius:12px;font-size:14px;font-weight:800;text-decoration:none">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          واتساب
        </a>
        <a href="{{ route('join') }}" style="display:inline-flex;align-items:center;gap:8px;padding:13px 24px;background:rgba(255,255,255,.15);color:#fff;border-radius:12px;font-size:14px;font-weight:800;text-decoration:none;border:1.5px solid rgba(255,255,255,.3)">طلب الانضمام</a>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
/* ══ HELP POPUP ══ */
function openHelp(){ document.getElementById('help-overlay').classList.add('open'); document.body.style.overflow='hidden'; }
function closeHelp(){ document.getElementById('help-overlay').classList.remove('open'); document.body.style.overflow=''; }
function helpTab(name,btn){
  document.querySelectorAll('.help-tab').forEach(function(b){b.classList.remove('on')});
  document.querySelectorAll('.help-panel').forEach(function(p){p.classList.remove('on')});
  btn.classList.add('on');
  document.getElementById('hp-'+name).classList.add('on');
}
function toggleFaq(el){
  el.classList.toggle('open');
  document.querySelectorAll('.faq').forEach(function(f){ if(f!==el) f.classList.remove('open'); });
}
document.addEventListener('keydown',function(e){ if(e.key==='Escape') closeHelp(); });

/* زر المساعدة في الـ navbar */
document.addEventListener('DOMContentLoaded', function(){
  var navRight = document.querySelector('.nav-right');
  if(navRight){
    var helpBtn = document.createElement('button');
    helpBtn.className = 'help-btn';
    helpBtn.title = 'المساعدة';
    helpBtn.innerHTML = '?';
    helpBtn.onclick = openHelp;
    navRight.insertBefore(helpBtn, navRight.firstChild);
  }
});

/* ══ DATA ══ */
async function loadHomeData() {
  try {
    const [docRes, specRes] = await Promise.all([
      fetch(API + '/doctors', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } }),
      fetch(API + '/specialties', { headers: { 'Accept': 'application/json' } })
    ]);
    const doctors = await docRes.json();
    const specs = await specRes.json();
    let specHtml = '';
    specs.forEach(function(s) {
      const count = doctors.filter(function(d){ return d.specialty_id == s.id; }).length;
      specHtml += '<div class="sp-card"><div class="sp-ico"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div><h4>' + s.name_ar + '</h4><span>' + count + ' طبيب</span></div>';
    });
    document.getElementById('home-specs').innerHTML = specHtml || '<p style="grid-column:1/-1;text-align:center;color:var(--tm)">لا توجد تخصصات</p>';
    let docHtml = '';
    doctors.slice(0, 3).forEach(function(d) {
      const initial = d.user && d.user.name ? d.user.name.charAt(0) : 'د';
      const name = d.user && d.user.name ? d.user.name : 'طبيب';
      const spec = d.specialty && d.specialty.name_ar ? d.specialty.name_ar : '';
      const exp = d.years_experience ? d.years_experience + ' سنوات خبرة' : '';
      const clinics = d.clinics && d.clinics.length ? d.clinics.map(function(c){return c.name}).join('، ') : '—';
      docHtml += '<div class="dc"><div class="dc-cov"><div class="dc-pat"></div><div class="dc-av">' + initial + '</div></div>';
      docHtml += '<div class="dc-body"><div class="stars">★★★★★</div><h3>' + name + '</h3><span class="dspec">' + spec + '</span>';
      docHtml += '<div class="dc-meta">' + exp + '</div><div class="dc-clin">العيادة<b>' + clinics + '</b></div>';
      docHtml += '<div class="dc-foot"><span style="font-size:11px;color:#22a55e;font-weight:600">متاح</span><a href="/booking" class="btn bp bsm">احجز</a></div></div></div>';
    });
    document.getElementById('home-doctors').innerHTML = docHtml || '<p style="grid-column:1/-1;text-align:center;color:var(--tm)">لا يوجد أطباء</p>';
    document.getElementById('stat-doctors').textContent = doctors.length + '+';
  } catch(e) {
    document.getElementById('home-specs').innerHTML = '<p style="grid-column:1/-1;text-align:center;color:var(--tm)">تعذّر التحميل</p>';
    document.getElementById('home-doctors').innerHTML = '<p style="grid-column:1/-1;text-align:center;color:var(--tm)">تعذّر التحميل</p>';
  }
}
loadHomeData();

function scrollToSection(sectionId) {
  const el = document.getElementById('section-' + sectionId);
  if (!el) return;
  el.scrollIntoView({ behavior: 'smooth', block: 'start' });
  setTimeout(function() {
    document.querySelectorAll('.highlight-pulse').forEach(function(x){ x.classList.remove('highlight-pulse'); });
    el.classList.add('highlight-pulse');
    setTimeout(function(){ el.classList.remove('highlight-pulse'); }, 1000);
  }, 600);
}

document.querySelectorAll('.ph-card').forEach(function(card) {
  card.addEventListener('click', function() {
    const name = this.getAttribute('data-name');
    window.location.href = "{{ route('pharmacies') }}" + (name ? '?highlight=' + encodeURIComponent(name) : '');
  });
});

(function() {
  const hash = window.location.hash.replace('#','');
  if (hash) { setTimeout(function(){ scrollToSection(hash); }, 400); }
})();
</script>
@endsection
