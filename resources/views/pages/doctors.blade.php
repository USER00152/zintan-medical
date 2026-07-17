@extends('layouts.app')

@section('title', 'الأطباء — منصة الزنتان الطبية')

@section('styles')
<style>
.dav{background:linear-gradient(135deg,var(--p),var(--pd)) !important;color:#fff !important}
.doc-hero{background:linear-gradient(135deg,var(--pdd),var(--p));border-radius:var(--r22);padding:36px;margin-top:24px;position:relative;overflow:hidden}
.doc-hero::before{content:'';position:absolute;width:260px;height:260px;border-radius:50%;background:rgba(255,255,255,.06);top:-80px;left:-60px}
.doc-hero-inner{display:grid;grid-template-columns:1fr auto;gap:24px;align-items:center;position:relative;z-index:1}
.doc-hero h2{color:#fff;font-size:22px;font-weight:900;margin-bottom:8px}
.doc-hero p{color:rgba(255,255,255,.85);font-size:13.5px;line-height:1.75;max-width:500px}
.doc-hero-feats{display:flex;gap:20px;margin-top:14px;flex-wrap:wrap}
.dhf{display:flex;align-items:center;gap:7px;color:rgba(255,255,255,.9);font-size:12.5px;font-weight:600}
.dhf svg{width:14px;height:14px;fill:none;stroke:currentColor;stroke-width:2.5;stroke-linecap:round}
.doc-stats{display:grid;grid-template-columns:1fr 1fr;gap:10px;min-width:200px}
.ds{background:rgba(255,255,255,.15);border-radius:14px;padding:16px;text-align:center}
.ds b{display:block;font-size:26px;font-weight:900;color:#fff}
.ds span{font-size:11px;color:rgba(255,255,255,.8);font-weight:600}
.srch{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:15px;box-shadow:var(--s2);margin-top:20px;display:grid;grid-template-columns:2fr 1.1fr 1.1fr auto;gap:10px}
.lay-f{display:grid;grid-template-columns:230px 1fr;gap:20px;align-items:start;padding-top:24px}
.fp{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:18px}
.fp h3{font-size:14px;margin-bottom:13px;display:flex;align-items:center;justify-content:space-between;color:var(--td);font-weight:800}
.clr{font-size:11.5px;color:var(--p);font-weight:700;cursor:pointer}
.fg2{margin-bottom:18px}
.fg2 h4{font-size:12.5px;color:var(--td);margin-bottom:10px;font-weight:700}
.fo{display:flex;align-items:center;justify-content:space-between;padding:7px 0;border-bottom:1px solid var(--bds)}
.fo label{display:flex;align-items:center;gap:7px;font-size:12.5px;color:var(--td);cursor:pointer;font-weight:600}
.cnt{font-size:11px;background:var(--pl);color:var(--p);padding:2px 7px;border-radius:var(--rF);font-weight:700}
.res-bar{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px}
.res-cnt{font-size:14px;font-weight:700;color:var(--td)}
.res-cnt span{color:var(--p)}
.srt select{border:1.5px solid var(--bdr);border-radius:var(--rF);padding:6px 12px;font-size:12.5px;color:var(--td);background:var(--card);font-family:var(--font)}
.dl-grid{display:flex;flex-direction:column;gap:11px}
.dl-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r14);padding:15px 18px;display:flex;align-items:center;gap:14px;transition:.25s}
.dl-card:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-2px)}
.dav{width:58px;height:58px;border-radius:50%;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:800;flex-shrink:0;border:3px solid var(--pl)}
.di{flex:1}
.di h3{font-size:14.5px;color:var(--td);font-weight:800;margin-bottom:3px}
.dspec{color:var(--p);font-weight:700;font-size:11.5px;display:inline-block;background:var(--pl);padding:3px 9px;border-radius:var(--rF)}
.dmeta{display:flex;gap:11px;font-size:11.5px;color:var(--tm);font-weight:600;margin:4px 0}
.dclin{font-size:11.5px;color:var(--tm)}
.dclin b{color:var(--p);display:block;font-size:11.5px;margin-top:1px}
.stars{color:#f0a93a;font-size:12px}
.loading-state{text-align:center;padding:40px;color:var(--tm)}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">الأطباء</span></div>
    <h1>ابحث عن طبيبك المناسب</h1>
    <p>تصفّح قائمة الأطباء واحجز موعدك مباشرة</p>
  </div>
</div>

<div class="si" style="padding:0 28px">

  {{-- Hero --}}
  <div class="doc-hero">
    <div class="doc-hero-inner">
      <div>
        <h2>نخبة أطباء مدينة الزنتان</h2>
        <p>فريق متكامل من الأطباء المتخصصين في مختلف المجالات الطبية — ابحث عن الطبيب المناسب واحجز موعداً فورياً.</p>
        <div class="doc-hero-feats">
          <div class="dhf"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>أطباء معتمدون ومرخصون</div>
          <div class="dhf"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>حجز فوري 24/7</div>
          <div class="dhf"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>خبرات متنوعة</div>
        </div>
      </div>
      <div class="doc-stats">
        <div class="ds"><b id="count-docs">4+</b><span>طبيب متخصص</span></div>
        <div class="ds"><b>8</b><span>تخصص طبي</span></div>
        <div class="ds"><b>3</b><span>عيادات شريكة</span></div>
        <div class="ds"><b>35+</b><span>موعد أسبوعياً</span></div>
      </div>
    </div>
  </div>

  {{-- البحث --}}
  <div class="srch">
    <div class="iw"><input type="text" id="srch-name" placeholder="ابحث باسم الطبيب..."><span class="iw-ic"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></span></div>
    <select id="srch-spec" style="width:100%;padding:11px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:13px;color:var(--td);background:var(--bg);font-family:var(--font)"><option value="">كل التخصصات</option></select>
    <select id="srch-clinic" style="width:100%;padding:11px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:13px;color:var(--td);background:var(--bg);font-family:var(--font)"><option value="">كل العيادات</option></select>
    <button class="btn bp" style="padding:11px 20px;font-size:13px" onclick="filterDoctors()">بحث</button>
  </div>

  {{-- المحتوى --}}
  <div class="lay-f">
    <aside class="fp">
      <h3>الفلاتر <span class="clr" onclick="clearFilters()">مسح</span></h3>
      <div class="fg2">
        <h4>التخصص</h4>
        <div id="spec-filters"><div class="loading-state" style="padding:10px;font-size:13px">جاري التحميل...</div></div>
      </div>
      <div class="fg2">
        <h4>سنوات الخبرة</h4>
        <div class="fo"><label><input type="radio" name="exp" value="" checked onchange="filterDoctors()"> الكل</label></div>
        <div class="fo"><label><input type="radio" name="exp" value="5" onchange="filterDoctors()"> 5 سنوات فأكثر</label></div>
        <div class="fo"><label><input type="radio" name="exp" value="10" onchange="filterDoctors()"> 10 سنوات فأكثر</label></div>
      </div>
    </aside>
    <main>
      <div class="res-bar">
        <div class="res-cnt">تم العثور على <span id="res-count">0</span> طبيب</div>
        <div class="srt">الترتيب <select><option>الأعلى تقييماً</option><option>الأكثر خبرة</option></select></div>
      </div>
      <div class="dl-grid" id="doctors-list">
        <div class="loading-state">جاري تحميل الأطباء...</div>
      </div>
    </main>
  </div>
</div>
<div style="height:40px"></div>
@endsection

@section('scripts')
<script>
let allDoctors = [];
let allSpecialties = [];

async function loadData() {
    try {
        const [docRes, specRes] = await Promise.all([
            fetch(API + '/doctors', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } }),
            fetch(API + '/specialties', { headers: { 'Accept': 'application/json' } })
        ]);
        allDoctors = await docRes.json();
        allSpecialties = await specRes.json();

        let specHtml = '';
        allSpecialties.forEach(function(s) {
            const count = allDoctors.filter(function(d) { return d.specialty_id == s.id; }).length;
            specHtml += '<div class="fo"><label><input type="checkbox" value="' + s.id + '" onchange="filterDoctors()"> ' + s.name_ar + '</label><span class="cnt">' + count + '</span></div>';
        });
        document.getElementById('spec-filters').innerHTML = specHtml || '<p style="color:var(--tm);font-size:13px">لا توجد تخصصات</p>';

        const specSelect = document.getElementById('srch-spec');
        allSpecialties.forEach(function(s) {
            const o = document.createElement('option');
            o.value = s.id; o.textContent = s.name_ar;
            specSelect.appendChild(o);
        });

        if (document.getElementById('count-docs')) {
            document.getElementById('count-docs').textContent = allDoctors.length + '+';
        }

        renderDoctors(allDoctors);
    } catch(e) {
        document.getElementById('doctors-list').innerHTML = '<div class="loading-state">تعذّر تحميل البيانات</div>';
    }
}

