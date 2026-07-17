@extends('layouts.app')

@section('title', 'الصيدليات — منصة الزنتان الطبية')

@section('styles')
<style>
.ph-hero{background:linear-gradient(135deg,var(--pdd),var(--p));border-radius:var(--r22);padding:40px;margin-bottom:28px;position:relative;overflow:hidden;display:grid;grid-template-columns:1fr auto;gap:24px;align-items:center}
.ph-hero::before{content:'';position:absolute;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,.06);top:-80px;left:-60px}
.ph-hero h2{color:#fff;font-size:26px;font-weight:900;margin-bottom:8px}
.ph-hero p{color:rgba(255,255,255,.85);font-size:14px;line-height:1.7}
.ph-search{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:16px;margin-bottom:24px;display:grid;grid-template-columns:1fr auto auto;gap:12px;box-shadow:var(--s1)}
.iw{position:relative}
.iw input{width:100%;padding:12px 12px 12px 42px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.iw input:focus{outline:none;border-color:var(--p);background:var(--card);box-shadow:0 0 0 4px rgba(178,221,184,.15)}
.iw-ic{position:absolute;top:50%;left:12px;transform:translateY(-50%);color:var(--tl);pointer-events:none}
.iw-ic svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}
.filter-btn{padding:12px 20px;border-radius:var(--r8);border:1.5px solid var(--bdr);background:var(--card);color:var(--td);font-size:13.5px;font-weight:700;cursor:pointer;font-family:var(--font);transition:.2s;display:flex;align-items:center;gap:7px}
.filter-btn.on,.filter-btn:hover{border-color:var(--p);background:var(--pl);color:var(--p)}
.ph-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.ph-card-big{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden;transition:.25s;cursor:pointer}
.ph-card-big:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-4px)}
.ph-card-top{height:80px;background:linear-gradient(135deg,var(--pll),var(--pl));position:relative;display:flex;align-items:center;justify-content:center}
.ph-logo{width:56px;height:56px;border-radius:16px;background:var(--p);display:flex;align-items:center;justify-content:center;box-shadow:var(--sp)}
.ph-logo svg{width:28px;height:28px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.ph-status{position:absolute;top:10px;left:12px;display:flex;align-items:center;gap:5px;font-size:11px;font-weight:700;padding:4px 10px;border-radius:var(--rF);background:#fff}
.ph-body{padding:18px}
.ph-name-big{font-size:16px;font-weight:900;color:var(--td);margin-bottom:4px}
.ph-meta{display:flex;flex-direction:column;gap:6px;margin-bottom:14px}
.ph-meta-row{display:flex;align-items:center;gap:8px;font-size:12.5px;color:var(--tm)}
.ph-meta-row svg{width:14px;height:14px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round;flex-shrink:0}
.ph-tags{display:flex;gap:6px;flex-wrap:wrap;margin-bottom:14px}
.ph-tag{background:var(--pl);color:var(--p);font-size:11px;font-weight:700;padding:3px 10px;border-radius:var(--rF)}
.ph-actions{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.ph-btn{padding:10px;border-radius:var(--r8);font-size:12.5px;font-weight:700;cursor:pointer;font-family:var(--font);transition:.2s;text-align:center;border:none}
.ph-btn-p{background:var(--p);color:#fff}
.ph-btn-p:hover{background:var(--pd)}
.ph-btn-o{background:var(--pl);color:var(--p);border:1.5px solid var(--bdr)}
.ph-btn-o:hover{border-color:var(--p)}

/* نافذة الصيدلية */
.ph-modal{display:none;position:fixed;inset:0;z-index:200;background:rgba(0,0,0,.5);backdrop-filter:blur(4px);align-items:center;justify-content:center;padding:20px}
.ph-modal.open{display:flex}
.ph-modal-card{background:var(--card);border-radius:var(--r22);width:100%;max-width:600px;max-height:90vh;overflow-y:auto;box-shadow:0 30px 60px rgba(0,0,0,.2)}
.ph-modal-hd{padding:24px 24px 0;display:flex;align-items:center;justify-content:space-between}
.ph-modal-hd h2{font-size:20px;font-weight:900;color:var(--td)}
.close-btn{width:34px;height:34px;border-radius:50%;background:var(--bg);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:18px;color:var(--tm);font-family:var(--font)}
.ph-modal-body{padding:24px}
.info-section{margin-bottom:20px}
.info-section h3{font-size:14px;font-weight:800;color:var(--td);margin-bottom:12px;display:flex;align-items:center;gap:8px}
.info-section h3 svg{width:18px;height:18px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.info-row{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--bds);font-size:13.5px;color:var(--td)}
.info-row:last-child{border:none}
.info-label{color:var(--tm);font-weight:600;min-width:100px;font-size:12.5px}
.med-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
.med-item{background:var(--pl);border-radius:var(--r8);padding:12px;text-align:center}
.med-item svg{width:24px;height:24px;fill:none;stroke:var(--p);stroke-width:1.8;stroke-linecap:round;margin-bottom:6px}
.med-item p{font-size:12px;font-weight:700;color:var(--td)}
.med-item span{font-size:11px;color:var(--tm)}
.whatsapp-btn{width:100%;padding:13px;background:#25D366;color:#fff;border:none;border-radius:var(--r8);font-size:14px;font-weight:800;cursor:pointer;font-family:var(--font);display:flex;align-items:center;justify-content:center;gap:8px;margin-top:16px}
.whatsapp-btn svg{width:20px;height:20px;fill:#fff}
.chat-section{background:var(--bg);border-radius:var(--r14);padding:16px;margin-top:16px}
.chat-section h4{font-size:13.5px;font-weight:800;color:var(--td);margin-bottom:12px}
.chat-msgs-ph{display:flex;flex-direction:column;gap:10px;margin-bottom:12px;max-height:180px;overflow-y:auto}
.msg-ph{padding:10px 13px;border-radius:12px;font-size:13px;line-height:1.5}
.msg-ph-me{background:var(--p);color:#fff;align-self:flex-end;max-width:75%}
.msg-ph-ph{background:var(--card);color:var(--td);align-self:flex-start;max-width:75%;border:1px solid var(--bdr)}
.msg-ph-time{font-size:10px;opacity:.6;margin-top:3px;display:block}
.chat-inp-ph{display:flex;gap:8px}
.chat-inp-ph input{flex:1;padding:10px 13px;border:1.5px solid var(--bdr);border-radius:var(--rF);font-size:13px;font-family:var(--font);color:var(--td);background:var(--card)}
.chat-inp-ph input:focus{outline:none;border-color:var(--p)}
.send-btn-ph{width:38px;height:38px;border-radius:50%;background:var(--p);border:none;display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0}
.send-btn-ph svg{width:15px;height:15px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.loading-state{text-align:center;padding:40px;color:var(--tm)}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">الصيدليات</span></div>
    <h1>صيدليات الزنتان</h1>
    <p>تواصل مع الصيدلي مباشرة واستفسر عن الدواء الذي تحتاجه</p>
  </div>
</div>

<div class="si" style="padding:28px 28px 60px">

  <!-- Hero -->
  <div class="ph-hero">
    <div>
      <h2>صحتك في أيدٍ أمينة 💊</h2>
      <p>تواصل مع صيدلاني معتمد، استفسر عن الأدوية، وتعرّف على بدائل الدواء المتاحة في مدينة الزنتان.</p>
      <div style="display:flex;gap:16px;margin-top:16px;flex-wrap:wrap">
        <div style="display:flex;align-items:center;gap:7px;color:rgba(255,255,255,.9);font-size:13px;font-weight:600"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>تواصل مباشر مع الصيدلي</div>
        <div style="display:flex;align-items:center;gap:7px;color:rgba(255,255,255,.9);font-size:13px;font-weight:600"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>معرفة توفر الدواء</div>
        <div style="display:flex;align-items:center;gap:7px;color:rgba(255,255,255,.9);font-size:13px;font-weight:600"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>بدائل الأدوية المتاحة</div>
      </div>
    </div>
    <div style="position:relative;z-index:1">
      <svg width="100" height="100" viewBox="0 0 100 100" fill="none" style="animation:floatDoc 3s ease-in-out infinite">
        <circle cx="50" cy="50" r="45" fill="rgba(255,255,255,0.12)"/>
        <rect x="30" y="20" width="40" height="55" rx="8" fill="rgba(255,255,255,0.2)" stroke="rgba(255,255,255,0.4)" stroke-width="1.5"/>
        <rect x="40" y="15" width="20" height="12" rx="4" fill="rgba(255,255,255,0.3)"/>
        <line x1="38" y1="40" x2="62" y2="40" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="38" y1="50" x2="62" y2="50" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="38" y1="60" x2="55" y2="60" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round"/>
        <rect x="42" y="32" width="16" height="5" rx="2" fill="rgba(255,255,255,0.5)"/>
        <line x1="50" y1="28" x2="50" y2="38" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="45" y1="33" x2="55" y2="33" stroke="rgba(255,255,255,0.6)" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
    </div>
  </div>

  <!-- البحث والفلاتر -->
  <div class="ph-search">
    <div class="iw">
      <input type="text" id="ph-search" placeholder="ابحث عن صيدلية أو دواء..." oninput="filterPharmacies()">
      <span class="iw-ic"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></span>
    </div>
    <button class="filter-btn on" id="filter-all" onclick="setFilter('all',this)">
      <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
      الكل
    </button>
    <button class="filter-btn" id="filter-open" onclick="setFilter('open',this)">
      <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      مفتوحة الآن
    </button>
  </div>

  <!-- قائمة الصيدليات -->
  <div class="ph-grid" id="ph-grid">
    <div class="loading-state" style="grid-column:1/-1">جاري التحميل...</div>
  </div>
</div>

<!-- نافذة الصيدلية -->
<div class="ph-modal" id="ph-modal">
  <div class="ph-modal-card">
    <div class="ph-modal-hd">
      <h2 id="modal-name">صيدلية الرحمة</h2>
      <button class="close-btn" onclick="closeModal()">✕</button>
    </div>
    <div class="ph-modal-body" id="modal-body"></div>
  </div>
</div>
@endsection

@section('scripts')
<style>
@keyframes floatDoc{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
</style>
<script>
const pharmacies = [
  { id:1, name:'صيدلية الرحمة', area:'شارع الجمهورية', phone:'091-234-5678', open:true, hours:'8:00 ص - 11:00 م', tags:['أدوية مزمنة','مستلزمات طبية','مواد تجميل'], meds:['باراسيتامول','أموكسيسيلين','أمبروكسول','ميتفورمين','أملوديبين','فيتامين C'] },
  { id:2, name:'صيدلية النخبة', area:'حي المطار', phone:'091-345-6789', open:true, hours:'7:00 ص - 12:00 م', tags:['أدوية القلب','تحاليل سريعة','وصفات إلكترونية'], meds:['أسبرين','ليزينوبريل','أتورفاستاتين','واترفارين','بيسوبرولول','فيروسيمايد'] },
  { id:3, name:'صيدلية الشفاء', area:'وسط المدينة', phone:'091-456-7890', open:true, hours:'9:00 ص - 10:00 م', tags:['أدوية الأطفال','حليب أطفال','لقاحات'], meds:['إيبوبروفين','بنسلين','سيبروفلوكساسين','أزيثروميسين','نيفيديبين','كالسيوم'] },
  { id:4, name:'صيدلية الأمل', area:'حي الزهور', phone:'091-567-8901', open:false, hours:'8:00 ص - 9:00 م', tags:['أدوية مزمنة','ضغط الدم','سكري'], meds:['ميتفورمين','جليبنكلاميد','إنسولين','ميتوبرولول','راميبريل','هيدروكلوروثيازيد'] },
  { id:5, name:'صيدلية الحياة', area:'شارع الوحدة', phone:'091-678-9012', open:true, hours:'8:00 ص - 11:30 م', tags:['أدوية عامة','مستلزمات','تجميل'], meds:['سيتريزين','لوراتادين','ديكلوفيناك','كيتوبروفين','أوميبرازول','رانيتيدين'] },
  { id:6, name:'صيدلية الوفاء', area:'حي الصداقة', phone:'091-789-0123', open:true, hours:'7:30 ص - 11:00 م', tags:['أدوية نسائية','أمومة وطفولة','مكملات'], meds:['حمض الفوليك','كالسيوم','فيتامين D','حديد','ماغنيسيوم','زنك'] },
];

let currentFilter = 'all';
let chatMsgs = {};

function renderPharmacies(list) {
    if (!list.length) {
        document.getElementById('ph-grid').innerHTML = '<div class="loading-state" style="grid-column:1/-1">لا توجد صيدليات مطابقة</div>';
        return;
    }
    let html = '';
    list.forEach(function(p) {
        html += '<div class="ph-card-big" onclick="openModal(' + p.id + ')">';
        html += '<div class="ph-card-top">';
        html += '<div class="ph-logo"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div>';
        html += '<div class="ph-status" style="color:' + (p.open ? '#22a55e' : '#e14b4b') + '">';
        html += '<div style="width:7px;height:7px;border-radius:50%;background:' + (p.open ? '#22a55e' : '#e14b4b') + '"></div>';
        html += (p.open ? 'مفتوحة' : 'مغلقة') + '</div>';
        html += '</div>';
        html += '<div class="ph-body">';
        html += '<div class="ph-name-big">' + p.name + '</div>';
        html += '<div class="ph-meta">';
        html += '<div class="ph-meta-row"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>' + p.area + '</div>';
        html += '<div class="ph-meta-row"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>' + p.hours + '</div>';
        html += '<div class="ph-meta-row"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>' + p.phone + '</div>';
        html += '</div>';
        html += '<div class="ph-tags">';
        p.tags.forEach(function(t){ html += '<span class="ph-tag">' + t + '</span>'; });
        html += '</div>';
        html += '<div class="ph-actions">';
        html += '<button class="ph-btn ph-btn-p" onclick="event.stopPropagation();openModal(' + p.id + ')">تفاصيل الأدوية</button>';
        html += '<button class="ph-btn ph-btn-o" onclick="event.stopPropagation();openChat(' + p.id + ')">تواصل مع الصيدلي</button>';
        html += '</div></div></div>';
    });
    document.getElementById('ph-grid').innerHTML = html;
}

function setFilter(type, btn) {
    currentFilter = type;
    document.querySelectorAll('.filter-btn').forEach(function(b){b.classList.remove('on')});
    btn.classList.add('on');
    filterPharmacies();
}

function filterPharmacies() {
    const q = document.getElementById('ph-search').value.trim().toLowerCase();
    let list = pharmacies;
    if (currentFilter === 'open') list = list.filter(function(p){return p.open});
    if (q) list = list.filter(function(p){
        return p.name.toLowerCase().includes(q) || p.area.toLowerCase().includes(q) ||
               p.tags.some(function(t){return t.includes(q)}) ||
               p.meds.some(function(m){return m.toLowerCase().includes(q)});
    });
    renderPharmacies(list);
}

function openModal(id) {
    const p = pharmacies.find(function(x){return x.id===id});
    if (!p) return;
    document.getElementById('modal-name').textContent = p.name;
    if (!chatMsgs[id]) chatMsgs[id] = [
        { from:'ph', text:'مرحباً! كيف يمكنني مساعدتك اليوم؟', time:'الآن' }
    ];

    let medsHtml = '';
    p.meds.forEach(function(m){
        medsHtml += '<div class="med-item"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="4"/><path d="M3 12h18M12 3l-6 9h12l-6-9z" opacity=".4"/><line x1="12" y1="3" x2="12" y2="21" stroke-width="1.5"/></svg><p>' + m + '</p><span>متوفر</span></div>';
    });

    let chatHtml = '';
    chatMsgs[id].forEach(function(m){
        const cls = m.from === 'me' ? 'msg-ph msg-ph-me' : 'msg-ph msg-ph-ph';
        chatHtml += '<div class="' + cls + '">' + m.text + '<span class="msg-ph-time">' + m.time + '</span></div>';
    });

    document.getElementById('modal-body').innerHTML =
        '<div class="info-section">' +
        '<h3><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>معلومات الصيدلية</h3>' +
        '<div class="info-row"><span class="info-label">العنوان</span>' + p.area + '</div>' +
        '<div class="info-row"><span class="info-label">أوقات العمل</span>' + p.hours + '</div>' +
        '<div class="info-row"><span class="info-label">الهاتف</span>' + p.phone + '</div>' +
        '<div class="info-row"><span class="info-label">الحالة</span><span style="color:' + (p.open?'#22a55e':'#e14b4b') + ';font-weight:700">' + (p.open?'● مفتوحة الآن':'● مغلقة حالياً') + '</span></div>' +
        '</div>' +
        '<div class="info-section">' +
        '<h3><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="4"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>الأدوية المتوفرة</h3>' +
        '<div class="med-grid">' + medsHtml + '</div>' +
        '</div>' +
        '<div class="chat-section">' +
        '<h4>تواصل مع الصيدلي مباشرة</h4>' +
        '<div class="chat-msgs-ph" id="chat-' + id + '">' + chatHtml + '</div>' +
        '<div class="chat-inp-ph">' +
        '<input type="text" id="msg-inp-' + id + '" placeholder="اسأل الصيدلي عن دواء..." onkeydown="if(event.key===\'Enter\')sendPhMsg(' + id + ')">' +
        '<button class="send-btn-ph" onclick="sendPhMsg(' + id + ')"><svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg></button>' +
        '</div></div>' +
        '<a href="https://wa.me/218' + p.phone.replace(/[^0-9]/g,'').slice(1) + '" target="_blank" class="whatsapp-btn">' +
        '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" fill="#fff"/></svg>' +
        'تواصل عبر واتساب' +
        '</a>';

    document.getElementById('ph-modal').classList.add('open');
    setTimeout(function(){
        const c = document.getElementById('chat-' + id);
        if(c) c.scrollTop = c.scrollHeight;
    }, 100);
}

function openChat(id) { openModal(id); }

function sendPhMsg(id) {
    const inp = document.getElementById('msg-inp-' + id);
    if (!inp || !inp.value.trim()) return;
    const txt = inp.value.trim();
    const now = new Date();
    const time = now.getHours() + ':' + String(now.getMinutes()).padStart(2,'0');
    chatMsgs[id].push({ from:'me', text:txt, time:time });
    inp.value = '';

    // رد تلقائي بسيط
    setTimeout(function(){
        const replies = [
            'نعم، هذا الدواء متوفر لدينا 💊',
            'يمكنك المرور لاستلامه في أي وقت خلال أوقات الدوام',
            'سأتحقق من توفره وأعلمك قريباً',
            'هل لديك وصفة طبية لهذا الدواء؟',
            'البديل المتاح حالياً هو ' + pharmacies.find(function(p){return p.id===id}).meds[Math.floor(Math.random()*6)]
        ];
        chatMsgs[id].push({ from:'ph', text:replies[Math.floor(Math.random()*replies.length)], time:time });
        const chatEl = document.getElementById('chat-' + id);
        if (chatEl) {
            let html = '';
            chatMsgs[id].forEach(function(m){
                const cls = m.from==='me' ? 'msg-ph msg-ph-me' : 'msg-ph msg-ph-ph';
                html += '<div class="' + cls + '">' + m.text + '<span class="msg-ph-time">' + m.time + '</span></div>';
            });
            chatEl.innerHTML = html;
            chatEl.scrollTop = chatEl.scrollHeight;
        }
    }, 1000);

    const chatEl = document.getElementById('chat-' + id);
    if (chatEl) {
        let html = '';
        chatMsgs[id].forEach(function(m){
            const cls = m.from==='me' ? 'msg-ph msg-ph-me' : 'msg-ph msg-ph-ph';
            html += '<div class="' + cls + '">' + m.text + '<span class="msg-ph-time">' + m.time + '</span></div>';
        });
        chatEl.innerHTML = html;
        chatEl.scrollTop = chatEl.scrollHeight;
    }
}

function closeModal() {
    document.getElementById('ph-modal').classList.remove('open');
}

document.getElementById('ph-modal').addEventListener('click', function(e){
    if(e.target === this) closeModal();
});

renderPharmacies(pharmacies);
</script>
@endsection