@extends('layouts.app')

@section('title', 'التخصصات — منصة الزنتان الطبية')

@section('styles')
<style>
.sp-grid2{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:36px}
.sp-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:22px 12px;text-align:center;transition:.25s;cursor:pointer}
.sp-card:hover,.sp-card.on{border-color:var(--p);box-shadow:var(--s2);transform:translateY(-4px)}
.sp-card.on{background:var(--pl)}
.sp-ico{width:52px;height:52px;margin:0 auto 11px;border-radius:15px;background:var(--pl);display:flex;align-items:center;justify-content:center;transition:.25s}
.sp-ico svg{width:26px;height:26px;fill:none;stroke:var(--p);stroke-width:1.8;stroke-linecap:round;transition:.25s}
.sp-card:hover .sp-ico,.sp-card.on .sp-ico{background:var(--p)}
.sp-card:hover .sp-ico svg,.sp-card.on .sp-ico svg{stroke:#fff}
.sp-card h4{font-size:13.5px;font-weight:700;color:var(--td);margin-bottom:3px}
.sp-card span{font-size:11px;color:var(--tm)}
.sp-docs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:16px}
.sd-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden;transition:.25s}
.sd-card:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-3px)}
.sd-cov{height:80px;background:linear-gradient(120deg,var(--pll),#d9f0e0);position:relative}
.sd-pat{position:absolute;inset:0;opacity:.1;background-image:radial-gradient(circle,var(--p) 1px,transparent 1px);background-size:14px 14px}
.sd-av{width:58px;height:58px;border-radius:50%;border:4px solid var(--card);background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:800;position:absolute;bottom:-29px;right:16px;box-shadow:var(--s1)}
.sd-body{padding:36px 14px 14px}
.sd-body h3{font-size:14px;color:var(--td);font-weight:800;margin-bottom:3px}
.sd-clin{font-size:11px;color:var(--tm);margin-bottom:7px}
.sd-clin b{color:var(--p);display:block;margin-top:1px}
.sd-foot{display:flex;align-items:center;justify-content:space-between;padding-top:9px;border-top:1.5px dashed var(--bds)}
.stars{color:#f0a93a;font-size:11.5px}
.dspec{color:var(--p);font-weight:700;font-size:11px;display:inline-block;background:var(--pl);padding:3px 10px;border-radius:var(--rF)}
.loading-state{text-align:center;padding:40px;color:var(--tm)}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si"><div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">التخصصات</span></div><h1>التخصصات الطبية</h1><p>اختر التخصص لتصفّح الأطباء المتاحين</p></div>
</div>

<div class="sec" style="padding-top:32px">
  <div class="si">
    <div class="sp-grid2" id="spec-grid"><div class="loading-state" style="grid-column:1/-1">جاري تحميل التخصصات...</div></div>
    <div style="padding-top:28px;border-top:1.5px solid var(--bds)">
      <h3 style="font-size:20px;font-weight:800;color:var(--td);margin-bottom:4px">أطباء تخصص <span id="spec-name" style="color:var(--p)">...</span></h3>
      <p style="font-size:13px;color:var(--tm);margin-bottom:16px">الأطباء المتاحون في هذا التخصص</p>
      <div class="sp-docs-grid" id="spec-doctors"><div class="loading-state" style="grid-column:1/-1">اختر تخصصاً</div></div>
    </div>
  </div>
</div>
<div style="height:40px"></div>
@endsection

@section('scripts')
<script>
let allDoctors = [];

async function loadData() {
    try {
        const [specRes, docRes] = await Promise.all([
            fetch(API + '/specialties', { headers: { 'Accept': 'application/json' } }),
            fetch(API + '/doctors', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } })
        ]);
        const specs = await specRes.json();
        allDoctors = await docRes.json();

        let html = '';
        specs.forEach(function(s) {
            const count = allDoctors.filter(function(d) { return d.specialty_id == s.id; }).length;
            html += '<div class="sp-card" onclick="selectSpec(' + s.id + ',\'' + s.name_ar + '\',this)">';
            html += '<div class="sp-ico"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>';
            html += '<h4>' + s.name_ar + '</h4><span>' + count + ' طبيب</span></div>';
        });
        document.getElementById('spec-grid').innerHTML = html || '<div class="loading-state">لا توجد تخصصات</div>';

        if (specs.length) {
            const firstCard = document.querySelector('.sp-card');
            if (firstCard) selectSpec(specs[0].id, specs[0].name_ar, firstCard);
        }
    } catch(e) {
        document.getElementById('spec-grid').innerHTML = '<div class="loading-state">تعذّر تحميل البيانات</div>';
    }
}

function selectSpec(specId, specName, card) {
    document.querySelectorAll('.sp-card').forEach(function(c){c.classList.remove('on')});
    card.classList.add('on');
    document.getElementById('spec-name').textContent = specName;

    const doctors = allDoctors.filter(function(d) { return d.specialty_id == specId; });
    if (!doctors.length) {
        document.getElementById('spec-doctors').innerHTML = '<div class="loading-state" style="grid-column:1/-1">لا يوجد أطباء في هذا التخصص حالياً</div>';
        return;
    }

    let html = '';
    doctors.forEach(function(d) {
        const initial = d.user && d.user.name ? d.user.name.charAt(0) : 'د';
        const name = d.user && d.user.name ? d.user.name : 'طبيب';
        const clinics = d.clinics && d.clinics.length ? d.clinics.map(function(c){return c.name}).join('، ') : '—';
        const exp = d.years_experience ? d.years_experience + ' سنوات خبرة' : '';

        html += '<div class="sd-card"><div class="sd-cov"><div class="sd-pat"></div><div class="sd-av">' + initial + '</div></div>';
        html += '<div class="sd-body"><div class="stars" style="margin-bottom:5px">★★★★★</div><h3>' + name + '</h3>';
        html += '<div class="sd-clin">العيادة<b>' + clinics + '</b></div><div style="font-size:11px;color:var(--tm);margin-bottom:8px">' + exp + '</div>';
        html += '<div class="sd-foot"><span class="dspec">' + specName + '</span><a href="/booking" class="btn bp bsm">احجز</a></div></div></div>';
    });
    document.getElementById('spec-doctors').innerHTML = html;
}
loadData();
</script>
@endsection