function filterDoctors() {
    const name = document.getElementById('srch-name').value.trim().toLowerCase();
    const specId = document.getElementById('srch-spec').value;
    const expMin = document.querySelector('input[name="exp"]:checked').value;
    const checkedSpecs = Array.from(document.querySelectorAll('#spec-filters input:checked')).map(function(i){return i.value});

    let filtered = allDoctors.filter(function(d) {
        const docName = d.user && d.user.name ? d.user.name.toLowerCase() : '';
        if (name && !docName.includes(name)) return false;
        if (specId && d.specialty_id != specId) return false;
        if (checkedSpecs.length && !checkedSpecs.includes(String(d.specialty_id))) return false;
        if (expMin && d.years_experience < parseInt(expMin)) return false;
        return true;
    });
    renderDoctors(filtered);
}

function clearFilters() {
    document.getElementById('srch-name').value = '';
    document.getElementById('srch-spec').value = '';
    document.querySelector('input[name="exp"]').checked = true;
    document.querySelectorAll('#spec-filters input').forEach(function(i){i.checked=false});
    renderDoctors(allDoctors);
}

function renderDoctors(doctors) {
    document.getElementById('res-count').textContent = doctors.length;
    if (!doctors.length) {
        document.getElementById('doctors-list').innerHTML = '<div class="loading-state">لا يوجد أطباء مطابقون للبحث</div>';
        return;
    }
    let html = '';
    doctors.forEach(function(d) {
        const initial = d.user && d.user.name ? d.user.name.charAt(0) : 'د';
        const name    = d.user && d.user.name ? d.user.name : 'طبيب';
        const spec    = d.specialty && d.specialty.name_ar ? d.specialty.name_ar : '';
        const exp     = d.years_experience ? d.years_experience + ' سنوات خبرة' : '';
        const clinics = d.clinics && d.clinics.length ? d.clinics.map(function(c){return c.name}).join('، ') : '—';

        html += '<div class="dl-card">';
        html += '<div class="dav">' + initial + '</div>';
        html += '<div class="di">';
        html += '<div class="stars">★★★★★</div>';
        html += '<h3>' + name + '</h3>';
        html += '<span class="dspec">' + spec + '</span>';
        html += '<div class="dmeta">' + exp + '</div>';
        html += '<div class="dclin">العيادة<b>' + clinics + '</b></div>';
        html += '</div>';
        html += '<a href="/booking" class="btn bp bsm">احجز الآن</a>';
        html += '</div>';
    });
    document.getElementById('doctors-list').innerHTML = html;
}

loadData();
</script>
@endsection